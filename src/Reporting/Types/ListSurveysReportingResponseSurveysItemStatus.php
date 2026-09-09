<?php

namespace Mailchimp\Reporting\Types;

enum ListSurveysReportingResponseSurveysItemStatus: string
{
    case Published = "published";
    case Unpublished = "unpublished";
}
