<?php

namespace BybitApi\DTOs;

use BybitApi\DTOs\Casts\Castable;
use ErrorException;
use Exception;
use Illuminate\Support\Arr;

abstract readonly class DTO
{

    protected array $dtoPayload;

    public static function init(array $payload): self
    {
        $dto = new static();
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

    public function __get(string $name)
    {
        if (isset($this->dtoPayload[$name])) {
            $castFqn = Arr::get($this->casts(), $name);
            $input = $this->dtoPayload[$name];
            if ($castFqn !== null) {
                if (is_object($castFqn)) {
                    $cast = $castFqn;
                    $castFqn = $cast::class;
                } else {
                    throw_if(!class_exists($castFqn), Exception::class, "class '$castFqn' not found");
                    $cast = new $castFqn;
                }
                throw_if(!$cast instanceof Castable, Exception::class, "class '$castFqn' must be a implementation of ". Castable::class);
                return $cast($input);
            }
            return $input;
        }
        throw new ErrorException(sprintf(
            "Undefined property: %s::$%s",
            static::class,
            $name
        ));
    }
}