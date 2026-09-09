<?php

namespace Mailchimp\Lists\Types;

enum UpdateInterestCategoryListsRequestType: string
{
    case Checkboxes = "checkboxes";
    case Dropdown = "dropdown";
    case Radio = "radio";
    case Hidden = "hidden";
}
