<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_admin', 'model');
        $this->load->library('form_validation');
        if (empty($this->session->userdata('id'))) {
            $this->session->set_flashdata('login_dulu', true);
            redirect('Auth/login_admin');
        }
    }

    public function index()
    {
        $var['title'] = 'Admin | Dashboard';
        $var['count_users'] = $this->model->count_users();
        $var['count_company'] = $this->model->count_company();
        $var['count_postjob'] = $this->model->count_postjob();
        $var['count_apply'] = $this->model->count_apply();
        $this->load->view('admin/page/dashboard', $var);
    }

    public function users()
    {
        $var['title'] = 'Admin | User/Pelamar';
        $var['users'] = $this->model->get_users();
        $this->load->view('admin/page/users', $var);
    }

    public function detail_users($id)
    {
        $var['title'] = 'Admin | Detail User/Pelamar';
        $var['title'] = 'Profile';
        $var['view'] = $this->model->get_profile($id);
        $var['pendidikan'] = $this->model->get_pendidikan2($id);
        $var['pengalaman'] = $this->model->get_pengalaman($id);
        $var['keterampilan'] = $this->model->get_keterampilan($id);
        $var['data'] = $this->model->get_info_tambahan($id);
        $var['info1'] = $this->model->get_info_tambahan2($id);
        $var['info2'] = $this->model->get_info_tambahan3($id);
        $var['info3'] = $this->model->get_info_tambahan4($id);
        $this->load->view('admin/page/detail_users', $var);
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

    public function company()
    {
        $var['title'] = 'Admin | Company';
        $var['company'] = $this->model->get_company();
        $this->load->view('admin/page/company', $var);
    }

    public function detail_company($id)
    {
        $var['view'] = $this->model->detail_company($id);
        $var['title'] = 'Admin | ' . $var['view']->nama_perusahaan;
        $this->load->view('admin/page/detail_company', $var);
    }

    public function job_vacancy()
    {
        $var['title'] = 'Admin | Job Vacancy';
        $var['job_vacancy'] = $this->model->get_job_vacancy();
        $this->load->view('admin/page/job_vacancy', $var);
    }

    public function detail_job_vacancy($id)
    {
        $var['title'] = 'Admin | Detail Postingan';
        $var['view'] = $this->model->detail_job_vacancy($id);
        $var['jumlah_pelamar'] = $this->model->total_pelamar($id);
        $var['pelamar'] = $this->model->get_pelamar($id);
        $this->load->view('admin/page/detail_job_vacancy', $var);
    }

    public function message()
    {
        $var['title'] = 'Admin | Message';
        $var['message'] = $this->model->get_pesan();
        $this->load->view('admin/page/message', $var);
    }

    public function balas_pesan()
    {
        $id = $this->input->post('id');
        $email =  $this->input->post('email');
        $balasan = $this->input->post('pesan');
        $pesan = [
            'email' => $email,
            'pesan_balasan' => $balasan,
            'waktu' =>  date('Y-m-d h:i:s'),
        ];
        $this->db->insert('balasan', $pesan);
        $this->send_email('balas_pesan', $email, $balasan);
        $this->db->set('status_pesan', 1);
        $this->db->where('id', $id);
        $this->db->update('contact');
        $this->session->set_flashdata('balasan_terkirim', true);
        redirect('Admin/message');
    }

    private function send_email($type, $email, $balasan)
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

        if ($type == 'balas_pesan') {
            $this->email->subject('Balasan pesan search job');
            $this->email->message(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $email . '</p>
            <p class="card-text">Berikut merupakan balasan pesan anda berdasarkan hasil tinjauan kami</p>
            <br>
            <p class="card-text">' . $balasan . '</p>
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

    public function list_balasan()
    {
        $var['title'] = 'List Pesan Balasan';
        $var['balasan'] = $this->db->get('balasan')->result();
        $this->load->view('admin/page/pesan_balasan', $var);
    }

    public function blog()
    {
        $var['title'] = 'Admin | Blog';
        $var['blog'] = $this->model->get_blog();
        $this->load->view('admin/page/blog', $var);
    }

    public function tambah_blog()
    {
        $var['title'] = 'Admin | Tambah Blog';
        $var['topik'] = $this->db->get('topik')->result();
        $this->load->view('admin/page/tambah_blog', $var);
    }

    public function save_blog()
    {
        $this->form_validation->set_rules('judul', 'judul', 'required|trim', ['required' => 'judul is required (judul harus di isi)']);
        $this->form_validation->set_rules('topik', 'topik', 'required|trim', ['required' => 'topik is required (topik harus di isi)']);
        $this->form_validation->set_rules('isi', 'isi', 'required|trim', ['required' => 'isi is required (isi harus di isi)']);
        if (empty($_FILES['images']['name'])) {
            $this->form_validation->set_rules('images', 'images', 'required|trim', ['required' => 'images is required (images harus di isi)']);
        }
        if ($this->form_validation->run() == false) {
            $this->tambah_blog();
        } else {
            $this->model->save_blog();
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/blog');
        }
    }

    public function topik()
    {
        $var['title'] = 'Admin | Topik';
        $var['topik'] = $this->db->order_by('id', 'desc')->get('topik')->result();
        $this->load->view('admin/page2/topik', $var);
    }

    public function save_topik()
    {
        $input = $this->input->post('topik');
        if (!empty($input)) {
            $data = [
                'topik' => $input,
            ];
            $this->db->insert('topik', $data);
            $this->session->set_flashdata('success_create', true);
            redirect('Admin/topik');
        } else {
            $this->session->set_flashdata('failed_create', true);
            redirect('Admin/topik');
        }
    }

    public function update_topik()
    {
        $input = $this->input->post('topik');
        if (!empty($input)) {
            $uk_com = $this->input->post('topik');
            $id = $this->input->post('id');
            $this->db->set('topik', $uk_com);
            $this->db->where('id', $id);
            $this->db->update('topik');
            $this->session->set_flashdata('success_update', true);
            redirect('Admin/topik');
        } else {
            $this->session->set_flashdata('failed_update', true);
            redirect('Admin/topik');
        }
    }

    public function delete_topik($id)
    {
        $this->db->delete('topik', ['id' => $id]);
        $this->session->set_flashdata('success_delete', true);
        redirect('Admin/topik');
    }
}
