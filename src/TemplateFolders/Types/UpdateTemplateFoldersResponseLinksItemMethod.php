<?php

namespace Mailchimp\TemplateFolders\Types;

enum UpdateTemplateFoldersResponseLinksItemMethod: string
{
    case Get = "GET";
    case Post = "POST";
    case Put = "PUT";
    case Patch = "PATCH";
    case Delete = "DELETE";
    case Options = "OPTIONS";
    case Head = "HEAD";
}
