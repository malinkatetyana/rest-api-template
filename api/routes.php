<?php

$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case '/posts':
        require __DIR__ . '/posts/router.php';
        exit;
        break;

    default:
        http_response_code(404); 
        echo $request . " not found";
        break;
}

?>