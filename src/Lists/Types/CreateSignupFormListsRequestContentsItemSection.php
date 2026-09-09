<?php

namespace Mailchimp\Lists\Types;

enum CreateSignupFormListsRequestContentsItemSection: string
{
    case SignupMessage = "signup_message";
    case UnsubMessage = "unsub_message";
    case SignupThankYouTitle = "signup_thank_you_title";
}
