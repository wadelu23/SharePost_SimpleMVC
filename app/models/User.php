<?php
class User {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }
    // Register User
    public function register($data){
        $this->db->query('INSERT INTO `users` (name, email, password) VALUES (:name, :email, :password)');
        $this->db->bind(':name',    $data['name']);
        $this->db->bind(':email',   $data['email']);
        $this->db->bind(':password',$data['password']);
        // Execute
        return ($this->db->execute()) ? true : false;
    }

    // Login User
    public function login($email, $password){
        $this->db->query('SELECT * FROM `users` WHERE `email` = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
            return $row;
        }else{
            return false;
        }
    }



    // Find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM `users` WHERE `email` = :email');
        $this->db->bind(':email',$email);
        $row = $this->db->single();
        // Check row
        return ($this->db->rowCount() > 0) ? true : false;
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM `users` WHERE `id` = :id');
        $this->db->bind(':id',$id);
        $row = $this->db->single();
        return $row;
    }
}