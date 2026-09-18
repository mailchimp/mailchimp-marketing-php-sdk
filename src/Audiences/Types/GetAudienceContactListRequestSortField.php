<?php

namespace Mailchimp\Audiences\Types;

enum GetAudienceContactListRequestSortField: string
{
    case CreatedAt = "created_at";
    case UpdatedAt = "updated_at";
}
