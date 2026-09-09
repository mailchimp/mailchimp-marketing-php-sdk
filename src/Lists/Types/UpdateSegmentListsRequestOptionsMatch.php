<?php

namespace Mailchimp\Lists\Types;

enum UpdateSegmentListsRequestOptionsMatch: string
{
    case Any = "any";
    case All = "all";
}
