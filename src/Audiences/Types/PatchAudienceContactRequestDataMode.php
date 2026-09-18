<?php

namespace Mailchimp\Audiences\Types;

enum PatchAudienceContactRequestDataMode: string
{
    case Historical = "historical";
    case Live = "live";
}
