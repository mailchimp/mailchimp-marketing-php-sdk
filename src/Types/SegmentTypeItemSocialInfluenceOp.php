<?php

namespace Mailchimp\Types;

enum SegmentTypeItemSocialInfluenceOp: string
{
    case Is = "is";
    case Not = "not";
    case Greater = "greater";
    case Less = "less";
}
