<?php

namespace Mailchimp\Types;

enum SegmentTypeItemDateField: string
{
    case TimestampOpt = "timestamp_opt";
    case InfoChanged = "info_changed";
    case EcommDate = "ecomm_date";
}
