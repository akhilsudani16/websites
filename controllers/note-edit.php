<?php

$heading = 'Create Note';

require '../Validator.php';

$config =(require '../config.php');
$db = new Database($config['database']);

$errors = [];

$Validator = new Validator();

require "../views/note-edit.view.php";

