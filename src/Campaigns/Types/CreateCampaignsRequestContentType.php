<?php

namespace Mailchimp\Campaigns\Types;

enum CreateCampaignsRequestContentType: string
{
    case Template = "template";
    case Multichannel = "multichannel";
}
