<?php

namespace Mailchimp\Types;

enum SegmentTypeItemGoalTimestampOp: string
{
    case Greater = "greater";
    case Less = "less";
    case Is = "is";
}
