<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

if (! Validator::string($_POST['body'], 10, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required (min 10).';
}
if (! Validator::string($_POST['title'], 3, 255)) {
    $errors['title'] = 'A title is required (min 3).';
}

if (! empty($errors)) {
    // Flash old input and errors handled by index.php try/catch if using Exception
    // For simplicity here, we can use the Validator helper approach or manual loading
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, title, user_id) VALUES(:body, :title, :user_id)', [
    'body' => $_POST['body'],
    'title' => $_POST['title'],
    'user_id' => $_SESSION['user']['id']
]);

header('location: /notes');
die();