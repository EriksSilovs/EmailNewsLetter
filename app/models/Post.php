<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function findAllPosts() {

        $this->db->query('SELECT * FROM emails ORDER BY created_at  ASC');

        $results = $this->db->resultSet();

        return $results;
    }


    public function orderByDateDESC() {
        $this->db->query('SELECT * FROM emails ORDER BY created_at  DESC');

        $results = $this->db->resultSet();

        return $results;
    }
    public function orderByEmailASC() {
        $this->db->query('SELECT * FROM emails ORDER BY email  ASC');

        $results = $this->db->resultSet();

        return $results;
    }
    public function orderByEmailDESC() {
        $this->db->query('SELECT * FROM emails ORDER BY email  DESC');

        $results = $this->db->resultSet();

        return $results;
    }
  
    public function findPostById($id) {
        $this->db->query('SELECT * FROM emails WHERE id = :id');

        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }



    public function deletePost($id) {
        $this->db->query('DELETE FROM emails WHERE id = :id');

        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}

