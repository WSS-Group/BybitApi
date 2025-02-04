<?php

namespace BybitApi\Enums;

enum OrderStatus: string
{
    case NEW = 'New';
    case PARTIALLY_FILLED = 'PartiallyFilled';
    case UNTRIGGERED = 'Untriggered';
    case REJECTED = 'Rejected';
    case PARTIALLY_FILLED_CANCELED = 'PartiallyFilledCanceled';
    case FILLED = 'Filled';
    case CANCELLED = 'Cancelled';
    case TRIGGERED = 'Triggered';
    case DEACTIVATED = 'Deactivated';

    public function isOpen(): bool
    {
        return in_array($this, [self::NEW, self::PARTIALLY_FILLED, self::UNTRIGGERED]);
    }

    public function isClosed(): bool
    {
        return ! $this->isOpen();
    }

    public function label(): string
    {
        return match ($this) {
            self::NEW => __('bybit_api::enums.order_statuses.new'),
            self::PARTIALLY_FILLED => __('bybit_api::enums.order_statuses.partially_filled'),
            self::UNTRIGGERED => __('bybit_api::enums.order_statuses.untriggered'),
            self::REJECTED => __('bybit_api::enums.order_statuses.rejected'),
            self::PARTIALLY_FILLED_CANCELED => __('bybit_api::enums.order_statuses.partially_filled_canceled'),
            self::FILLED => __('bybit_api::enums.order_statuses.filled'),
            self::CANCELLED => __('bybit_api::enums.order_statuses.cancelled'),
            self::TRIGGERED => __('bybit_api::enums.order_statuses.triggered'),
            self::DEACTIVATED => __('bybit_api::enums.order_statuses.deactivated'),
        };
    }
}
