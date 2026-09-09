<?php

namespace Mailchimp\Conversations\Types;

enum ListConversationsRequestHasUnreadMessages: string
{
    case True = "true";
    case False = "false";
}
