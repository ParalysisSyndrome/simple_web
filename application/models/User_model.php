<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model 
{
    // to retrieve all data from the database
    public function getAll() 
    {
        return $this->db->get('user')->result_array();  # profile_user is name database
    }

    public function addData()
    {
        $data = [
            "name" => $this->input->post("name", true),
            "username" => $this->input->post("username", true),
            "email" => $this->input->post("email", true),
            "password" => $this->input->post("password", true),
            "role_id" => 2,
            "is_active" => 1
        ];

        $this->db->insert("user", $data);
    }

    // delete data based on username.
    public function deleteData($id)
    {
        //$this->db->where('id', $id);
        //$this->db->delete('profile_user');
        return $this->db->delete('user', ['id' => $id]);
    }

    // to display data (from the database) one row.
    public function getById($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    //
    public function getAllDok($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    public function updateData()
    {
        $data = [
            "name" => $this->input->post("name", true),
            "username" => $this->input->post("username", true),
            "email" => $this->input->post("email", true),
            "password" => $this->input->post("password", true),
            "role_id" => $this->input->post("role_id", true),
            "is_active" => $this->input->post("is_active", true)
        ];
        $this->db->where('id', $this->input->post('id') );
        $this->db->update("user", $data);
    }

    public function searchData()
    {
        $search = $this->input->post('search');
        $this->db->like('name', $search);
        return $this->db->get('user')->result_array();
    }
}