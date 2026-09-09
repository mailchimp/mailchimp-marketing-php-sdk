<?php

namespace Mailchimp\Types;

enum SegmentTypeItemAddressMergeOp: string
{
    case Contains = "contains";
    case Notcontain = "notcontain";
    case Blank = "blank";
    case BlankNot = "blank_not";
}
