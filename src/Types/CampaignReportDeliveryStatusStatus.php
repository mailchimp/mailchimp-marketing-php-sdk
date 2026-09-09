<?php

namespace Mailchimp\Types;

enum CampaignReportDeliveryStatusStatus: string
{
    case Delivering = "delivering";
    case Delivered = "delivered";
    case Canceling = "canceling";
    case Canceled = "canceled";
}
