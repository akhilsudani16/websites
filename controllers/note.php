<?php

$config = require '../config.php';
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

$note = $db->query('SELECT * FROM notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


if (! $note){
    abort();
}

authorize($note['user_id'] === $currentUserId);

if ($note['user_id'] !== $currentUserId)
{
    abort(Response::FORBIDDEN);
}
require "../views/note.view.php";













//public function only($key)
//{
//    $this->routes[array_key_last($this->routes)]['middleware'] = $key;
//    return $this;
//}
//
//public function route($uri, $method)
//{
//    foreach ($this->routes as $route) {
//
//        if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
//
//            Middleware::resolve($route['middleware']);
//
//            return require base_path('Http/controllers/' . $route['controller']);
//        }
//    }
//    $this->abort();
//}
//
//public function previousUrl()
//{
//    return $_SERVER['HTTP_REFERER'];
//}
//
//protected function abort($code = 404)
//{
//    http_response_code($code);
//    require base_path("view/{$code}.php");
//    die();
//}
//}
//
////function routeToController($uri, $routes)
////{
////    if (array_key_exists($uri, $routes)) {
////        require base_path($routes[$uri]);
////    } else {
////        abort();
////    }
////}
