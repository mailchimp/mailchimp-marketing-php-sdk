<?php

namespace Mailchimp\Audiences\Types;

enum CreateAudienceContactRequestTagsItemNameStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
}
