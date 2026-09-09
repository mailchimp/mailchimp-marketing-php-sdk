<?php

namespace Mailchimp\Types;

enum TemplateInstanceContentType: string
{
    case Template = "template";
    case Multichannel = "multichannel";
    case Html = "html";
}
