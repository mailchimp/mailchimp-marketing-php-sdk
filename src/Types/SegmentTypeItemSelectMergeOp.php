<?php

namespace Mailchimp\Types;

enum SegmentTypeItemSelectMergeOp: string
{
    case Is = "is";
    case Not = "not";
    case Blank = "blank";
    case BlankNot = "blank_not";
    case Notcontain = "notcontain";
    case Contains = "contains";
}
