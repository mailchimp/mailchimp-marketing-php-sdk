<?php

namespace Mailchimp\Templates\Types;

enum ListTemplatesRequestSortField: string
{
    case DateCreated = "date_created";
    case DateEdited = "date_edited";
    case Name = "name";
}
