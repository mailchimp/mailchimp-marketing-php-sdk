<?php

namespace Mailchimp\Lists\Types;

enum ListMemberNotesListsRequestSortField: string
{
    case CreatedAt = "created_at";
    case UpdatedAt = "updated_at";
    case NoteId = "note_id";
}
