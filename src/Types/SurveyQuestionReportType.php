<?php

namespace Mailchimp\Types;

enum SurveyQuestionReportType: string
{
    case PickOne = "pickOne";
    case PickMany = "pickMany";
    case Range = "range";
    case Text = "text";
    case Email = "email";
    case ContactInformation = "contactInformation";
    case Dropdown = "dropdown";
}
