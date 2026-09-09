<?php

namespace Mailchimp\Templates\Types;

enum ListTemplatesRequestContentType: string
{
    case Html = "html";
    case Template = "template";
    case Multichannel = "multichannel";
}
