<?php

namespace Mailchimp\Lists\Types;

enum CreateSegmentListsRequestOptionsMatch: string
{
    case Any = "any";
    case All = "all";
}
