<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 3;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


if (! $note){
    abort();
}

authorize($note['users_id'] !== $currentUserId);

if ($note['users_id'] === $currentUserId)
{
    abort(Response::FORBIDDEN);
}
require "views/note.view.php";

