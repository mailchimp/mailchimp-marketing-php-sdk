<?php

namespace Mailchimp\Types;

enum FacebookAdsAudienceType: string
{
    case CustomAudience = "Custom Audience";
    case LookalikeAudience = "Lookalike Audience";
    case InterestBasedAudience = "Interest-based Audience";
}
