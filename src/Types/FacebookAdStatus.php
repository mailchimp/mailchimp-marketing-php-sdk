<?php

namespace Mailchimp\Types;

enum FacebookAdStatus: string
{
    case Save = "save";
    case Paused = "paused";
    case Schedule = "schedule";
    case Scheduled = "scheduled";
    case Sending = "sending";
    case Sent = "sent";
    case Canceled = "canceled";
    case Canceling = "canceling";
    case Active = "active";
    case Disconnected = "disconnected";
    case Somepaused = "somepaused";
    case Draft = "draft";
    case Completed = "completed";
    case PartialRejected = "partialRejected";
    case Pending = "pending";
    case Rejected = "rejected";
    case Published = "published";
    case Unpublished = "unpublished";
}
