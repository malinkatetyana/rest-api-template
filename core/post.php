<?php

    class Post{
        private $conn;
        private $table_posts = 'wp_posts';
        private $table_postmeta = 'wp_postmeta';

        public $id;

        public function __construct($db){
            $this->conn = $db;
        } 

        public function read_post(){
            $query = 'SELECT * FROM '.$this->table_posts;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function read_postmeta(){
            $query = 'SELECT * FROM '.$this->table_postmeta;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function read_post_single(){
            $query = 'SELECT * FROM '.$this->table_posts.' WHERE id = ?';
        
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
        
            return $stmt;
        }

        // public function create(){
        //     $query = 'INSERT INTO ' . $this->table . ' SET title = :title, text = :text, image = :image';
        
        //     $stmt = $this->conn->prepare($query);
        
        //     $this->title = htmlspecialchars(strip_tags($this->title));
        //     $this->text = htmlspecialchars(strip_tags($this->text));
        //     $this->image = htmlspecialchars(strip_tags($this->image));
        
        //     $stmt->bindParam(':title', $this->title);
        //     $stmt->bindParam(':text', $this->text);
        //     $stmt->bindParam(':image', $this->image);
        
        //     if ($stmt->execute()) {
        //         return true;
        //     } else {
        //         printf("Error: %s.\n", $stmt->error);
        //         return false;
        //     }
        // }

        // public function update(){
        //     $query = 'UPDATE ' . $this->table . ' 
        //               SET title = :title, text = :text, image = :image
        //               WHERE id = :id';
            
        //     $stmt = $this->conn->prepare($query);
            
        //     $this->title = htmlspecialchars(strip_tags($this->title));
        //     $this->text = htmlspecialchars(strip_tags($this->text));
        //     $this->image = htmlspecialchars(strip_tags($this->image));
        //     $this->id = htmlspecialchars(strip_tags($this->id));
            
        //     $stmt->bindParam(':title', $this->title);
        //     $stmt->bindParam(':text', $this->text);
        //     $stmt->bindParam(':image', $this->image);
        //     $stmt->bindParam(':id', $this->id);
            
        //     if ($stmt->execute()) {
        //         return true;
        //     } else {
        //         printf("Error: %s.\n", $stmt->error);
        //         return false;
        //     }
        // }

        // public function delete(){
        //     $query = 'DELETE FROM '. $this->table . ' WHERE id = :id';
        //     $stmt = $this->conn->prepare($query);

        //     $this->id = htmlspecialchars(strip_tags($this->id));

        //     $stmt->bindParam(':id', $this->id);

        //     if ($stmt->execute()) {
        //         return true;
        //     } else {
        //         printf("Error: %s.\n", $stmt->error);
        //         return false;
        //     }
        // }

    }
?>