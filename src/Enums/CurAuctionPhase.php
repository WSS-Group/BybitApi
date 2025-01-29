<?php

namespace BybitApi\Enums;

enum CurAuctionPhase: string
{
    case NOT_STARTED = 'NotStarted';
    case FINISHED = 'Finished';
    case CALL_AUCTION = 'CallAuction';
    case CALL_AUCTION_NO_CANCEL = 'CallAuctionNoCancel';
    case CROSS_MATCHING = 'CrossMatching';
    case CONTINUOUS_TRADING = 'ContinuousTrading';
    case OTHER = 'Other';
}
