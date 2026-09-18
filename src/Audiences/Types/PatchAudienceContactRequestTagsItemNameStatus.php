<?php

namespace Mailchimp\Audiences\Types;

enum PatchAudienceContactRequestTagsItemNameStatus: string
{
    case Active = "active";
    case Inactive = "inactive";
}
