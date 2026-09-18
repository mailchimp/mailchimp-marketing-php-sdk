<?php

namespace Mailchimp\Audiences\Types;

enum CreateAudienceContactRequestEmailChannelMarketingConsentStatus: string
{
    case Confirmed = "confirmed";
    case Consented = "consented";
    case Denied = "denied";
    case Unknown = "unknown";
}
