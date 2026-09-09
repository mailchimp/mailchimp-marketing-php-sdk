<?php

namespace Mailchimp\Types;

enum SegmentTypeItemTextMergeOp: string
{
    case Is = "is";
    case Not = "not";
    case Contains = "contains";
    case Notcontain = "notcontain";
    case Starts = "starts";
    case Ends = "ends";
    case Greater = "greater";
    case Less = "less";
    case Blank = "blank";
    case BlankNot = "blank_not";
}
