<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        $this->load->view('admin/page/dashboard', $var);
    }

    public function bidang_perusahaan()
    {
        $var['title'] = 'Admin | Bidang Perusahaan';
        $var['bidang_perusahaan'] = $this->model->get_bidang_perusahaan();
        $var['edit'] = $this->model->get_bidang_perusahaan();
        $this->load->view('admin/page2/bidang_perusahaan', $var);
    }

    public function save_field_company()
    {
        $input = $this->input->post('bidang_perusahaan');
        if (!empty($input)) {
            $data = [
                'bidang_perusahaan' => $input,
            ];
            $this->db->insert('bidang_perusahaan', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/bidang_perusahaan');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/bidang_perusahaan');
        }
    }

    public function update_field_company()
    {
        $input = $this->input->post('bidang_perusahaan');
        if (!empty($input)) {
            $bid_per = $this->input->post('bidang_perusahaan');
            $id = $this->input->post('id');
            $this->db->set('bidang_perusahaan', $bid_per);
            $this->db->where('id', $id);
            $this->db->update('bidang_perusahaan');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/bidang_perusahaan');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/bidang_perusahaan');
        }
    }

    public function delete_bidang_perusahaan($id)
    {
        $this->db->delete('bidang_perusahaan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/bidang_perusahaan');
    }

    public function bidang_spesialis()
    {
        $var['title'] = 'Bidang Spesialis';
        $var['bidang_spesialis'] = $this->model->get_bidang_spesialis();
        $var['edit'] = $this->model->get_bidang_spesialis();
        $this->load->view('admin/page2/bidang_spesialis', $var);
    }

    public function save_specialist()
    {
        $input = $this->input->post('spesialis');
        if (!empty($input)) {
            $data = [
                'spesialis' => $input,
            ];
            $this->db->insert('bidang_spesialis', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/bidang_spesialis');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/bidang_spesialis');
        }
    }

    public function update_specialist()
    {
        $input = $this->input->post('spesialis');
        if (!empty($input)) {
            $bid_per = $this->input->post('spesialis');
            $id = $this->input->post('id');
            $this->db->set('spesialis', $bid_per);
            $this->db->where('id', $id);
            $this->db->update('bidang_spesialis');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/bidang_spesialis');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/bidang_spesialis');
        }
    }

    public function delete_specialist($id)
    {
        $this->db->delete('bidang_spesialis', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/bidang_spesialis');
    }

    public function bidang_pekerjaan()
    {
        $var['title'] = 'Admin | Bidang Pekerjaan';
        $var['bidang_pekerjaan'] = $this->model->get_bidang_pekerjaan();
        $var['spesialis'] = $this->model->get_bidang_spesialis();
        $var['edit'] = $this->model->get_bidang_pekerjaan();
        $this->load->view('admin/page2/bidang_pekerjaan', $var);
    }

    public function save_field_job()
    {
        $input = $this->input->post('bidang_pekerjaan');
        if (!empty($input)) {
            $data = [
                'id_spesialis' => $this->input->post('id_spesialis'),
                'bidang_pekerjaan' => $input,
            ];
            $this->db->insert('bidang_pekerjaan', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/bidang_pekerjaan');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/bidang_pekerjaan');
        }
    }

    public function update_field_job()
    {
        $input = $this->input->post('bidang_pekerjaan');
        if (!empty($input)) {
            $bid_per = $this->input->post('bidang_pekerjaan');
            $id_spesialis = $this->input->post('id_spesialis');
            $id = $this->input->post('id');
            $this->db->set('bidang_pekerjaan', $bid_per);
            $this->db->set('id_spesialis', $id_spesialis);
            $this->db->where('id', $id);
            $this->db->update('bidang_pekerjaan');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/bidang_pekerjaan');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/bidang_pekerjaan');
        }
    }

    public function delete_field_job($id)
    {
        $this->db->delete('bidang_pekerjaan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/bidang_pekerjaan');
    }

    public function tingkat_pekerjaan()
    {
        $var['title'] = 'Admin | Tingkat Pekerjaan';
        $var['tingkat_pekerjaan'] = $this->model->get_tingkat_pekerjaan();
        $var['edit'] = $this->model->get_tingkat_pekerjaan();
        $this->load->view('admin/page2/tingkat_pekerjaan', $var);
    }

    public function save_level_job()
    {
        $input = $this->input->post('tingkat_kerja');
        if (!empty($input)) {
            $data = [
                'tingkat_kerja' => $input,
            ];
            $this->db->insert('tingkat_pekerjaan', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/tingkat_pekerjaan');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/tingkat_pekerjaan');
        }
    }

    public function update_level_job()
    {
        $input = $this->input->post('tingkat_kerja');
        if (!empty($input)) {
            $tk_per = $this->input->post('tingkat_kerja');
            $id = $this->input->post('id');
            $this->db->set('tingkat_kerja', $tk_per);
            $this->db->where('id', $id);
            $this->db->update('tingkat_pekerjaan');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/tingkat_pekerjaan');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/tingkat_pekerjaan');
        }
    }

    public function delete_level_job($id)
    {
        $this->db->delete('tingkat_pekerjaan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/tingkat_pekerjaan');
    }

    public function jenis_pekerjaan()
    {
        $var['title'] = 'Admin | Jenis Pekerjaan';
        $var['jenis_pekerjaan'] = $this->model->get_jenis_pekerjaan();
        $var['edit'] = $this->model->get_jenis_pekerjaan();
        $this->load->view('admin/page2/jenis_pekerjaan', $var);
    }

    public function save_type_job()
    {
        $input = $this->input->post('jenis_kerja');
        if (!empty($input)) {
            $data = [
                'jenis_kerja' => $input,
            ];
            $this->db->insert('jenis_pekerjaan', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/jenis_pekerjaan');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/jenis_pekerjaan');
        }
    }

    public function update_type_job()
    {
        $input = $this->input->post('jenis_kerja');
        if (!empty($input)) {
            $jn_per = $this->input->post('jenis_kerja');
            $id = $this->input->post('id');
            $this->db->set('jenis_kerja', $jn_per);
            $this->db->where('id', $id);
            $this->db->update('jenis_pekerjaan');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/jenis_pekerjaan');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/jenis_pekerjaan');
        }
    }

    public function delete_type_job($id)
    {
        $this->db->delete('jenis_pekerjaan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/jenis_pekerjaan');
    }

    public function ukuran_perusahaan()
    {
        $var['title'] = 'Admin | Ukuran Perusahaan';
        $var['ukuran_perusahaan'] = $this->model->get_ukuran_perusahaan();
        $var['edit'] = $this->model->get_ukuran_perusahaan();
        $this->load->view('admin/page2/ukuran_perusahaan', $var);
    }

    public function save_company_size()
    {
        $input = $this->input->post('ukuran');
        if (!empty($input)) {
            $data = [
                'ukuran' => $input,
            ];
            $this->db->insert('ukuran_perusahaan', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/ukuran_perusahaan');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/ukuran_perusahaan');
        }
    }

    public function update_company_size()
    {
        $input = $this->input->post('ukuran');
        if (!empty($input)) {
            $uk_com = $this->input->post('ukuran');
            $id = $this->input->post('id');
            $this->db->set('ukuran', $uk_com);
            $this->db->where('id', $id);
            $this->db->update('ukuran_perusahaan');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/ukuran_perusahaan');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/ukuran_perusahaan');
        }
    }

    public function delete_company_size($id)
    {
        $this->db->delete('ukuran_perusahaan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/ukuran_perusahaan');
    }
}
