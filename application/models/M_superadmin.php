<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_superadmin extends CI_Model
{
    private $employe = 'employee';

    public function get_employe()
    {
        return $this->db->get($this->employe)->result();
    }

    public function save_employe()
    {
        $password = $this->input->post('password', true);
        $post = $this->input->post();
        $this->nama = $post['nama'];
        $this->email = $post['email'];
        $this->jabatan = $post['jabatan'];
        $this->role_id = $post['role_id'];
        $this->username = $post['username'];
        $this->password = password_hash($password, PASSWORD_BCRYPT);
        $this->status = 0;
        $this->db->insert($this->employe, $this);
    }

    public function status_employe_active($id)
    {
        $this->db->query("UPDATE `employee` SET `status`= '1' WHERE employee.id ='$id'");
    }

    public function status_employe_nonactive($id)
    {
        $this->db->query("UPDATE `employee` SET `status`= '0' WHERE employee.id ='$id'");
    }
}