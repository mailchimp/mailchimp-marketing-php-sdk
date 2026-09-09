<?php

namespace Mailchimp\Types;

enum CampaignsDeliveryStatusStatus: string
{
    case Delivering = "delivering";
    case Delivered = "delivered";
    case Canceling = "canceling";
    case Canceled = "canceled";
}
