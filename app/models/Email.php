<?php
class Email {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addPost($data) {
        $this->db->query('INSERT INTO emails ( email) VALUES ( :email)');
       
        $this->db->bind(':email', $data['email']);
       
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
      
    }
}
