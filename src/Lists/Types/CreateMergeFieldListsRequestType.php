<?php

namespace Mailchimp\Lists\Types;

enum CreateMergeFieldListsRequestType: string
{
    case Text = "text";
    case Number = "number";
    case Address = "address";
    case Phone = "phone";
    case Date = "date";
    case Url = "url";
    case Imageurl = "imageurl";
    case Radio = "radio";
    case Dropdown = "dropdown";
    case Birthday = "birthday";
    case Zip = "zip";
}
