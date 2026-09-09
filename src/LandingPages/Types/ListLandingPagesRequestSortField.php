<?php

namespace Mailchimp\LandingPages\Types;

enum ListLandingPagesRequestSortField: string
{
    case CreatedAt = "created_at";
    case UpdatedAt = "updated_at";
}
