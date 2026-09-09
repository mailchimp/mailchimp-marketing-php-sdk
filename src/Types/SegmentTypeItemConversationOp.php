<?php

namespace Mailchimp\Types;

enum SegmentTypeItemConversationOp: string
{
    case Member = "member";
    case Notmember = "notmember";
}
