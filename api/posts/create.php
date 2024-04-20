<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../../core/initialize.php');

$post = new Post($db); 

$data = json_decode(file_get_contents("php://input"));

if (isset($data->title) && isset($data->text) && isset($data->image)) {
    $post->title = $data->title;
    $post->text = $data->text;
    $post->image = $data->image;

    if ($post->create()) {
        echo json_encode(array('message' => 'Post created.'));
    } else {
        echo json_encode(array('message' => 'Post not created.'));
    }
} else {
    echo json_encode(array('message' => 'Incomplete data. Please provide title, text, and image.'));
}

?>