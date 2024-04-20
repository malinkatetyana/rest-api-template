<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once('../../core/initialize.php');

$post = new Post($db); 

$result = $post->read_post();
$postmeta = $post->read_postmeta();

$num = $result->rowCount();

if ($num > 0) {
    $post_arr = array();
    $post_arr['data'] = array();
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $post_item = array();

        foreach ($row as $key => $value) {
            if ($key == 'post_type'){
                $post_type = $value;
            }

            $post_item[$key] = $value;
        }

        if ($post_type == 'page'){

        $id = $post_item['ID'];

        $postmeta->execute();

        while ($meta_row = $postmeta->fetch(PDO::FETCH_ASSOC)) {
            $postmeta_item = array();

            foreach ($meta_row as $key => $value) {

                if ($key=='post_id'){
                    $post_id = $value;
                }

                if ($key=='meta_key'){
                    $meta_key = $value;
                }

                if ($key!='post_id' && $key!='meta_id'){
                    $postmeta_item[$key] = $value;
                }
            }

            if ($id == $post_id && substr($meta_key, 0, 1) != '_') { 
                $post_item['postmeta'][] = $postmeta_item; 
            }
        }

        array_push($post_arr['data'], $post_item);
    }
    }


    if (empty($post_arr['data'])){
        echo json_encode(array('message' => 'No posts found.'));
    } else {
        echo json_encode($post_arr);
    }
    
} else {
    echo json_encode(array('message' => 'No posts found.'));
}

?>