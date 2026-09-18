<?php

namespace Mailchimp\Audiences\Types;

enum PatchAudienceContactRequestMergeFieldValidationMode: string
{
    case IgnoreRequiredChecks = "ignore_required_checks";
    case Strict = "strict";
}
