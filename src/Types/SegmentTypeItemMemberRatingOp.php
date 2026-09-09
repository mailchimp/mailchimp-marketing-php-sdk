<?php

namespace Mailchimp\Types;

enum SegmentTypeItemMemberRatingOp: string
{
    case Is = "is";
    case Not = "not";
    case Greater = "greater";
    case Less = "less";
}
