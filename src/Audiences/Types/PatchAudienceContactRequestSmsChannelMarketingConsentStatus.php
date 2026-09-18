<?php

namespace Mailchimp\Audiences\Types;

enum PatchAudienceContactRequestSmsChannelMarketingConsentStatus: string
{
    case Consented = "consented";
    case Confirmed = "confirmed";
    case Denied = "denied";
    case Unknown = "unknown";
}
