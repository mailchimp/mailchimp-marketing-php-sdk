<?php

namespace Mailchimp\Types;

enum AutomationWorkflowTriggerSettingsRuntimeHoursType: string
{
    case SendAsap = "send_asap";
    case SendBetween = "send_between";
    case SendAt = "send_at";
}
