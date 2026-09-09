<?php

namespace Mailchimp\VerifiedDomains\Types;

enum ListVerifiedDomainsResponseDomainsItemStatus: string
{
    case VerificationInProgress = "VERIFICATION_IN_PROGRESS";
    case Verified = "VERIFIED";
    case Expired = "EXPIRED";
    case Error = "ERROR";
    case AuthenticationInProgress = "AUTHENTICATION_IN_PROGRESS";
    case AuthenticationError = "AUTHENTICATION_ERROR";
    case Authenticated = "AUTHENTICATED";
}
