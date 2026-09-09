<?php

namespace Mailchimp\Lists\Types;

enum ListSegmentsListsRequestExcludeType: string
{
    case Saved = "saved";
    case Static_ = "static";
    case Fuzzy = "fuzzy";
}
