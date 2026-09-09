<?php

namespace Mailchimp\Types;

enum BatchStatus: string
{
    case Pending = "pending";
    case Preprocessing = "preprocessing";
    case Started = "started";
    case Finalizing = "finalizing";
    case Finished = "finished";
}
