<?php

namespace Mailchimp\Types;

enum CampaignDeliveryStatusStatus: string
{
    case Delivering = "delivering";
    case Delivered = "delivered";
    case Canceling = "canceling";
    case Canceled = "canceled";
}
