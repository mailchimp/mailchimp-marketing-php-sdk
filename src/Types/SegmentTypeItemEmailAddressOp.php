<?php

namespace Mailchimp\Types;

enum SegmentTypeItemEmailAddressOp: string
{
    case Is = "is";
    case Not = "not";
    case Contains = "contains";
    case Notcontain = "notcontain";
    case Starts = "starts";
    case Ends = "ends";
    case Greater = "greater";
    case Less = "less";
}
