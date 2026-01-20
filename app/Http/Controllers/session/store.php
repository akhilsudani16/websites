<?php

use Core\App;
use Core\Database;
use Core\Validator;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

if ($user) {
    if (password_verify($password, $user['password_hash'])) {
        // Login success
        $_SESSION['user'] = [
            'email' => $user['email'],
            'id' => $user['id']
        ];
        session_regenerate_id(true);

        redirect('/notes');
    }
}

// Login fail
return view('session/create.view.php', [
    'errors' => ['email' => 'No matching account found for that email address and password.']
]);