<?php

namespace Mailchimp\Reporting\Types;

enum ListSurveyResponsesReportingRequestRespondentFamiliarityIs: string
{
    case New_ = "new";
    case Known = "known";
    case Unknown = "unknown";
}
