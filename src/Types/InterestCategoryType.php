<?php

namespace Mailchimp\Types;

enum InterestCategoryType: string
{
    case Checkboxes = "checkboxes";
    case Dropdown = "dropdown";
    case Radio = "radio";
    case Hidden = "hidden";
}
