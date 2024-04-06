<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Access-Control-Allow-Methods,Authorization,X-Requested-With');

include_once('../core/initialize.php');

$post = new Post($db); 

$data = json_decode(file_get_contents("php://input"));

if (isset($data->id) && isset($data->title) && isset($data->text) && isset($data->image)) {
    $post->id = $data->id;
    $post->title = $data->title;
    $post->text = $data->text;
    $post->image = $data->image;

    if ($post->update()) {
        echo json_encode(array('message' => 'Post updated.'));
    } else {
        echo json_encode(array('message' => 'Post not updated.'));
    }
} else {
    echo json_encode(array('message' => 'Incomplete data. Please provide id, title, text, and image.'));
}

?>