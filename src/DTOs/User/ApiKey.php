<?php

namespace BybitApi\DTOs\User;

use BybitApi\DTOs\Casts\BooleanCast;
use BybitApi\DTOs\Casts\EnumCast;
use BybitApi\DTOs\Casts\IntCast;
use BybitApi\DTOs\Casts\ParseDatetimeCast;
use BybitApi\DTOs\Casts\StringArrayCast;
use BybitApi\DTOs\Casts\StringCast;
use BybitApi\DTOs\DTO;
use BybitApi\Enums\ApiType;
use BybitApi\Enums\KycLevel;
use BybitApi\Enums\VipLevel;

/**
 * @property null|string $id
 * @property null|string $note
 * @property null|string $apiKey
 * @property null|bool $readOnly
 * @property null|bool $secret
 * @property null|\BybitApi\DTOs\User\Permissions $permissions
 * @property null|array $ips
 * @property null|ApiType $type
 * @property null|int $deadlineDay
 * @property null|\Illuminate\Support\Carbon $expiredAt
 * @property null|\Illuminate\Support\Carbon $createdAt
 * @property null|int $unified
 * @property null|bool $uta
 * @property null|int $userID
 * @property null|int $inviterID
 * @property null|\BybitApi\Enums\VipLevel $vipLevel
 * @property null|string $mktMakerLevel
 * @property null|int $affiliateID
 * @property null|string $rsaPublicKey
 * @property null|bool $isMaster
 * @property null|int $parentUid
 * @property null|string $kycLevel
 * @property null|string $kycRegion
 */
class ApiKey extends DTO
{
    public function casts(): array
    {
        return [
            'id' => StringCast::class,
            'note' => StringCast::class,
            'apiKey' => StringCast::class,
            'readOnly' => BooleanCast::class,
            'secret' => StringCast::class,
            'permissions' => Permissions::class,
            'ips' => StringArrayCast::class,
            'type' => new EnumCast(ApiType::class),
            'deadlineDay' => IntCast::class,
            'expiredAt' => ParseDatetimeCast::class,
            'createdAt' => ParseDatetimeCast::class,
            'unified' => IntCast::class,
            'uta' => BooleanCast::class,
            'userID' => IntCast::class,
            'inviterID' => IntCast::class,
            'vipLevel' => new EnumCast(VipLevel::class),
            'mktMakerLevel' => StringCast::class,
            'affiliateID' => IntCast::class,
            'rsaPublicKey' => StringCast::class,
            'isMaster' => BooleanCast::class,
            'parentUid' => IntCast::class,
            'kycLevel' => new EnumCast(KycLevel::class),
            'kycRegion' => StringCast::class,
        ];
    }
}
