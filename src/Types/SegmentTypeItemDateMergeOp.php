<?php

namespace Mailchimp\Types;

enum SegmentTypeItemDateMergeOp: string
{
    case Is = "is";
    case Not = "not";
    case Less = "less";
    case Blank = "blank";
    case BlankNot = "blank_not";
    case Greater = "greater";
}
