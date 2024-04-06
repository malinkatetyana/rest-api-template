<?php

    class Post{
        private $conn;
        private $table = 'posts';

        public $id;
        public $title;
        public $text;
        public $image;

        public function __construct($db){
            $this->conn = $db;
        } 

        public function read(){
            $query = 'SELECT * FROM '.$this->table;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function read_single(){
            $query = 'SELECT
                p.id,
                p.title,
                p.text,
                p.image
                FROM ' . $this->table . ' p
                WHERE p.id = ? LIMIT 1';
        
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $this->id = $row['id'];
            $this->title = $row['title'];
            $this->text = $row['text'];
            $this->image = $row['image'];
        
            return $stmt;
        }

        public function create(){
            $query = 'INSERT INTO ' . $this->table . ' SET title = :title, text = :text, image = :image';
        
            $stmt = $this->conn->prepare($query);
        
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->text = htmlspecialchars(strip_tags($this->text));
            $this->image = htmlspecialchars(strip_tags($this->image));
        
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':text', $this->text);
            $stmt->bindParam(':image', $this->image);
        
            if ($stmt->execute()) {
                return true;
            } else {
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }

        public function update(){
            $query = 'UPDATE ' . $this->table . ' 
                      SET title = :title, text = :text, image = :image
                      WHERE id = :id';
            
            $stmt = $this->conn->prepare($query);
            
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->text = htmlspecialchars(strip_tags($this->text));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':text', $this->text);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':id', $this->id);
            
            if ($stmt->execute()) {
                return true;
            } else {
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }

        public function delete(){
            $query = 'DELETE FROM '. $this->table . ' WHERE id = :id';
            $stmt = $this->conn->prepare($query);

            $this->id = htmlspecialchars(strip_tags($this->id));

            $stmt->bindParam(':id', $this->id);

            if ($stmt->execute()) {
                return true;
            } else {
                printf("Error: %s.\n", $stmt->error);
                return false;
            }
        }

    }
?>