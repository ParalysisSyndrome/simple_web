<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Login";

        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else
        {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) 
        {
            if ($user['is_active'] == 1) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                
                if ($user['role_id'] == 1)
                {
                    redirect('admin');
                } else {
                    redirect('main');
                }

            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not been activated!! </div>');
                redirect('auth');
            }

        } else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!! </div>');
            redirect('auth');
        }
    }



    public function registration()
    {
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password1','Password','required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!!'
        ]);
        $this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
        

        if ( $this->form_validation->run() == FALSE)
        {
            $data['title'] = "Register";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'name' => $this->input->post('name', true),
                'username' => $this->input->post('username', true),
                'email' => $this->input->post('email', true),
                'password' => $this->input->post('password1'),
                'role_id' => 2,
                'is_active' => 1
            ];

            $this->db->insert('user', $data); 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Your account has been created. Please Login!! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> You have been logout! </div>');
        redirect('auth');
    }
}