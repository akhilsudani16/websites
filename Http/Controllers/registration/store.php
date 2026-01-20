<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$name = $_POST['name'];

$errors = [];
if (!Validator::email($email)) $errors['email'] = 'Please provide a valid email address.';
if (!Validator::string($password, 8, 255)) $errors['password'] = 'Password must be at least 8 characters.';

if (! empty($errors)) {
    return view('registration/create.view.php', ['errors' => $errors]);
}

$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

if ($user) {
    header('location: /');
    exit();
} else {
    $db->query('INSERT INTO users(name, email, password_hash) VALUES(:name, :email, :password)', [
        'name' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // Log the user in
    $newUser = $db->query('select * from users where email = :email', ['email' => $email])->find();
    $_SESSION['user'] = [
        'email' => $newUser['email'],
        'id' => $newUser['id'] // Important for note ownership
    ];
    session_regenerate_id(true);

    header('location: /notes');
    exit();
}