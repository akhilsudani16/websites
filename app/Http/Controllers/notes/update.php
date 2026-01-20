<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUser = $_SESSION['user']['id'];
$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUser);

$errors = [];
if (! Validator::string($_POST['body'], 10, 1000)) {
    $errors['body'] = 'Body of min 10 required.';
}

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body, title = :title WHERE id = :id', [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
    'title' => $_POST['title']
]);

header('location: /notes');
die();