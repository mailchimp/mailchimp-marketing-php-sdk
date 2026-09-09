<?php

namespace Mailchimp\Types;

enum SegmentTypeItemSurveyMonkeyOp: string
{
    case Started = "started";
    case Completed = "completed";
    case NotStarted = "not_started";
    case NotCompleted = "not_completed";
}
