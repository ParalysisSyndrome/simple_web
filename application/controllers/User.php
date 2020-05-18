<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();
        $data['title'] = "Profile User";
        
        $this->form_validation->set_rules('name', 'name', 'trim');
        $this->form_validation->set_rules('username', 'username', 'trim');
        $this->form_validation->set_rules('password2','Password','trim|min_length[3]|matches[password3]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!!'
        ]);
        $this->form_validation->set_rules('password3','Password','trim|matches[password2]');


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else 
        {
            $data = [
                "name" => $this->input->post("name", true),
                "username" => $this->input->post("username", true),
                'password' => $this->input->post('password1')
            ];
            $this->db->where('id', $this->input->post('id') );
            $this->db->update('user', $data);
            redirect('user');
        }
    }


}