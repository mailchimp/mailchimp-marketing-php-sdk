<?php

namespace Mailchimp\Lists\Types;

enum CreateInterestCategoryListsRequestType: string
{
    case Checkboxes = "checkboxes";
    case Dropdown = "dropdown";
    case Radio = "radio";
    case Hidden = "hidden";
}
