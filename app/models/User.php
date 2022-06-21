<?php
class User {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    //register new user
    public function register($data){
        $this->db->query('INSERT INTO tb_users (user_nama, user_email, user_password) VALUES (:name, :email, :password)');
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    //find user by email
    public function findUserByEmail($email){
        $this->db->query('SELECT * FROM tb_users WHERE user_email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();

        //check the row 
        if($this->db->rowCount() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM tb_users where user_email = :email');
        $this->db->bind(':email', $email);
       
        $row = $this->db->single();

        $hash_password = $row->user_password;

        if(password_verify($password, $hash_password)){
            return $row;
        }else{
            return false;
        }
    }

    public function getUserById($id){
        $this->db->query('SELECT * FROM tb_users WHERE user_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }
}