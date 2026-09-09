<?php

namespace Mailchimp\Types;

enum SignupFormContentsItemSection: string
{
    case SignupMessage = "signup_message";
    case UnsubMessage = "unsub_message";
    case SignupThankYouTitle = "signup_thank_you_title";
}
