<?php

namespace Mailchimp\Types;

enum SegmentTypeItemEcommNumberOp: string
{
    case Is = "is";
    case Not = "not";
    case Greater = "greater";
    case Less = "less";
}
