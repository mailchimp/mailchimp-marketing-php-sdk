<?php

namespace Mailchimp\Types;

enum SegmentTypeItemEmailClientOp: string
{
    case ClientIs = "client_is";
    case ClientNot = "client_not";
}
