<?php

namespace Mailchimp\Automations\Types;

enum ListAutomationsRequestStatus: string
{
    case Save = "save";
    case Paused = "paused";
    case Sending = "sending";
}
