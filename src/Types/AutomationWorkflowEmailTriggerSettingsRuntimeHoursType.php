<?php

namespace Mailchimp\Types;

enum AutomationWorkflowEmailTriggerSettingsRuntimeHoursType: string
{
    case SendAsap = "send_asap";
    case SendBetween = "send_between";
    case SendAt = "send_at";
}
