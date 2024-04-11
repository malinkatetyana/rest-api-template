<?php

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/api/get/posts/list':
        require __DIR__ . 'api/posts/read.php';
        exit;
        break;

    case '/api/get/posts/info':
        if (var_dump(parse_url($request, PHP_URL_QUERY))){
            require __DIR__ . 'api/posts/read_single.php';
            exit;
        }else{
            http_response_code(400);
            echo "Invalid request: 'id' parameter is missing";
            exit;
        } 
        break;

    case '/api/post/posts':
        require __DIR__ . 'api/posts/create.php';
        exit;
        break;

    case '/api/put/posts':
        require __DIR__ . 'api/posts/update.php';
        exit;
        break;

    case '/api/delete/posts':
        require __DIR__ . 'api/posts/delete.php';
        exit;
        break;

    default:
        http_response_code(404); 
        echo "Page not found";
        break;
}

?>