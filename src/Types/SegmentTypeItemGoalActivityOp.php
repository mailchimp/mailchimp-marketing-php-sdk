<?php

namespace Mailchimp\Types;

enum SegmentTypeItemGoalActivityOp: string
{
    case Is = "is";
    case GoalNot = "goal_not";
    case Contains = "contains";
    case GoalNotcontain = "goal_notcontain";
    case Starts = "starts";
    case Ends = "ends";
}
