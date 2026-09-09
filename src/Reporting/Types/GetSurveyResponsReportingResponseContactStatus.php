<?php

namespace Mailchimp\Reporting\Types;

enum GetSurveyResponsReportingResponseContactStatus: string
{
    case Subscribed = "Subscribed";
    case Unsubscribed = "Unsubscribed";
    case NonSubscribed = "Non-Subscribed";
    case Cleaned = "Cleaned";
    case Archived = "Archived";
}
