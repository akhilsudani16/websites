<?php

$heading = 'Create Note';

require '../Validator.php';

$config =(require '../config.php');
$note = $db = new Database($config['database']);

$errors = [];
$Validator = new Validator();

//authorize($note['id'] === $_POST['id']);
//
//$db->query('update notes set body = :body where id = :id', [
//    'body' => $_POST['body'],
//    'id' => $_POST['id']
//]);
//
//if (! $Validator::string($_POST['Body'], 1 , 1000)){
//    $errors['body'] = 'A body no more than 1000 character and also required.';
//}



require "../views/note-edit.view.php";

