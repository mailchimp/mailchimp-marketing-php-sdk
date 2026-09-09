<?php

namespace Mailchimp\Types;

enum SegmentTypeItemAimOp: string
{
    case Open = "open";
    case Click = "click";
    case Sent = "sent";
    case Noopen = "noopen";
    case Noclick = "noclick";
    case Nosent = "nosent";
}
