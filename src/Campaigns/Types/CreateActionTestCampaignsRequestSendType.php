<?php

namespace Mailchimp\Campaigns\Types;

enum CreateActionTestCampaignsRequestSendType: string
{
    case Html = "html";
    case Plaintext = "plaintext";
}
