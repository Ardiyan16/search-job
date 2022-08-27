<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_superadmin', 'model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Superadmin | Dashboard';
        $this->load->view('admin/superadmin/dashboard', $var);
    }

    public function employe()
    {
        $var['title'] = 'Superadmin | Employe';
        $var['employe'] = $this->model->get_employe();
        $this->load->view('admin/superadmin/employe', $var);
    }

    public function add_employe()
    {
        $var['title'] = 'Superadmin | Add Employe';
        $var['role'] = $this->db->get('role')->result();
        $this->load->view('admin/superadmin/add_employe', $var);
    }

    public function save_employe()
    {
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'name is required (nama harus diisi)']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus diisi)']);
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', ['required' => 'position is required (jabatan harus diisi)']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[employee.username]', ['is_unique' => 'username has been registered (username telah digunakan)', 'required' => 'username is required (username harus diisi)']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus diisi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        if ($this->form_validation->run() == false) {
            $this->add_employe();
        } else {
            $this->model->save_employe();
            $this->session->set_flashdata('success_create', true);
            redirect('Superadmin/employe');
        }
    }

    public function update_status_employe1($id)
    {
        $this->model->status_employe_active($id);
        $this->session->set_flashdata('status_active', true);
        redirect('Superadmin/employe');
    }

    public function update_status_employe2($id)
    {
        $this->model->status_employe_nonactive($id);
        $this->session->set_flashdata('status_nonactive', true);
        redirect('Superadmin/employe');
    }
}