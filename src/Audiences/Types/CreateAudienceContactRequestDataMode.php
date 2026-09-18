<?php

namespace Mailchimp\Audiences\Types;

enum CreateAudienceContactRequestDataMode: string
{
    case Historical = "historical";
    case Live = "live";
}
