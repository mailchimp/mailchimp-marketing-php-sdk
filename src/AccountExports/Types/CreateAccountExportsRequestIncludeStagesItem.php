<?php

namespace Mailchimp\AccountExports\Types;

enum CreateAccountExportsRequestIncludeStagesItem: string
{
    case Audiences = "audiences";
    case Campaigns = "campaigns";
    case Events = "events";
    case GalleryFiles = "gallery_files";
    case Reports = "reports";
    case Templates = "templates";
}
