<?php

namespace Mailchimp\Types;

enum SegmentTypeItemDateOp: string
{
    case Greater = "greater";
    case Less = "less";
    case Is = "is";
    case Not = "not";
    case Blank = "blank";
    case BlankNot = "blank_not";
    case Within = "within";
    case Notwithin = "notwithin";
}
