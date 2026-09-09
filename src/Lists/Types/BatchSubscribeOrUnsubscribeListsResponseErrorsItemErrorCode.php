<?php

namespace Mailchimp\Lists\Types;

enum BatchSubscribeOrUnsubscribeListsResponseErrorsItemErrorCode: string
{
    case ErrorContactExists = "ERROR_CONTACT_EXISTS";
    case ErrorGeneric = "ERROR_GENERIC";
}
