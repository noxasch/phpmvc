<?php
// Naming convention
// Models - singular
// controller - Plural with (s)
    class Post {
        private $db;

        public function __construct(){
            // instantiate database class
            echo 'Post instantiated <br>';
            $this->db = new Database;
        }

        public function getPosts(){
            $this->db->query('SELECT * FROM posts');
            // $result = $this->db->resultSet();
            //var_dump($result);
            return $this->db->resultSet();
        }

    }

?>