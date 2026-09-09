<?php

namespace Mailchimp\Types;

enum SegmentTypeItemSignupSourceOp: string
{
    case SourceIs = "source_is";
    case SourceNot = "source_not";
}
