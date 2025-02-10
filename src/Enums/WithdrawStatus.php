<?php

namespace BybitApi\Enums;

enum WithdrawStatus: string
{
    case SECURITY_CHECK = 'SecurityCheck';
    case PENDING = 'Pending';
    case SUCCESS = 'success';
    case CANCEL_BY_USER = 'CancelByUser';
    case REJECT = 'Reject';
    case FAIL = 'Fail';
    case BLOCKCHAIN_CONFIRMED = 'BlockchainConfirmed';
    case MORE_INFORMATION_REQUIRED = 'MoreInformationRequired';
    case UNKNOWN = 'Unknown';

    public function label(): string
    {
        return match ($this) {
            self::SECURITY_CHECK => __('bybit_api::enums.withdraw_statuses.security_check'),
            self::PENDING => __('bybit_api::enums.withdraw_statuses.pending'),
            self::SUCCESS => __('bybit_api::enums.withdraw_statuses.success'),
            self::CANCEL_BY_USER => __('bybit_api::enums.withdraw_statuses.cancel_by_user'),
            self::REJECT => __('bybit_api::enums.withdraw_statuses.reject'),
            self::FAIL => __('bybit_api::enums.withdraw_statuses.fail'),
            self::BLOCKCHAIN_CONFIRMED => __('bybit_api::enums.withdraw_statuses.blockchain_confirmed'),
            self::MORE_INFORMATION_REQUIRED => __('bybit_api::enums.withdraw_statuses.more_information_required'),
            self::UNKNOWN => __('bybit_api::enums.withdraw_statuses.unknown'),
        };
    }
}
