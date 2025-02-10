<?php

namespace BybitApi\Enums;

enum TransferStatus: string
{
    case UNKNOWN = 'STATUS_UNKNOWN';
    case SUCCESS = 'SUCCESS';
    case PENDING = 'PENDING';
    case FAILED = 'FAILED';

    public function label(): string
    {
        return match ($this) {
            self::UNKNOWN => __('bybit_api::enums.transfer_statuses.unknown'),
            self::SUCCESS => __('bybit_api::enums.transfer_statuses.success'),
            self::PENDING => __('bybit_api::enums.transfer_statuses.pending'),
            self::FAILED => __('bybit_api::enums.transfer_statuses.failed'),
        };
    }
}
