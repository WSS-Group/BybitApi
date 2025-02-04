<?php

namespace BybitApi\Enums;

enum RejectReason: string
{
    case EC_NOERROR = 'EC_NoError';
    case EC_OTHERS = 'EC_Others';
    case EC_UNKNOWNMESSAGETYPE = 'EC_UnknownMessageType';
    case EC_MISSINGCLORDID = 'EC_MissingClOrdID';
    case EC_MISSINGORIGCLORDID = 'EC_MissingOrigClOrdID';
    case EC_CLORDIDORIGCLORDIDARETHESAME = 'EC_ClOrdIDOrigClOrdIDAreTheSame';
    case EC_DUPLICATEDCLORDID = 'EC_DuplicatedClOrdID';
    case EC_ORIGCLORDIDDOESNOTEXIST = 'EC_OrigClOrdIDDoesNotExist';
    case EC_TOOLATETOCANCEL = 'EC_TooLateToCancel';
    case EC_UNKNOWNORDERTYPE = 'EC_UnknownOrderType';
    case EC_UNKNOWNSIDE = 'EC_UnknownSide';
    case EC_UNKNOWNTIMEINFORCE = 'EC_UnknownTimeInForce';
    case EC_WRONGLYROUTED = 'EC_WronglyRouted';
    case EC_MARKETORDERPRICEISNOTZERO = 'EC_MarketOrderPriceIsNotZero';
    case EC_LIMITORDERINVALIDPRICE = 'EC_LimitOrderInvalidPrice';
    case EC_NOENOUGHQTYTOFILL = 'EC_NoEnoughQtyToFill';
    case EC_NOIMMEDIATEQTYTOFILL = 'EC_NoImmediateQtyToFill';
    case EC_PERCANCELREQUEST = 'EC_PerCancelRequest';
    case EC_MARKETORDERCANNOTBEPOSTONLY = 'EC_MarketOrderCannotBePostOnly';
    case EC_POSTONLYWILLTAKELIQUIDITY = 'EC_PostOnlyWillTakeLiquidity';
    case EC_CANCELREPLACEORDER = 'EC_CancelReplaceOrder';
    case EC_INVALIDSYMBOLSTATUS = 'EC_InvalidSymbolStatus';
    case EC_CANCELFORNOFULLFILL = 'EC_CancelForNoFullFill';
    case EC_BYSELFMATCH = 'EC_BySelfMatch';
    case EC_INCALLAUCTIONSTATUS = 'EC_InCallAuctionStatus';
    case EC_QTYCANNOTBEZERO = 'EC_QtyCannotBeZero';
    case EC_MARKETORDERNOSUPPORTTIF = 'EC_MarketOrderNoSupportTIF';
    case EC_REACHMAXTRADENUM = 'EC_ReachMaxTradeNum';
    case EC_INVALIDPRICESCALE = 'EC_InvalidPriceScale';
    case EC_BITINDEXINVALID = 'EC_BitIndexInvalid';
    case EC_STOPBYSELFMATCH = 'EC_StopBySelfMatch';
    case EC_INVALIDSMPTYPE = 'EC_InvalidSmpType';
    case EC_CANCELBYMMP = 'EC_CancelByMMP';
    case EC_INVALIDUSERTYPE = 'EC_InvalidUserType';
    case EC_INVALIDMIRROROID = 'EC_InvalidMirrorOid';
    case EC_INVALIDMIRRORUID = 'EC_InvalidMirrorUid';
    case EC_ECINVALIDQTY = 'EC_EcInvalidQty';
    case EC_INVALIDAMOUNT = 'EC_InvalidAmount';
    case EC_LOADORDERCANCEL = 'EC_LoadOrderCancel';
    case EC_MARKETQUOTENOSUPPSELL = 'EC_MarketQuoteNoSuppSell';
    case EC_DISORDERORDERID = 'EC_DisorderOrderID';
    case EC_INVALIDBASEVALUE = 'EC_InvalidBaseValue';
    case EC_LOADORDERCANMATCH = 'EC_LoadOrderCanMatch';
    case EC_SECURITYSTATUSFAIL = 'EC_SecurityStatusFail';
    case EC_REACHRISKPRICELIMIT = 'EC_ReachRiskPriceLimit';
    case EC_ORDERNOTEXIST = 'EC_OrderNotExist';
    case EC_CANCELBYORDERVALUEZERO = 'EC_CancelByOrderValueZero';
    case EC_CANCELBYMATCHVALUEZERO = 'EC_CancelByMatchValueZero';
    case EC_REACHMARKETPRICELIMIT = 'EC_ReachMarketPriceLimit';
}
