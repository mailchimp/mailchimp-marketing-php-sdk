<?php

namespace Mailchimp\Lists\Types;

enum ListMembersListsRequestSortField: string
{
    case TimestampOpt = "timestamp_opt";
    case TimestampSignup = "timestamp_signup";
    case LastChanged = "last_changed";
}
