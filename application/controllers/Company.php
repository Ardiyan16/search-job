<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Company extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'admin');
        $this->load->model('M_company', 'model');
        $this->load->model('M_pages', 'pages');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Company | Home';
        $var['company'] = $this->db->order_by('id', 'desc')->limit(8)->get('company')->result();
        $var['total_company'] = $this->pages->total_company();
        $var['total_kandidat'] = $this->model->total_users();
        $this->load->view('company/home', $var);
    }

    public function post_job()
    {
        $var['title'] = 'Company | Post Job';
        $var['bidang_pekerjaan'] = $this->admin->get_bidang_pekerjaan();
        $var['tingkat_pekerjaan'] = $this->admin->get_tingkat_pekerjaan();
        $var['jenis_pekerjaan'] = $this->admin->get_jenis_pekerjaan();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['spesialis'] = $this->db->get('bidang_spesialis')->result_array();
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
            $this->form_validation->set_rules('bid_spesialis', 'Bidang Spesialis', 'required|trim', ['required' => 'spesialis is required (spesialis harus di isi)']);
            $this->form_validation->set_rules('bid_kerja', 'Bidang Kerja', 'required|trim', ['required' => 'bidang kerja is required (bidang kerja harus di isi)']);
            $this->form_validation->set_rules('tingkat_pekerjaan', 'tigkat pekerjaan', 'required|trim', ['required' => 'tigkat pekerjaan is required (tigkat pekerjaan harus di isi)']);
            $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
            $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kabupaten / kota is required (kabupaten / kota harus di isi)']);
            $this->form_validation->set_rules('pengalaman', 'pengalaman', 'required|trim', ['required' => 'pengalaman is required (pengalaman harus di isi)']);
            $this->form_validation->set_rules('deskripsi_job', 'Deskripsi', 'required|trim', ['required' => 'deskripsi pekerjaan is required (deskripsi pekerjaan harus di isi)']);
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
        $config['base_url'] = base_url('Company/list_job');
        $config['total_rows'] = $this->model->jml_lowongan();
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 3;
        $this->pagination->initialize($config);
        $page['start'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $var['lowongan'] = $this->model->get_lowongan($config['per_page'], $page['start']);
        $var['jml_loker'] = $this->model->jml_lowongan();
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

    public function bidang_kerja()
    {
        switch ($_GET['jenis']) {
                //ambil data kota / kabupaten
            case 'bid_kerja':
                $id_specialis = $_POST['id_spesialis'];
                if ($id_specialis == '') {
                    exit;
                } else {
                    $get_bidang_kerja = $this->db->query("SELECT * FROM bidang_pekerjaan WHERE id_spesialis ='$id_specialis' ORDER BY bidang_pekerjaan ASC")->result_array();
                    foreach ($get_bidang_kerja as $get) {
                        echo '<option value="' . $get['id'] . '">' . $get['bidang_pekerjaan'] . '</option>';
                    }
                    exit;
                }
                break;
        }
    }

    public function detail_lowongan($id)
    {
        if (empty($this->session->userdata('nama_perusahaan'))) {
            $this->session->set_flashdata('session_habis', true);
            redirect('Auth/login_company');
        }
        $var['title'] = 'Company | Detail Lowongan';
        $var['job'] = $this->model->detail_lowongan($id);
        $var['pelamar'] = $this->model->get_pelamar($id);
        $this->load->view('company/job/detail_post', $var);
    }

    public function edit_post_job($id)
    {
        $var['title'] = 'Company | Edit Post Job';
        $var['edit'] = $this->model->detail_lowongan($id);
        $var['bidang_pekerjaan'] = $this->admin->get_bidang_pekerjaan();
        $var['tingkat_pekerjaan'] = $this->admin->get_tingkat_pekerjaan();
        $var['jenis_pekerjaan'] = $this->admin->get_jenis_pekerjaan();
        $var['provinsi'] = $this->db->get('provinces')->result_array();
        $var['kota'] = $this->db->get('regencies')->result_array();
        $var['spesialis'] = $this->db->get('bidang_spesialis')->result_array();
        $var['bid_kerja'] = $this->db->get('bidang_pekerjaan')->result_array();
        $this->load->view('company/job/edit_post', $var);
    }

    public function update_post_job()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('job_title', 'Judul Lowongan', 'required|trim', ['required' => 'judul lowongan is required (judul lowongan harus di isi)']);
        $this->form_validation->set_rules('bid_spesialis', 'Bidang Spesialis', 'required|trim', ['required' => 'spesialis is required (spesialis harus di isi)']);
        $this->form_validation->set_rules('bid_kerja', 'Bidang Kerja', 'required|trim', ['required' => 'bidang kerja is required (bidang kerja harus di isi)']);
        $this->form_validation->set_rules('tingkat_pekerjaan', 'tigkat pekerjaan', 'required|trim', ['required' => 'tigkat pekerjaan is required (tigkat pekerjaan harus di isi)']);
        $this->form_validation->set_rules('provinsi', 'provinsi', 'required|trim', ['required' => 'provinsi is required (provinsi harus di isi)']);
        $this->form_validation->set_rules('kota', 'kota', 'required|trim', ['required' => 'kabupaten / kota is required (kabupaten / kota harus di isi)']);
        $this->form_validation->set_rules('pengalaman', 'pengalaman', 'required|trim', ['required' => 'pengalaman is required (pengalaman harus di isi)']);
        $this->form_validation->set_rules('deskripsi_job', 'Deskripsi', 'required|trim', ['required' => 'deskripsi pekerjaan is required (deskripsi pekerjaan harus di isi)']);
        $this->form_validation->set_rules('jenis_pekerjaan', 'jenis pekerjaan', 'required|trim', ['required' => 'jenis_pekerjaan is required (jenis_pekerjaan harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->edit_post_job($id);
        } else {
            $this->model->update_post_job();
            $this->session->set_flashdata('success_post_job', true);
            redirect('Company/detail_lowongan/' . $id);
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
        $var['bidang'] = $this->db->get('bidang_perusahaan')->result();
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
        $this->form_validation->set_rules('bid_company', 'Bidang Perusahaan', 'required|trim', ['required' => 'bidang perusahaan is required (bidang perusahaan harus di isi)']);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', ['required' => 'deskripsi perusahaan is required (deskripsi perusahaan harus di isi)']);
        $this->form_validation->set_rules('situs', 'Situs', 'required|trim', ['required' => 'website / situs is required (website / situs harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->edit_profile();
        } else {
            $this->model->update_company();
            $this->session->set_flashdata('success_update', true);
            redirect('Company/profile');
        }
    }

    public function detail_pelamar($id)
    {
        $var['view'] = $this->model->get_profile($id);
        $var['pendidikan'] = $this->model->get_pendidikan2($id);
        $var['pengalaman'] = $this->model->get_pengalaman($id);
        $var['keterampilan'] = $this->model->get_keterampilan($id);
        $var['data'] = $this->model->get_info_tambahan($id);
        $var['info1'] = $this->model->get_info_tambahan2($id);
        $var['info2'] = $this->model->get_info_tambahan3($id);
        $var['info3'] = $this->model->get_info_tambahan4($id);
        $var['title'] = 'Company | ' . $var['view']->nama_depan;
        $this->load->view('company/job/detail_pelamar', $var);
    }

    public function terima_lamaran()
    {
        $id = $this->input->get('id');
        $id_job = $this->input->get('id_job');
        $job_title = $this->input->get('job_title');
        $company = $this->input->get('company');
        $email = $this->input->get('email');
        $this->db->set('status_lamaran', 1);
        $this->db->where('id', $id);
        $this->db->update('apply_job');
        $this->send_feedback('diterima', $job_title, $company, $email);
        $this->session->set_flashdata('terima_lamaran', true);
        redirect('Company/detail_lowongan/' . $id_job);
    }

    public function tolak_lamaran()
    {
        $id = $this->input->get('id');
        $id_job = $this->input->get('id_job');
        $job_title = $this->input->get('job_title');
        $company = $this->input->get('company');
        $email = $this->input->get('email');
        $this->db->set('status_lamaran', 2);
        $this->db->where('id', $id);
        $this->db->update('apply_job');
        $this->send_feedback('belum_diterima', $job_title, $company, $email);
        $this->session->set_flashdata('tolak_lamaran', true);
        redirect('Company/detail_lowongan/' . $id_job);
    }

    private function send_feedback($type, $job_title, $company, $email)
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

        $pengguna = $email;
        if ($type == 'diterima') {
            $this->email->subject('Status Lamaran Anda');
            $this->email->message(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $pengguna . '</p>
            <p class="card-text">Lamaran yang anda ajukan pada :</p>
            <br>
            <p>Nama Perusahaan :&nbsp;' . $company . '</p><br>
            <p>Posisi :&nbsp;' . $job_title . '</p>
            <br>
            <p class="card-text" style="margin-top: 30px;">Telah masuk ke dalam daftar terpilih. tunggu pihak perusahaan menghubungi anda lebih lanjut</p>
            <p>Selamat, semoga anda beruntung pada kesempatan ini</p>
            <p>Terima Kasih,</p>
            <p>Search Job Team</p>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>'
            );
        } else if ($type == 'belum_diterima') {
            $this->email->subject('Status Lamaran Anda');
            $this->email->message(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $pengguna . '</p>
            <p class="card-text">Lamaran yang anda ajukan pada :</p>
            <br>
            <p>Nama Perusahaan :&nbsp;' . $company . '</p><br>
            <p>Posisi :&nbsp;' . $job_title . '</p>
            <br>
            <p class="card-text" style="margin-top: 30px;">Belum dapat diproses lebih lanjut atau belum cocok dengan pihak perusahaan</p>
            <p>Tetap semangat anda masih memiliki kesempatan lain</p>
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

    public function done_rectruitment($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id', $id);
        $this->db->update('post_job');
        $this->session->set_flashdata('lamaran_ditutup', true);
        redirect('Company/list_job');
    }

    public function about()
    {
        $var['title'] = 'Company | About';
        $var['count_users'] = $this->model->total_users();
        $var['count_company'] = $this->admin->count_company();
        $var['count_postjob'] = $this->admin->count_postjob();
        $var['count_apply'] = $this->admin->count_apply();
        $this->load->view('company/about', $var);
    }
}
