<?php

namespace Mailchimp\Reporting\Types;

enum ListSurveyQuestionAnswersReportingRequestRespondentFamiliarityIs: string
{
    case New_ = "new";
    case Known = "known";
    case Unknown = "unknown";
}
