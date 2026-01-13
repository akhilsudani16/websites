<?php

$dsn = 'mysql:host=localhost;port=3306;dbname=myapp;charset=utf8mb4';
$username = 'root';
$password = '';

$pdo = new PDO($dsn, $username, $password);

$posts = ('select * from posts where id = 3')->fetchAll(PDO::FETCH_ASSOC);

require("../views/notes.view.php");
