<?php

$method = $_SERVER['REQUEST_METHOD'];


switch ($method) {
    case 'GET':
        $actual_link = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $data = var_dump(parse_url($actual_link));
        if (!empty($data["query"]) && str_contains($data["query"], 'id=')) {
            require __DIR__ . 'posts/read_single.php';
        } else {
            require __DIR__ . 'posts/read.php';
        }
        exit;
    break;

    case 'POST':
        require __DIR__ . '/posts/create.php';
        exit;
    break;

    case 'PUT':
        require __DIR__ . '/posts/update.php';
        exit;
    break;

    case 'DELETE':
        require __DIR__ . '/posts/delete.php';
        exit;
    break;

    default:
        http_response_code(404); 
        echo "Page not found";
    break;
}

?>