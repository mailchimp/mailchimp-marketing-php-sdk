<?php

namespace Mailchimp\Types;

enum ListOptionsMatch: string
{
    case Any = "any";
    case All = "all";
}
