<?php

namespace Mailchimp\Types;

enum LandingPageStatus: string
{
    case Published = "published";
    case Unpublished = "unpublished";
    case Draft = "draft";
}
