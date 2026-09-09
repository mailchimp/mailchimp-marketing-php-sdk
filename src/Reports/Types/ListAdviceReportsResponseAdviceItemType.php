<?php

namespace Mailchimp\Reports\Types;

enum ListAdviceReportsResponseAdviceItemType: string
{
    case Negative = "negative";
    case Positive = "positive";
    case Neutral = "neutral";
}
