<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailRecipientsSegmentOptsMatch: string
{
    case Any = "any";
    case All = "all";
}
