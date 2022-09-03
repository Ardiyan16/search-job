<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->model('M_company', 'model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Company | Home';
        $this->load->view('company/home', $var);
    }

    public function post_job()
    {
        $var['title'] = 'Company | Post Job';
        $var['bidang_pekerjaan'] = $this->admin->get_bidang_pekerjaan();
        $var['tingkat_pekerjaan'] = $this->admin->get_tingkat_pekerjaan();
        $var['jenis_pekerjaan'] = $this->admin->get_jenis_pekerjaan();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $this->load->view('company/job/post_job', $var);
    }

    public function save_post_job()
    {
        $company = $this->model->get_company();
        if ($company->alamat == NULL) {
            $this->session->set_flashdata('complete_profile', true);
            redirect('Company/post_job');
        } elseif ($company->kota == NULL) {
            $this->session->set_flashdata('complete_profile', true);
            redirect('Company/post_job');
        } else {
            $this->form_validation->set_rules('job_title', 'Judul Lowongan', 'required|trim', ['required' => 'judul lowongan is required (judul lowongan harus di isi)']);
            $this->form_validation->set_rules('bid_kerja', 'Bidang Kerja', 'required|trim', ['required' => 'bidang kerja is required (bidang kerja harus di isi)']);
            $this->form_validation->set_rules('tingkat_pekerjaan', 'tigkat pekerjaan', 'required|trim', ['required' => 'tigkat pekerjaan is required (tigkat pekerjaan harus di isi)']);
            $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
            $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kabupaten / kota is required (kabupaten / kota harus di isi)']);
            $this->form_validation->set_rules('pengalaman', 'pengalaman', 'required|trim', ['required' => 'pengalaman is required (pengalaman harus di isi)']);
            $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', ['required' => 'deskripsi pekerjaan is required (deskripsi pekerjaan harus di isi)']);
            $this->form_validation->set_rules('jenis_pekerjaan', 'jenis pekerjaan', 'required|trim', ['required' => 'jenis_pekerjaan is required (jenis_pekerjaan harus di isi)']);
            if ($this->form_validation->run() == false) {
                $this->post_job();
            } else {
                $this->model->save_post_job();
                $this->session->set_flashdata('success_post_job', true);
                redirect('Company/list_job');
            }
        }
    }

    public function list_job()
    {
        $var['title'] = 'Company | List Job';
        $var['lowongan'] = $this->model->get_lowongan();
        $this->load->view('company/job/list_job', $var);
    }

    public function wilayah()
    {
        switch ($_GET['jenis']) {
                //ambil data kota / kabupaten
            case 'kota':
                $id_provinces = $_POST['id_provinces'];
                if ($id_provinces == '') {
                    exit;
                } else {
                    $get_kota = $this->db->query("SELECT  * FROM regencies WHERE province_id ='$id_provinces' ORDER BY name ASC")->result_array();
                    foreach ($get_kota as $kota) {
                        echo '<option value="' . $kota['id'] . '">' . $kota['name'] . '</option>';
                    }
                    exit;
                }
                break;
        }
    }

    public function profile()
    {
        $var['title'] = 'Company | Profile';
        $data = $this->model->get_company2();
        if ($data->jumlah_karyawan == NULL) {
            $var['view'] = $this->model->get_company2();
        } else {
            $var['view'] = $this->model->get_company();
        }
        // var_dump($data);
        $this->load->view('company/profile', $var);
    }

    public function edit_profile()
    {
        $var['title'] = 'Company | Edit Profile';
        $var['edit'] = $this->model->get_company2();
        $var['ukuran'] = $this->db->get('ukuran_perusahaan')->result();
        $this->load->view('company/edit_profile', $var);
    }

    public function update_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'nama penanggung jawab is required (nama penanggung jawab harus di isi)']);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim|max_length[13]|numeric', ['required' => 'no telepon is required (no telepon harus di isi)', 'max_length' => 'no telepon minimum 13 number (nomor telepon minimal 13 angka)', 'numeric' => 'input only numbers (inputan hanya bisa angka)']);
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim', ['required' => 'nama perusahaan is required (nama perusahaan harus di isi)']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'alamat is required (alamat harus di isi)']);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kabupaten / kota is required (kabupaten / kota harus di isi)']);
        $this->form_validation->set_rules('jumlah_karyawan', 'Jumlah Karyawan', 'required|trim', ['required' => 'ukuran perusahaan is required (ukuran perusahaan harus di isi)']);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', ['required' => 'deskripsi perusahaan is required (deskripsi perusahaan harus di isi)']);
        $this->form_validation->set_rules('situs', 'Situs', 'required|trim', ['required' => 'website / situs is required (website / situs harus di isi)']);
        if (empty($_FILES['logo']['name'])) {
            $this->form_validation->set_rules('logo', 'Document', 'required', ['required' => 'logo is required (logo harus di isi)']);
        }
        if ($this->form_validation->run() == false) {
            $this->edit_profile();
        } else {
            $this->model->update_company();
            $this->session->set_flashdata('success_update', true);
            redirect('Company/profile');
        }
    }
}
