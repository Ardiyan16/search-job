<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_pages', 'model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Home';
        $var['lowongan'] = $this->model->loker_home();
        $var['company'] = $this->db->limit(6)->get('company')->result();
        $var['total_loker'] = $this->model->total_loker();
        $var['total_company'] = $this->model->total_company();
        $this->load->view('users/page/home', $var);
    }

    public function lowongan()
    {
        $var['title'] = 'Lowongan';
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['lowongan'] = $this->model->get_lowongan();
        $this->load->view('users/page/lowongan', $var);
    }

    public function detail_lowongan($id)
    {
        $var['title'] = 'Detail Lowongan';
        $var['job'] = $this->model->detail_lowongan($id);
        $var['bookmark'] = $this->model->get_bookmark($id);
        $this->load->view('users/page/detail_lowongan', $var);
    }

    public function simpan_bookmark($id)
    {
        if (!empty($this->session->userdata('id')) == NULL) {
            $this->session->set_flashdata('login_dulu', true);
            redirect('Pages/detail_lowongan/' . $id);
        } else {
            $id_users = $this->session->userdata('id');
            $bookmark = array(
                'id_post_job' => $id,
                'id_users' => $id_users,
                'status' => '1'
            );
            $this->db->insert('bookmark_job', $bookmark);
            redirect('Pages/detail_lowongan/' . $id);
        }
    }

    public function batalkan_bookmark()
    {
        $id = $this->input->get('id');
        $id_job = $this->input->get('id_job');
        $this->db->delete('bookmark_job', ['id' => $id]);
        redirect('Pages/detail_lowongan/' . $id_job);
    }

    public function lamar_pekerjaan($id)
    {
        $users = $this->model->users();
        $pendidikan = $this->model->get_pendidikan();
        $keterampilan = $this->model->get_keterampilan();
        if (!empty($this->session->userdata('id')) == NULL) {
            $this->session->set_flashdata('login_dulu', true);
            redirect('Pages/detail_lowongan/' . $id);
        } elseif (empty($users->tgl_lahir)) {
            $this->session->set_flashdata('lengkapi_profile', true);
            redirect('Pages/detail_lowongan/' . $id);
        } elseif (empty($pendidikan)) {
            $this->session->set_flashdata('lengkapi_pendidikan', true);
            redirect('Pages/detail_lowongan/' . $id);
        } elseif (empty($keterampilan)) {
            $this->session->set_flashdata('lengkapi_keterampilan', true);
            redirect('Pages/detail_lowongan/' . $id);
        } elseif (empty($resum)) {
            $this->session->set_flashdata('lengkapi_resum', true);
            redirect('Pages/detail_lowongan/' . $id);
        } else {
        }
    }

    public function bookmark_lamaran()
    {
        $var['title'] = 'Lamaran Tersimpan';
        $var['bookmark'] = $this->model->lamaran_tersimpan();
        $this->load->view('users/profile/bookmark_lamaran', $var);
    }

    public function profile()
    {
        $var['title'] = 'Profile';
        $var['view'] = $this->model->get_profile();
        $var['pendidikan'] = $this->model->get_pendidikan2();
        $var['pengalaman'] = $this->model->get_pengalaman();
        $this->load->view('users/profile/profile', $var);
    }

    public function pendidikan()
    {
        $var['title'] = 'Pendidikan';
        $var['view'] = $this->model->get_profile();
        $var['pendidikan'] = $this->model->get_pendidikan2();
        $this->load->view('users/profile/pendidikan', $var);
    }

    public function tambah_pendidikan()
    {
        $var['title'] = 'Tambah Pendidikan';
        $var['view'] = $this->model->get_profile();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $this->load->view('users/page2/create_pendidikan', $var);
    }

    public function save_pendidikan()
    {
        $this->form_validation->set_rules('nama_institusi', 'nama institusi', 'required|trim', ['required' => 'nama institusi is required (nama institusi harus di isi)']);
        $this->form_validation->set_rules('bulan', 'bulan', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('tahun', 'tahun', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('kualifikasi', 'kualifikasi', 'required|trim', ['required' => 'kualifikasi is required (kualifikasi harus di isi)']);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('bidang_studi', 'bidang studi', 'required|trim', ['required' => 'bidang studi is required (bidang studi harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->tambah_pendidikan();
        } else {
            $this->model->save_pendidikan();
            $this->session->set_flashdata('success_create', true);
            redirect('Pages/pendidikan');
        }
    }

    public function edit_pendidikan($id)
    {
        $var['title'] = 'Tambah Pendidikan';
        $var['view'] = $this->model->get_profile();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['edit'] = $this->db->get_where('pendidikan', ['id' => $id])->row();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $this->load->view('users/page2/edit_pendidikan', $var);
    }

    public function update_pendidikan()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('nama_institusi', 'nama institusi', 'required|trim', ['required' => 'nama institusi is required (nama institusi harus di isi)']);
        $this->form_validation->set_rules('bulan', 'bulan', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('tahun', 'tahun', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('kualifikasi', 'kualifikasi', 'required|trim', ['required' => 'kualifikasi is required (kualifikasi harus di isi)']);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('bidang_studi', 'bidang studi', 'required|trim', ['required' => 'bidang studi is required (bidang studi harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->edit_pendidikan($id);
        } else {
            $this->model->update_pendidikan();
            $this->session->set_flashdata('success_update', true);
            redirect('Pages/pendidikan');
        }
    }

    public function delete_pendidikan($id)
    {
        $this->db->delete('pendidikan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Pages/pendidikan');
    }

    public function pengalaman()
    {
        $var['title'] = 'Pengalaman';
        $var['view'] = $this->model->get_profile();
        $var['pengalaman'] = $this->model->get_pengalaman();
        $this->load->view('users/profile/pengalaman', $var);
    }

    public function tambah_pengalaman()
    {
        $var['title'] = 'Tambah Pengalaman';
        $var['view'] = $this->model->get_profile();
        $var['spesialis'] = $this->db->get('bidang_spesialis')->result_array();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['bidang_perusahaan'] = $this->db->get('bidang_perusahaan')->result();
        $this->load->view('users/page2/create_pengalaman', $var);
    }

    public function save_pengalaman()
    {
        $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim', ['required' => 'posisi is required (posisi harus di isi)']);
        $this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'required|trim', ['required' => 'nama perusahaan is required (nama perusahaan harus di isi)']);
        $this->form_validation->set_rules('bulan_awal', 'bulan awal', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('tahun_awal', 'tahun awal', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('bulan_akhir', 'bulan akhir', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('tahun_akhir', 'tahun akhir', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('bidang', 'bidang', 'required|trim', ['required' => 'bidang is required (bidang harus di isi)']);
        $this->form_validation->set_rules('keahlian', 'keahlian', 'required|trim', ['required' => 'keahlian is required (keahlian harus di isi)']);
        $this->form_validation->set_rules('provinces', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('city', 'kota/kabupaten', 'required|trim', ['required' => 'kota/kabupaten is required (kota/kabupaten harus di isi)']);
        $this->form_validation->set_rules('industri', 'industri', 'required|trim', ['required' => 'industri is required (industri harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->tambah_pengalaman();
        } else {
            $this->model->save_pengalaman();
            $this->session->set_flashdata('success_create', true);
            redirect('Pages/pengalaman');
        }
    }

    public function edit_pengalaman($id)
    {
        $var['title'] = 'Edit Pengalaman';
        $var['view'] = $this->model->get_profile();
        $var['spesialis'] = $this->db->get('bidang_spesialis')->result_array();
        $var['keahlian'] = $this->db->get('bidang_pekerjaan')->result_array();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $var['bidang_perusahaan'] = $this->db->get('bidang_perusahaan')->result();
        $var['edit'] = $this->db->get_where('pengalaman', ['id' => $id])->row();
        $this->load->view('users/page2/edit_pengalaman', $var);
    }

    public function update_pengalaman()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('posisi', 'Posisi', 'required|trim', ['required' => 'posisi is required (posisi harus di isi)']);
        $this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'required|trim', ['required' => 'nama perusahaan is required (nama perusahaan harus di isi)']);
        $this->form_validation->set_rules('bulan_awal', 'bulan awal', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('tahun_awal', 'tahun awal', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('bulan_akhir', 'bulan akhir', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('tahun_akhir', 'tahun akhir', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('bidang', 'bidang', 'required|trim', ['required' => 'bidang is required (bidang harus di isi)']);
        $this->form_validation->set_rules('keahlian', 'keahlian', 'required|trim', ['required' => 'keahlian is required (keahlian harus di isi)']);
        $this->form_validation->set_rules('provinces', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('city', 'kota/kabupaten', 'required|trim', ['required' => 'kota/kabupaten is required (kota/kabupaten harus di isi)']);
        $this->form_validation->set_rules('industri', 'industri', 'required|trim', ['required' => 'industri is required (industri harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->edit_pengalaman($id);
        } else {
            $this->model->update_pengalaman();
            $this->session->set_flashdata('success_update', true);
            redirect('Pages/pengalaman');
        }
    }

    public function delete_pengalaman($id)
    {
        $this->db->delete('pengalaman', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Pages/pengalaman');
    }

    public function profile_saya()
    {
        $var['title'] = 'Profile Saya';
        $var['view'] = $this->model->get_profile();
        $this->load->view('users/profile/profile_saya', $var);
    }

    public function edit_profile()
    {
        $id = $this->session->userdata('id');
        $var['title'] = 'Edit Profile Saya';
        $var['view'] = $this->model->get_profile();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['edit'] = $this->db->get('users', ['id' => $id])->row();
        $this->load->view('users/page2/edit_profile', $var);
    }

    public function update_profile()
    {
        $this->form_validation->set_rules('nama_depan', 'nama depan', 'required|trim', ['required' => 'nama depan is required (nama depan harus di isi)']);
        $this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim', ['required' => 'nama belakang is required (nama belakang harus di isi)']);
        $this->form_validation->set_rules('tgl', 'tanggal', 'required|trim', ['required' => 'tanggal is required (tanggal harus di isi)']);
        $this->form_validation->set_rules('bln', 'bulan', 'required|trim', ['required' => 'bulan is required (bulan harus di isi)']);
        $this->form_validation->set_rules('thn', 'tahun', 'required|trim', ['required' => 'tahun is required (tahun harus di isi)']);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim|max_length[13]|numeric', ['required' => 'no telepon is required (no telepon harus di isi)', 'max_length' => 'no telepon minimum 13 number (nomor telepon minimal 13 angka)', 'numeric' => 'input only numbers (inputan hanya bisa angka)']);
        $this->form_validation->set_rules('alamat', 'akamat', 'required|trim', ['required' => 'alamat is required (alamat harus di isi)']);
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota', 'kota/kabupaten', 'required|trim', ['required' => 'kota/kabupaten is required (kota/kabupaten harus di isi)']);
        $this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'required|trim', ['required' => 'jenis kelamin is required (jenis kelamin harus di isi)']);
        $this->form_validation->set_rules('negara', 'negara', 'required|trim', ['required' => 'negara is required (negara harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->edit_profile();
        } else {
            $this->model->update_profile();
            $this->session->set_flashdata('success_update', true);
            redirect('Pages/profile_saya');
        }
    }
}
