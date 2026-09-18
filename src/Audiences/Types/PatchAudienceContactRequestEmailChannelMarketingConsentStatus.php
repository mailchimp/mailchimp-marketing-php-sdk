<?php

namespace Mailchimp\Audiences\Types;

enum PatchAudienceContactRequestEmailChannelMarketingConsentStatus: string
{
    case Consented = "consented";
    case Denied = "denied";
    case Confirmed = "confirmed";
    case Unknown = "unknown";
}
