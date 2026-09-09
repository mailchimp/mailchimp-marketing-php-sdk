<?php

namespace Mailchimp\LandingPages\Types;

enum CreateLandingPagesRequestType: string
{
    case Signup = "signup";
    case Product = "product";
}
