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
        $var['company'] = $this->db->order_by('id', 'desc')->limit(8)->get('company')->result();
        $var['total_loker'] = $this->model->total_loker();
        $var['total_company'] = $this->model->total_company();
        $var['done'] = $this->model->sudah_melamar();
        foreach ($var['done'] as $d) {
            $id_job[] = $d->id_job;
        }
        if (!empty($id_job)) {
            $var['datta'] = $id_job;
        }
        $this->load->view('users/page/home', $var);
    }

    public function lowongan()
    {
        $this->session->unset_userdata('job_title');
        $this->session->unset_userdata('provinsi');
        $this->session->unset_userdata('kota');
        $var['title'] = 'Lowongan';
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $this->load->library('pagination');
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Pages/lowongan');
        $config['total_rows'] = $this->model->count_all_lowongan();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['lowongan'] = $this->model->get_lowongan($config['per_page'], $page['start']);
        $var['done'] = $this->model->sudah_melamar();

        foreach ($var['done'] as $d) {
            $id_job[] = $d->id_job;
        }
        if (!empty($id_job)) {
            $var['datta'] = $id_job;
        }
        $this->load->view('users/page/lowongan', $var);
    }

    public function search_lowongan()
    {
        $var['title'] = 'Lowongan';
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $this->load->library('pagination');
        if (!empty($this->input->post('job_title'))) {
            $data['job_title'] = $this->input->post('job_title');
            $data['provinsi'] = $this->input->post('provinces');
            $data['kota'] = $this->input->post('city');
            $this->session->set_userdata('job_title', $data['job_title']);
            $this->session->set_userdata('provinsi', $data['provinsi']);
            $this->session->set_userdata('kota', $data['kota']);
        } else {
            $data['job_title'] = $this->session->unset_userdata('job_title');
            $data['provinsi'] = $this->session->unset_userdata('provinsi');
            $data['kota'] = $this->session->unset_userdata('kota');
        }
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Pages/lowongan');
        $config['total_rows'] = $this->model->count_all_search($data['job_title'], $data['provinsi'], $data['kota']);
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['lowongan'] = $this->model->search_lowongan($data['job_title'], $data['provinsi'], $data['kota'], $config['per_page'], $page['start']);
        $var['done'] = $this->model->sudah_melamar();
        foreach ($var['done'] as $d) {
            $id_job[] = $d->id_job;
        }
        if (!empty($id_job)) {
            $var['datta'] = $id_job;
        }
        $this->load->view('users/page/lowongan', $var);
    }

    public function detail_lowongan($id)
    {
        $var['title'] = 'Detail Lowongan';
        $var['job'] = $this->model->detail_lowongan($id);
        $var['bookmark'] = $this->model->get_bookmark($id);
        $var['sudah_melamar'] = $this->model->sudah_melamar2($id);
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
        $resume = $this->model->get_resume();
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
        } elseif (empty($resume)) {
            $this->session->set_flashdata('lengkapi_resum', true);
            redirect('Pages/detail_lowongan/' . $id);
        } else {
            if (empty($this->session->userdata('id'))) {
                $this->session->set_flashdata('session_habis', true);
                redirect('Auth');
            }
            $var['title'] = 'Lamar Online';
            $var['view'] = $this->model->detail_lowongan($id);
            $var['profile'] = $this->model->get_profile();
            $var['gaji'] = $this->model->get_info_tambahan();
            $this->load->view('users/page/apply_job', $var);
        }
    }

    public function save_lamaran()
    {
        $id_job = $this->input->post('id_job');
        $id_users = $this->input->post('id_users');
        $keterangan = $this->input->post('keterangan');
        date_default_timezone_set('Asia/Jakarta');
        $lamar = array(
            'id_job' => $id_job,
            'id_users' => $id_users,
            'keterangan' => $keterangan,
            'date_apply' => date('Y-m-d'),
            'time_apply' => date('H:i'),
            'status_lamaran' => 0
        );
        $this->db->insert('apply_job', $lamar);
        $this->session->set_flashdata('lamaran_terkirim', true);
        redirect('Pages/lamaran_saya');
    }

    public function lamaran_saya()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $this->load->library('pagination');
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Pages/lamaran_saya');
        $config['total_rows'] = $this->model->count_lamaran_saya();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 10;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['title'] = 'Lamaran Saya';
        $var['view'] = $this->model->get_profile();
        $var['lamaran'] = $this->model->get_lamaran($config['per_page'], $page['start']);
        $this->load->view('users/profile/lamaran_saya', $var);
    }

    public function bookmark_lamaran()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Lamaran Tersimpan';
        $var['bookmark'] = $this->model->lamaran_tersimpan();
        $this->load->view('users/profile/bookmark_lamaran', $var);
    }

    public function profile()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Profile';
        $var['view'] = $this->model->get_profile();
        $var['pendidikan'] = $this->model->get_pendidikan2();
        $var['pengalaman'] = $this->model->get_pengalaman();
        $var['keterampilan'] = $this->model->get_keterampilan();
        $var['data'] = $this->model->get_info_tambahan();
        $var['info1'] = $this->model->get_info_tambahan2();
        $var['info2'] = $this->model->get_info_tambahan3();
        $var['info3'] = $this->model->get_info_tambahan4();
        $this->load->view('users/profile/profile', $var);
    }

    public function pendidikan()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Pendidikan';
        $var['view'] = $this->model->get_profile();
        $var['pendidikan'] = $this->model->get_pendidikan2();
        $this->load->view('users/profile/pendidikan', $var);
    }

    public function tambah_pendidikan()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
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
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
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
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Pengalaman';
        $var['view'] = $this->model->get_profile();
        $var['pengalaman'] = $this->model->get_pengalaman();
        $this->load->view('users/profile/pengalaman', $var);
    }

    public function tambah_pengalaman()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
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
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
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
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $this->db->delete('pengalaman', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Pages/pengalaman');
    }

    public function profile_saya()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Profile Saya';
        $var['view'] = $this->model->get_profile();
        $this->load->view('users/profile/profile_saya', $var);
    }

    public function edit_profile()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $id = $this->session->userdata('id');
        $var['title'] = 'Edit Profile Saya';
        $var['edit'] = $this->db->get_where('users', ['id' => $id])->row();
        $var['view'] = $this->model->get_profile();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
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

    public function kemampuan()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Kemampuan';
        $var['view'] = $this->model->get_profile();
        $var['keterampilan'] = $this->model->get_keterampilan();
        $var['keterampilan2'] = $this->model->get_keterampilan();
        $this->load->view('users/profile/keterampilan', $var);
    }

    public function save_kemampuan()
    {
        $keterampilan = array(
            'id_users' => $this->input->post('id_users'),
            'keterampilan' => $this->input->post('keterampilan'),
            'tingkat' => $this->input->post('tingkat')
        );
        $this->db->insert('keterampilan', $keterampilan);
        $this->session->set_flashdata('success_create', true);
        redirect('Pages/kemampuan');
    }

    public function update_kemampuan()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $keterampilan = $this->input->post('keterampilan');
        $tingkat = $this->input->post('tingkat');
        $id = $this->input->post('id');
        $this->db->set('keterampilan', $keterampilan);
        $this->db->set('tingkat', $tingkat);
        $this->db->where('id', $id);
        $this->db->update('keterampilan');
        $this->session->set_flashdata('success_update', true);
        redirect('Pages/kemampuan');
    }

    public function delete_kemampuan($id)
    {
        $this->db->delete('keterampilan', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Pages/kemampuan');
    }

    public function info_tambahan()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Informasi Tambahan';
        $var['view'] = $this->model->get_profile();
        $var['data'] = $this->model->get_info_tambahan();
        $var['info1'] = $this->model->get_info_tambahan2();
        $var['info2'] = $this->model->get_info_tambahan3();
        $var['info3'] = $this->model->get_info_tambahan4();
        $this->load->view('users/profile/info_tambahan', $var);
    }

    public function add_info_tambahan()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Tambah Informasi Tambahan';
        $var['view'] = $this->model->get_profile();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $this->load->view('users/page2/create_info_tambahan', $var);
    }

    public function save_info_tambahan()
    {
        $this->form_validation->set_rules('gaji_diharapkan', 'gaji yang diharapkan', 'required|trim', ['required' => 'gaji yang diharapkan is required (gaji yang diharapkan harus di isi)']);
        $this->form_validation->set_rules('provinsi1', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota1', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        $this->form_validation->set_rules('provinsi2', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota2', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        $this->form_validation->set_rules('provinsi3', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota3', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->add_info_tambahan();
        } else {
            $this->model->save_info_tambahan();
            $this->session->set_flashdata('success_create', true);
            redirect('Pages/info_tambahan');
        }
    }

    public function edit_info_tambahan($id)
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Edit Informasi Tambahan';
        $var['view'] = $this->model->get_profile();
        $var['edit'] = $this->db->get_where('info_tambahan', ['id' => $id])->row();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $this->load->view('users/page2/edit_info_tambahan', $var);
    }

    public function update_info_tambahan()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('gaji_diharapkan', 'gaji yang diharapkan', 'required|trim', ['required' => 'gaji yang diharapkan is required (gaji yang diharapkan harus di isi)']);
        $this->form_validation->set_rules('provinsi1', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota1', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        $this->form_validation->set_rules('provinsi2', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota2', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        $this->form_validation->set_rules('provinsi3', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota3', 'kota', 'required|trim', ['required' => 'kota is required (kota harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->edit_info_tambahan($id);
        } else {
            $this->model->update_info_tambahan();
            $this->session->set_flashdata('success_update', true);
            redirect('Pages/info_tambahan');
        }
    }

    public function resume()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Resume';
        $var['view'] = $this->model->get_profile();
        $var['data'] = $this->model->get_resume();
        $this->load->view('users/profile/resume', $var);
    }

    public function save_resume()
    {
        $file = $this->upload_file_resume();
        date_default_timezone_set('Asia/Jakarta');
        if (empty($file)) {
            $this->session->set_flashdata('file_kosong', true);
            redirect('Pages/resume');
        } else {
            $resume = array(
                'id_users' => $this->input->post('id_users'),
                'file' => $this->upload_file_resume(),
                'tgl_unggah' => date('Y-m-d'),
                'waktu' => date('H:i')
            );
            $this->db->insert('resume', $resume);
            $this->session->set_flashdata('success_create', true);
            redirect('Pages/resume');
        }
    }

    public function update_resume()
    {
        $file = $this->upload_file_resume();
        $id = $this->input->post('id');
        date_default_timezone_set('Asia/Jakarta');
        if (empty($file)) {
            $this->session->set_flashdata('file_kosong', true);
            redirect('Pages/resume');
        } else {
            $this->db->set('file', $this->upload_file_resume());
            $this->db->where('id', $id);
            $this->db->update('resume');
            $this->session->set_flashdata('success_update', true);
            redirect('Pages/resume');
        }
    }

    private function upload_file_resume()
    {
        $config['upload_path']          = './assets/document/resume';
        $config['allowed_types']        = 'pdf';
        $nama_lengkap = $_FILES['file']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 2024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function delete_resume($id)
    {
        $this->model->delete_resume($id);
        $this->session->set_flashdata('success_delete', true);
        redirect('Pages/resume');
    }

    public function company()
    {
        $this->session->unset_userdata('company');
        $var['title'] = 'Perusahaan';
        $this->load->library('pagination');
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Pages/company');
        $config['total_rows'] = $this->model->count_all_company();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['company'] = $this->model->pagination_company($config['per_page'], $page['start']);
        // $var['pagination'] = $this->pagination->create_links();
        // var_dump($data['total_rows']);
        $this->load->view('users/page/company', $var);
    }

    public function search_company()
    {
        $var['title'] = 'Perusahaan';
        $this->load->library('pagination');
        if (!empty($this->input->post('company'))) {
            $data['company'] = $this->input->post('company');
            $this->session->set_userdata('company', $data['company']);
        } else {
            $data['company'] = $this->session->unset_userdata('company');
        }
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Prev';
        $config['first_link'] = 'Awal';
        $config['last_link'] = 'Akhir';
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_open'] = '<li>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_open'] = '<li>';
        $config['attributes'] = array('class' => 'page-link');
        //$total = $this->M_produk->jumlah();
        $config['base_url'] = base_url('Pages/company');
        $config['total_rows'] = $this->model->count_all_company();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 12;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['company'] = $this->model->search_company($config['per_page'], $page['start'], $data['company']);
        // $var['pagination'] = $this->pagination->create_links();
        // var_dump($data['total_rows']);
        $this->load->view('users/page/company', $var);
    }

    public function detail_company($id)
    {
        $var['view'] = $this->model->detail_company($id);
        $var['title'] = $var['view']->nama_perusahaan;
        $var['jumlah_lowongan'] = $this->model->jumlah_lowongan_perusahaan($id);
        $this->load->view('users/page/detail_company', $var);
    }

    public function lowongan_perusahaan($id)
    {
        $var['view'] = $this->model->detail_company($id);
        $var['title'] = 'Lowongan ' . $var['view']->nama_perusahaan;
        $var['jumlah_lowongan'] = $this->model->jumlah_lowongan_perusahaan($id);
        $var['lowongan'] = $this->model->lowongan_perusahaan($id);
        $var['done'] = $this->model->sudah_melamar();
        foreach ($var['done'] as $d) {
            $id_job[] = $d->id_job;
        }
        if (!empty($id_job)) {
            $var['datta'] = $id_job;
        }
        $this->load->view('users/page/lowongan_perusahaan', $var);
    }

    public function contact()
    {
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth');
        }
        $var['title'] = 'Contact';
        $id = $this->session->userdata('id');
        $var['view'] = $this->db->get_where('users', ['id' => $id])->row();
        $this->load->view('users/page/contact', $var);
    }

    public function save_message()
    {
        $this->form_validation->set_rules('subject', 'subject', 'required|trim', ['required' => 'subjek is required (subjek harus di isi)']);
        $this->form_validation->set_rules('pesan', 'pesan', 'required|trim', ['required' => 'pesan is required (pesan harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->contact();
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $message = [
                'id_users' => $this->input->post('id_users'),
                'subject' => $this->input->post('subject'),
                'pesan' => $this->input->post('pesan'),
                'waktu' => date('Y-m-d h:i:s'),
                'status_pesan' => 0
            ];
            $this->db->insert('contact', $message);
            $email = $this->input->post('email');
            $this->send_email('reply_contact', $email);
            $this->session->set_flashdata('berhasil_kirim', true);
            redirect('Pages/contact');
        }
    }

    private function send_email($type, $email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'searchjobb22@gmail.com',
            'smtp_pass' => 'wxwlkjtmqnnnfksu',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('searchjobb22@gmail.com', 'Search Job');

        $this->email->to($email);

        if ($type == 'reply_contact') {
            $this->email->subject('Pesan berhasil terkirimkan');
            $this->email->message(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $email . '</p>
            <p class="card-text">Terima Kasih telah mengirimkan pesan kepada kami</p>
            <br>
            <p class="card-text">Kami akan meninjau lebih lanjut pesan dari anda dan akan membalasnya melalui email</p>
            <p>Terima Kasih,</p>
            <p>Search Job Team</p>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>'
            );
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
