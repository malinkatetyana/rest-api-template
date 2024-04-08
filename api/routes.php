<?php

$request = $_SERVER['REQUEST_URI'];
//echo $_SERVER['REQUEST_URI'];


switch ($request) {
    case '/api/routes.php/posts/post':
        require __DIR__ . '/posts/read.php';
        exit;
        break;

    case '/posts/post':
        require __DIR__ . '/posts/create.php';
        exit;
        break;

    case '/posts/put':
        require __DIR__ . '/posts/update.php';
        exit;
        break;

    case '/posts/delete':
        require __DIR__ . '/posts/delete.php';
        exit;
        break;

    default:
        http_response_code(404); 
        echo "Page not found";
        break;
}

?>