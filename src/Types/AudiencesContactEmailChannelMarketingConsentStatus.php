<?php

namespace Mailchimp\Types;

enum AudiencesContactEmailChannelMarketingConsentStatus: string
{
    case Consented = "consented";
    case Denied = "denied";
    case Confirmed = "confirmed";
    case Unknown = "unknown";
}
