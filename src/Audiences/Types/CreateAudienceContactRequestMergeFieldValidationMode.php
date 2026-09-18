<?php

namespace Mailchimp\Audiences\Types;

enum CreateAudienceContactRequestMergeFieldValidationMode: string
{
    case IgnoreRequiredChecks = "ignore_required_checks";
    case Strict = "strict";
}
