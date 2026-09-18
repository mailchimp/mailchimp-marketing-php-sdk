<?php

namespace Mailchimp\Types;

enum AudiencesContactSmsChannelMarketingConsentStatus: string
{
    case Consented = "consented";
    case Confirmed = "confirmed";
    case Denied = "denied";
    case Unknown = "unknown";
}
