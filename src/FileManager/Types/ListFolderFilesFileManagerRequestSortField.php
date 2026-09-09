<?php

namespace Mailchimp\FileManager\Types;

enum ListFolderFilesFileManagerRequestSortField: string
{
    case AddedDate = "added_date";
    case Name = "name";
    case Size = "size";
}
