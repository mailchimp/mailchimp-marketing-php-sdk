<?php

namespace Mailchimp\Types;

enum AbTestingOptionsPickWinner: string
{
    case Opens = "opens";
    case Clicks = "clicks";
    case Manual = "manual";
}
