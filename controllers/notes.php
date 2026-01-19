<?php

$config = require '../config.php';
$db = new Database($config['database']);

$heading = 'My Notes';

$currentUser = 1;

$notes = $db->query("SELECT * FROM notes where user_id =  '$currentUser'")->fetchAll();

require "../views/notes.view.php";

