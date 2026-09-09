<?php

namespace Mailchimp\Types;

enum SegmentTypeItemFuzzySegmentOp: string
{
    case FuzzyIs = "fuzzy_is";
    case FuzzyNot = "fuzzy_not";
}
