<?php

namespace Mailchimp\Types;

enum SegmentTypeItemEcommCategoryOp: string
{
    case Is = "is";
    case Not = "not";
    case Contains = "contains";
    case Notcontain = "notcontain";
    case Starts = "starts";
    case Ends = "ends";
}
