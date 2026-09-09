<?php

namespace Mailchimp\Types;

enum SegmentTypeItemInterestsOp: string
{
    case Interestcontains = "interestcontains";
    case Interestcontainsall = "interestcontainsall";
    case Interestnotcontains = "interestnotcontains";
}
