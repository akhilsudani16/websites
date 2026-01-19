<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Create Notes';

$errors = [];

$Validator = new Validator();

if(! $Validator::string($_POST["body"], 1 , 100) ){
    $errors['body'] = 'A Body Not More 100 characters & also Required';
}

if(empty($errors)){
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $db->query('INSERT INTO notes(body, users_id) VALUES (:body, :users_id)',[
            'body' => $_POST['body'],
            'users_id' => 3
        ]);
    }
}

require "views/note-create.view.php";

