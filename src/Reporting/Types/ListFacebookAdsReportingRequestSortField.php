<?php

namespace Mailchimp\Reporting\Types;

enum ListFacebookAdsReportingRequestSortField: string
{
    case CreatedAt = "created_at";
    case UpdatedAt = "updated_at";
    case EndTime = "end_time";
}
