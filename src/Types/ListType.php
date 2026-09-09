<?php

namespace Mailchimp\Types;

enum ListType: string
{
    case Saved = "saved";
    case Static_ = "static";
    case Fuzzy = "fuzzy";
}
