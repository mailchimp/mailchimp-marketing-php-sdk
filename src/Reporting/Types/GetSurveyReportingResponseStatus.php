<?php

namespace Mailchimp\Reporting\Types;

enum GetSurveyReportingResponseStatus: string
{
    case Published = "published";
    case Unpublished = "unpublished";
}
