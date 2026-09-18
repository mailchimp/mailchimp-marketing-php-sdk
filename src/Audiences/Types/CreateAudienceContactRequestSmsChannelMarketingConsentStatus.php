<?php

namespace Mailchimp\Audiences\Types;

enum CreateAudienceContactRequestSmsChannelMarketingConsentStatus: string
{
    case Consented = "consented";
    case Confirmed = "confirmed";
    case Unknown = "unknown";
}
