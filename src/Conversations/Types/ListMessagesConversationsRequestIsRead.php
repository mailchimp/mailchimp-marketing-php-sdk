<?php

namespace Mailchimp\Conversations\Types;

enum ListMessagesConversationsRequestIsRead: string
{
    case True = "true";
    case False = "false";
}
