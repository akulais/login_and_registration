<?php

class User extends CI_Model {

    public function get_all($id) {
          // $query = "SELECT * FROM users ORDER BY created_at DESC";
               // var_dump($query); die();
               // var_dump($user); die();
          $query = "SELECT * FROM users WHERE users.id <> ? ORDER BY created_at DESC";
          $values = $id;
          return $this->db->query($query, $values)->result_array();
         
    }

     public function get_user_by_id($user_id) {
          return $this->db->query("SELECT * FROM users WHERE id = ?", array($user_id))->row_array();
    }

     public function login($email) {
          return $this->db->query("SELECT * FROM users WHERE email = ?", array($email))->row_array();
    }

     public function add_user($user_info) {
           $query = 'INSERT INTO users (name, alias, email, password, date_of_birth, created_at, updated_at) VALUES (?,?,?,?,?,?,?)';
           $values = array($user_info['name'], $user_info['alias'], $user_info['email'], $user_info['password'], $user_info['date_of_birth'], date('Y:m:d, H:i:s'), date('Y:m:d, H:i:s'));
          return $this->db->query($query, $values);
    }

    public function update($data) {
         $query = "UPDATE users SET name = ?, alias = ?, email = ?, password = ?, date_of_birth = ?  WHERE id = ?";
         $values = array($data['name'],$data['alias'],$data['email'],$data['password'],$data['date_of_birth'],$data['id']);
         return $this->db->query($query, $values);
    }

    function delete($id) {
         $query = "DELETE FROM users WHERE id = ?";
         $values = array($id);
         return $this->db->query($query, $values);
     }

}