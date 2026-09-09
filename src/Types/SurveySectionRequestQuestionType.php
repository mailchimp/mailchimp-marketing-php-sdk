<?php

namespace Mailchimp\Types;

enum SurveySectionRequestQuestionType: string
{
    case PickOne = "pickOne";
    case PickMany = "pickMany";
    case Range = "range";
    case Text = "text";
    case Email = "email";
    case ContactInformation = "contactInformation";
    case Dropdown = "dropdown";
}
