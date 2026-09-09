<?php

namespace Mailchimp\Lists\Types;

enum CreateMemberTagListsRequestTagsItemStatus: string
{
    case Inactive = "inactive";
    case Active = "active";
}
