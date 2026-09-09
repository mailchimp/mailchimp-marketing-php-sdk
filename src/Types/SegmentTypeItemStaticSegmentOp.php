<?php

namespace Mailchimp\Types;

enum SegmentTypeItemStaticSegmentOp: string
{
    case StaticIs = "static_is";
    case StaticNot = "static_not";
}
