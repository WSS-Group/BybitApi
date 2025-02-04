<?php

namespace BybitApi\Enums;

enum CancelType: string
{
    case CANCEL_BY_USER = 'CancelByUser';
    case CANCEL_BY_REDUCE_ONLY = 'CancelByReduceOnly';
    case CANCEL_BY_PREPARE_LIQ = 'CancelByPrepareLiq';
    case CANCEL_ALL_BEFORE_LIQ = 'CancelAllBeforeLiq';
    case CANCEL_BY_PREPARE_ADL = 'CancelByPrepareAdl';
    case CANCEL_ALL_BEFORE_ADL = 'CancelAllBeforeAdl';
    case CANCEL_BY_ADMIN = 'CancelByAdmin';
    case CANCEL_BY_SETTLE = 'CancelBySettle';
    case CANCEL_BY_TP_SL_TS_CLEAR = 'CancelByTpSlTsClear';
    case CANCEL_BY_SMP = 'CancelBySmp';
    case CANCEL_BY_CANNOT_AFFORD_ORDER_COST = 'CancelByCannotAffordOrderCost';
    case CANCEL_BY_PM_TRIAL_MM_OVER_EQUITY = 'CancelByPmTrialMmOverEquity';
    case CANCEL_BY_ACCOUNT_BLOCKING = 'CancelByAccountBlocking';
    case CANCEL_BY_DELIVERY = 'CancelByDelivery';
    case CANCEL_BY_MMP_TRIGGERED = 'CancelByMmpTriggered';
    case CANCEL_BY_CROSS_SELF_MUCH = 'CancelByCrossSelfMuch';
    case CANCEL_BY_CROSS_REACH_MAX_TRADE_NUM = 'CancelByCrossReachMaxTradeNum';
    case CANCEL_BY_DCP = 'CancelByDCP';
}
