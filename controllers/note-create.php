<?php

$heading = 'Create Note';

require '../Validator.php';

$config =(require '../config.php');
$db = new Database($config['database']);

$errors = [];

$Validator = new Validator();


if (! Validator::string($_POST['title'], 1, 1000)) {
    $errors['title'] = 'A body of no more than 1,000 characters is required.';
}

if(empty($errors)){
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $db->query('INSERT INTO notes(user_id, title, body, create_at , updated_at) VALUES (:user_id, :title, :body, NOW(), NOW())',[
            'user_id' => 1,
            'title' => $_POST['title'],
            'body' => $_POST['body'],
        ]);
    }
}

require "../views/note-create.view.php";

