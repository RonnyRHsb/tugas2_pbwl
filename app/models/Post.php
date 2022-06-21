<?php

class Post {
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getPelanggan(){
        $this->db->query('SELECT *,
                            tb_pelanggan.pel_id as pelId,
                            tb_users.user_id as userId,
                            tb_pelanggan.created_at as pelangganCreated,
                            tb_users.user_nama as userNama
                            FROM tb_pelanggan
                            INNER JOIN tb_users
                            ON tb_pelanggan.pel_id_user = tb_users.user_id ORDER BY tb_pelanggan.created_at
                            ');
        $result = $this->db->resultSet();

        return $result;
    }

    public function addPost($data){
        $this->db->query('INSERT INTO tb_pelanggan (pel_nama, pel_id_gol, pel_alamat, pel_hp, pel_ktp, pel_seri, pel_meteran, pel_id_user) VALUES (:pel_nama, :pel_id_gol, :pel_alamat, :pel_hp, :pel_ktp, :pel_seri, :pel_meteran, :pel_id_user)');
        $this->db->bind(':pel_nama', $data['pel_nama']);
        $this->db->bind(':pel_id_gol', $data['pel_id_gol']);
        $this->db->bind(':pel_alamat', $data['pel_alamat']);
        $this->db->bind(':pel_ktp', $data['pel_ktp']);
        $this->db->bind(':pel_hp', $data['pel_hp']);
        $this->db->bind(':pel_seri', $data['pel_seri']);
        $this->db->bind(':pel_meteran', $data['pel_meteran']);
        $this->db->bind(':pel_id_user', $data['pel_id_user']);

        
        //execute 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function getPelangganById($id){
        $this->db->query('SELECT * FROM tb_pelanggan WHERE pel_id = :id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();

        return $row;
    }

    public function updatePost($data){
        $this->db->query('UPDATE tb_pelanggan SET pel_nama = :pel_nama, pel_alamat = :pel_alamat , pel_ktp = :pel_ktp , pel_hp = :pel_hp, pel_seri = :pel_seri, pel_meteran = :pel_meteran, updated_at = :updated_at WHERE pel_id = :id');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':pel_nama', $data['pel_nama']);
        $this->db->bind(':pel_alamat', $data['pel_alamat']);
        $this->db->bind(':pel_ktp', $data['pel_ktp']);
        $this->db->bind(':pel_hp', $data['pel_hp']);
        $this->db->bind(':pel_seri', $data['pel_seri']);
        $this->db->bind(':pel_meteran', $data['pel_meteran']);
        $this->db->bind(':updated_at', $data['updated_at']);
        
        //execute 
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    //delete a post
    public function deletePelanggan($id){
        $this->db->query('DELETE FROM tb_pelanggan WHERE pel_id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
}
