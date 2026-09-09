<?php

namespace Mailchimp\Types;

enum CampaignsContentType: string
{
    case Template = "template";
    case Html = "html";
    case Url = "url";
    case Multichannel = "multichannel";
}
