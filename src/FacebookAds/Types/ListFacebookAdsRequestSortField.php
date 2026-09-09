<?php

namespace Mailchimp\FacebookAds\Types;

enum ListFacebookAdsRequestSortField: string
{
    case CreatedAt = "created_at";
    case UpdatedAt = "updated_at";
    case EndTime = "end_time";
}
