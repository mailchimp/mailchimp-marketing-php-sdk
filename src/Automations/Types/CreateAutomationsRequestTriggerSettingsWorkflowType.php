<?php

namespace Mailchimp\Automations\Types;

enum CreateAutomationsRequestTriggerSettingsWorkflowType: string
{
    case AbandonedBrowse = "abandonedBrowse";
    case AbandonedCart = "abandonedCart";
    case EmailFollowup = "emailFollowup";
    case SingleWelcome = "singleWelcome";
}
