<?php

$heading = 'Create Note';

require '../Validator.php';

$config =(require '../config.php');
$db = new Database($config['database']);

$errors = [];

$Validator = new Validator();

password_hash($_POST['password'] , PASSWORD_BCRYPT);

if(empty($errors)){
    if($_SERVER["REQUEST_METHOD"] === "POST") {
        $db->query('INSERT INTO users(name, email, password, create_at) VALUES (:name, :email, :password, NOW())',[
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);
    }
}

require "../views/note-create.view.php";

