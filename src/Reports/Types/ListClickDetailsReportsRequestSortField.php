<?php

namespace Mailchimp\Reports\Types;

enum ListClickDetailsReportsRequestSortField: string
{
    case TotalClicks = "total_clicks";
    case UniqueClicks = "unique_clicks";
}
