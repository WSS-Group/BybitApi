<?php

namespace BybitApi\Enums;

enum CreateType: string
{
    case CREATE_BY_USER = 'CreateByUser';
    case CREATE_BY_ADMIN_CLOSING = 'CreateByAdminClosing';
    case CREATE_BY_SETTLE = 'CreateBySettle';
    case CREATE_BY_STOP_ORDER = 'CreateByStopOrder';
    case CREATE_BY_TAKE_PROFIT = 'CreateByTakeProfit';
    case CREATE_BY_PARTIAL_TAKE_PROFIT = 'CreateByPartialTakeProfit';
    case CREATE_BY_STOP_LOSS = 'CreateByStopLoss';
    case CREATE_BY_PARTIAL_STOP_LOSS = 'CreateByPartialStopLoss';
    case CREATE_BY_TRAILING_STOP = 'CreateByTrailingStop';
    case CREATE_BY_LIQ = 'CreateByLiq';
    case CREATE_BY_TAKE_OVER_PASS_THROUGH_IF = 'CreateByTakeOver_PassThroughIf';
    case CREATE_BY_ADL_PASS_THROUGH = 'CreateByAdl_PassThrough';
    case CREATE_BY_BLOCK_PASS_THROUGH = 'CreateByBlock_PassThrough';
    case CREATE_BY_BLOCK_TRADE_MOVE_POSITION_PASS_THROUGH = 'CreateByBlockTradeMovePosition_PassThrough';
    case CREATE_BY_CLOSING = 'CreateByClosing';
    case CREATE_BY_FGRID_BOT = 'CreateByFGridBot';
    case CLOSE_BY_FGRID_BOT = 'CloseByFGridBot';
    case CREATE_BY_TWAP = 'CreateByTWAP';
    case CREATE_BY_TV_SIGNAL = 'CreateByTVSignal';
    case CREATE_BY_MM_RATE_CLOSE = 'CreateByMmRateClose';
    case CREATE_BY_MARTINGALE_BOT = 'CreateByMartingaleBot';
    case CLOSE_BY_MARTINGALE_BOT = 'CloseByMartingaleBot';
    case CREATE_BY_ICE_BERG = 'CreateByIceBerg';
    case CREATE_BY_ARBITRAGE = 'CreateByArbitrage';
    case CREATE_BY_DDH = 'CreateByDdh';
}
