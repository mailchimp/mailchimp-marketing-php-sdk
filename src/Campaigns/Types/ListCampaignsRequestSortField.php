<?php

namespace Mailchimp\Campaigns\Types;

enum ListCampaignsRequestSortField: string
{
    case CreateTime = "create_time";
    case SendTime = "send_time";
}
