<?php

namespace Mailchimp\FileManager\Types;

enum ListFilesFileManagerRequestSortField: string
{
    case AddedDate = "added_date";
    case Name = "name";
    case Size = "size";
}
