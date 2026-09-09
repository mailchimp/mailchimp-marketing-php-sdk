<?php

namespace Mailchimp\Campaigns\Types;

enum ListSendChecklistCampaignsResponseItemsItemType: string
{
    case Success = "success";
    case Warning = "warning";
    case Error = "error";
}
