<?php

namespace BybitApi\DTOs;

use BybitApi\DTOs\Casts\Castable;
use ErrorException;
use Exception;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Arr;
use Illuminate\Support\Traits\Macroable;

abstract class DTO implements Arrayable
{
    use Macroable;

    protected array $dtoPayload;

    public static function init(array $payload): static
    {
        $dto = new static;
        foreach ($dto->aliases() as $key => $alias) {
            if (isset($payload[$key])) {
                $payload[$alias] = $payload[$key];
                unset($payload[$key]);
            }
        }
        $dto->dtoPayload = $payload;

        return $dto;
    }

    public function aliases(): array
    {
        return [];
    }

    abstract public function casts(): array;

    public function raw(): array
    {
        $payload = $this->dtoPayload;
        foreach ($this->aliases() as $key => $alias) {
            if (isset($payload[$alias])) {
                $payload[$key] = $payload[$alias];
                unset($payload[$alias]);
            }
        }

        return $payload;
    }

    public function toArray(): array
    {
        $data = [];
        foreach (array_keys($this->dtoPayload) as $key) {
            $data[$key] = match (true) {
                $this->{$key} instanceof DTO => $this->{$key}->toArray(),
                is_array($this->{$key}) => $this->arrayParse($this->{$key}),
                default => $this->{$key}
            };
        }

        return $data;
    }

    private function arrayParse(array $items): array
    {
        foreach ($items as $key => $data) {
            if ($data instanceof DTO) {
                $items[$key] = $data->toArray();
            }
        }

        return $items;
    }

    public function __get(string $name)
    {
        if (array_key_exists($name, $this->dtoPayload)) {
            $castFqn = Arr::get($this->casts(), $name);
            $input = $this->dtoPayload[$name];
            if ($castFqn !== null) {
                if (is_object($castFqn)) {
                    $cast = $castFqn;
                    $castFqn = $cast::class;
                } elseif (is_subclass_of($castFqn, DTO::class)) {
                    return is_array($input) ? $castFqn::init($input) : $input;
                } else {
                    throw_if(! class_exists($castFqn), Exception::class, "class '$castFqn' not found");
                    $cast = new $castFqn;
                }
                throw_if(! $cast instanceof Castable, Exception::class, "class '$castFqn' must be a implementation of ".Castable::class);

                return $cast($input);
            }

            return $input;
        }
        throw new ErrorException(sprintf(
            'Undefined property: %s::$%s',
            static::class,
            $name
        ));
    }
}
