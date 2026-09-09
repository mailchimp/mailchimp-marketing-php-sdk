<?php

namespace Mailchimp\Types;

enum SegmentTypeItemBirthdayMergeOp: string
{
    case Is = "is";
    case Not = "not";
    case Blank = "blank";
    case BlankNot = "blank_not";
}
