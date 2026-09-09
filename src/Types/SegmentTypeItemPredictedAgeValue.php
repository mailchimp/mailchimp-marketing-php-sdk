<?php

namespace Mailchimp\Types;

enum SegmentTypeItemPredictedAgeValue: string
{
    case Eighteen24 = "18-24";
    case TwentyFive34 = "25-34";
    case ThirtyFive44 = "35-44";
    case FortyFive54 = "45-54";
    case FiftyFive64 = "55-64";
    case SixtyFive = "65+";
}
