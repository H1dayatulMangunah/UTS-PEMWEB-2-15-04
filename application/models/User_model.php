<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function cek_login($username, $password)
    {
        return $this->db->get_where('users', [
            'username' => $username,
            'password' => md5($password)
        ])->row();
    }
}
