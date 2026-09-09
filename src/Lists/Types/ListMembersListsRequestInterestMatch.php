<?php

namespace Mailchimp\Lists\Types;

enum ListMembersListsRequestInterestMatch: string
{
    case Any = "any";
    case All = "all";
    case None = "none";
}
