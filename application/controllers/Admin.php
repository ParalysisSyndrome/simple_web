<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Admin";   
        $data['user'] = $this->User_model->getAll();
        $data['user1'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        if ($this->input->post('search'))
        {
            $data['user'] = $this->User_model->searchData();
        }
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }

    //
    public function dokter()
    {
        $data['title'] = "Admin";   
        $data['dokter'] = $this->User_model->getAllDok();
        $data['user1'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        if ($this->input->post('search'))
        {
            $data['user'] = $this->User_model->searchData();
        }
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/dokter', $data);
        $this->load->view('templates/admin_footer');
    }


    public function update($id)
    {

        $data['title'] = "Update Data";
        $data['user'] = $this->User_model->getById($id);
        
        // make a form error in menu registration if column null
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('username', 'username', 'required|trim');
        $this->form_validation->set_rules('email', 'email', 'valid_email|required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');
        $this->form_validation->set_rules('role_id', 'role_id', 'trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view("admin/update", $data);
        } else {
            $this->User_model->updateData();
            redirect('admin');  // after update data, go to admin/index.php
        }
    }

    public function delete($id)
    {
        $this->User_model->deleteData($id);
        redirect('admin');
    }

    public function add()
    {
        $data['title'] = "Add Data";
        $data['user1'] = $this->db->get_where('user', ['email' => $this->session->userdata('email') ])->row_array();

        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim|min_length[3]',[
            'min_length' => 'Password too short!!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header', $data);
            $this->load->view('admin/add', $data);
            $this->load->view('templates/admin_footer');
        } else 
        {
            $this->User_model->addData();
            redirect("admin");
        }
    }


}