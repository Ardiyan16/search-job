<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $var['title'] = 'Login';
        $this->load->view('users/auth/login', $var);
    }

    public function action_login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus di isi)']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus di isi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        if ($this->form_validation->run() == false) {
            $this->index();
        } else {
            $this->proses_login();
        }
    }

    private function proses_login()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $user = $this->db->get_where('users', ['email' => $email])->row_array();
        if ($email == $user['email']) {
            if (password_verify($password, $user['password'])) {
                if ($user['status'] == 1) {
                    $data_login = [
                        'id' => $user['id'],
                        'email' => $user['email'],
                        'nama_depan' => $user['nama_depan']
                    ];
                    $this->session->set_userdata($data_login);
                    redirect('Pages');
                } else {
                    $this->session->set_flashdata('email_not_activation', true);
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('wrong_password', true);
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('wrong_email', true);
            redirect('Auth');
        }
    }

    public function logout_user()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama_depan');
        redirect('Pages');
    }

    public function register()
    {
        $var['title'] = 'Register';
        $this->load->view('users/auth/register', $var);
    }

    public function redirect()
    {
        $var['title'] = 'Redirect';
        $this->load->view('users/auth/redirect', $var);
    }

    public function redirect2()
    {
        $var['title'] = 'Redirect';
        $this->load->view('users/auth/redirect2', $var);
    }

    public function pesan()
    {
        $var['title'] = 'pesan';
        $this->load->view('users/auth/pesan', $var);
    }

    public function action_register()
    {
        $this->form_validation->set_rules('nama_depan', 'Nama Depan', 'required|trim', ['required' => 'first name is required (nama depan harus di isi)']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[users.email]|valid_email', ['is_unique' => 'email already registered (email telah terdaftar)', 'valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus di isi)']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus di isi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        $this->form_validation->set_rules('konfirm_password', 'Password', 'required|trim|matches[password]', ['required' => 'confirm password is required (konfirmasi password harus di isi)', 'matches' => 'confirm password does not match (konfirmasi password tidak cocok)']);
        if ($this->form_validation->run() == false) {
            $this->register();
        } else {
            $this->proses_register();
        }
    }

    private function proses_register()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $data_register = array(
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'status' => 0,
            'privasi' => 1
        );

        $token = base64_encode(random_bytes(30));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_create' => time()
        ];
        $this->db->insert('users', $data_register);
        $this->db->insert('token', $user_token);

        $this->send_email($token, 'verify');

        $this->session->set_flashdata('success_register', '<div class="alert alert-success" role="alert">Anda berhasil melakukan registrasi</div>');
        redirect('Auth/redirect');
    }

    private function send_email($token, $type)
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

        $this->email->to($this->input->post('email'));

        $pengguna = $this->input->post('email');
        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun Anda');
            $this->email->message(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $pengguna . '</p>
            <p class="card-text">Selamat bergabung dengan Search Job Untuk selanjutnya silahkan klik tautan dibawah ini untuk aktifkan akun anda</p>
            <a href="' . base_url() . 'Auth/verification?email=' . $this->input->post('email') .
                    '&token=' . urlencode($token) . '" class="btn btn-primary" style="margin-left: 40%; margin-top: 30px;">Aktivasi Akun</a>
            <br>
            <p class="card-text" style="margin-top: 30px;">Jika anda tidak mengklik tautan tersebut dalam waktu 24 jam maka tautan akan terhapus</p>
            <p>Terima Kasih,</p>
            <p>Search Job Team</p>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>'
            );
        } else if ($type == 'forgot') {
            $this->email->subject('Ganti Password Anda');
            $this->email->message('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $pengguna . '</p>
            <p>Silahkan klik tautan dibawah untuk mengubah password anda :</p>
            <a href="' . base_url() . 'Auth/ganti_password?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">ubah password anda</a>
                <p class="card-text" style="margin-top: 30px;">Jika anda tidak mengklik tautan tersebut dalam waktu 24 jam maka tautan akan terhapus</p>
                <p>Terima Kasih,</p>
                <p>Search Job Team</p>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            </div>
                ');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verification()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {

            $usertoken = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($usertoken) {

                if (time() - $usertoken['date_create'] < (60 * 60 * 24)) {

                    $this->db->set('status', 1);
                    $this->db->where('email', $email);
                    $this->db->update('users');

                    $this->db->delete('token', ['email' => $email]);

                    $this->session->set_flashdata('terverifikasi', true);
                    redirect('Auth');
                } else {

                    $this->db->delete('users', ['email' => $email]);
                    $this->db->delete('token', ['token' => $token]);

                    $this->session->set_flashdata('token_kadaluarsa', true);
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('token_salah', true);
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('email_salah', true);
            redirect('Auth');
        }
    }

    public function forgot_password()
    {
        $var['title'] = 'Forgot Password';
        $this->load->view('users/auth/forgot_password', $var);
    }

    public function new_password()
    {
        $var['title'] = 'New Password';
        $this->load->view('users/auth/new_password', $var);
    }

    public function action_forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->forgot_password();
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('users', ['email' => $email, 'status' => 1])->row_array();

            if ($user) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_create' => time()
                ];

                $this->db->insert('token', $user_token);
                $this->send_email($token, 'forgot');
                $this->session->set_flashdata('success_send_email', '<div class="alert alert-success" role="alert">Link untuk ubah password telah dirimkan ke email anda</div>');
                redirect('Auth/redirect2');
            } else {
                $this->session->set_flashdata('not_acount', true);
                redirect('Auth/forgot_password');
            }
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus di isi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        $this->form_validation->set_rules('konfirm_password', 'Password', 'required|trim|matches[password]', ['required' => 'confirm password is required (konfirmasi password harus di isi)', 'matches' => 'confirm password does not match (konfirmasi password tidak cocok)']);
        if ($this->form_validation->run() == false) {
            $this->new_password();
        } else {

            $password = $this->input->post('password');
            $email = $this->session->userdata('ganti_email');

            $this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
            $this->db->where('email', $email);
            $this->db->update('users');

            $this->session->unset_userdata('ganti_email');

            $this->db->delete('token', ['email' => $email]);

            $this->session->set_flashdata('success_update_pass', true);
            redirect('Auth');
        }
    }

    public function ganti_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $pengguna = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($pengguna) {

            $user_token = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('ganti_email', $email);
                $this->session->set_userdata('data_token', $token);
                $this->ubah_password($email);
                // redirect('Auth/ubah_password?email=' . $email . '&token='.  $token);
            } else {
                $this->session->set_flashdata('token_salah', true);
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('email_salah', true);
            redirect('Auth');
        }
    }

    public function login_admin()
    {
        $this->load->view('admin/auth/login');
    }

    public function action_login_admin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'username is required (username harus diisi)']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'password is required (password harus diisi)']);
        if ($this->form_validation->run() == false) {
            $this->login_admin();
        } else {
            $this->proses_login_admin();
        }
    }

    private function proses_login_admin()
    {
        $username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

        $admin = $this->db->get_where('employee', ['username' => $username])->row_array();
        if ($username == $admin['username']) {
            if (password_verify($password, $admin['password'])) {
                if ($admin['status'] == 1) {
                    $data = [
                        'id' => $admin['id'],
                        'nama' => $admin['nama'],
                        'username' => $admin['username'],
                    ];
                    $this->session->set_userdata($data);
                    if ($admin['role_id'] == 1) {
                        redirect('Superadmin');
                    } elseif ($admin['role_id'] == 2) {
                        redirect('Admin');
                    } elseif ($admin['role_id'] == 3) {
                        redirect('Employe');
                    }
                } else {
                    $this->session->unset_userdata('id');
                    $this->session->unset_userdata('nama');
                    $this->session->unset_userdata('username');
                    $this->session->set_flashdata('not_verify', true);
                    redirect('Auth/login_admin');
                }
            } else {
                $this->session->set_flashdata('wrong_password', true);
                redirect('Auth/login_admin');
            }
        } else {
            $this->session->set_flashdata('wrong_username', true);
            redirect('Auth/login_admin');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('logout', true);
        redirect('Auth/login_admin');
    }

    public function login_company()
    {
        $var['title'] = 'Company | Login';
        $this->load->view('company/auth/login', $var);
    }

    public function action_login_company()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus di isi)']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus di isi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        if ($this->form_validation->run() == false) {
            $this->login_company();
        } else {
            $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
            $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
            $user = $this->db->get_where('company', ['email' => $email])->row_array();
            if ($email == $user['email']) {
                if (password_verify($password, $user['password'])) {
                    if ($user['status'] == 1) {
                        $data_login = [
                            'id' => $user['id'],
                            'email' => $user['email'],
                            'nama_perusahaan' => $user['nama_perusahaan']
                        ];
                        $this->session->set_userdata($data_login);
                        redirect('Company');
                    } else {
                        $this->session->set_flashdata('email_not_activation', true);
                        redirect('Auth/login_company');
                    }
                } else {
                    $this->session->set_flashdata('wrong_password', true);
                    redirect('Auth/login_company');
                }
            } else {
                $this->session->set_flashdata('wrong_email', true);
                redirect('Auth/login_company');
            }
        }
    }

    public function register_company()
    {
        $var['title'] = 'Company | Register';
        $this->load->view('company/auth/register', $var);
    }

    public function action_register_company()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[company.email]|valid_email', ['is_unique' => 'email already registered (email telah terdaftar)', 'valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus di isi)']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'nama penanggung jawab is required (nama penanggung jawab harus di isi)']);
        $this->form_validation->set_rules('no_telp', 'No Telepon', 'required|trim|max_length[13]|numeric', ['required' => 'no telepon is required (no telepon harus di isi)', 'max_length' => 'no telepon minimum 13 number (nomor telepon minimal 13 angka)', 'numeric' => 'input only numbers (inputan hanya bisa angka)']);
        $this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'required|trim', ['required' => 'nama perusahaan is required (nama perusahaan harus di isi)']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus di isi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        if ($this->form_validation->run() == false) {
            $this->register_company();
        } else {
            $this->proses_register_company();
        }
    }

    private function proses_register_company()
    {
        $email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
        $password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        $data_register = array(
            'email' => htmlspecialchars($email),
            'nama' => $this->input->post('nama'),
            'no_telp' => $this->input->post('no_telp'),
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'bid_company' => 0,
            'status' => 0,
        );

        $token = base64_encode(random_bytes(30));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_create' => time()
        ];
        $this->db->insert('company', $data_register);
        $this->db->insert('token', $user_token);

        $this->kirim_email($token, 'verify');
        $this->session->set_flashdata('success_register', '<div class="alert alert-success" role="alert">Anda berhasil melakukan registrasi</div>');
        redirect('Auth/redirect');
    }

    public function kirim_email($token, $type)
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

        $this->email->to($this->input->post('email'));

        $pengguna = $this->input->post('email');
        if ($type == 'verify') {
            $this->email->subject('Verifikasi ID perusahaan Anda');
            $this->email->message(
                '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $pengguna . '</p>
            <p class="card-text">Selamat bergabung dengan Search Job Untuk selanjutnya silahkan klik tautan dibawah ini untuk aktifkan ID Perusahaan anda</p>
            <a href="' . base_url() . 'Auth/verification_company?email=' . $this->input->post('email') .
                    '&token=' . urlencode($token) . '" class="btn btn-primary" style="margin-left: 40%; margin-top: 30px;">Aktivasi ID Perusahaan</a>
            <br>
            <p class="card-text" style="margin-top: 30px;">Jika anda tidak mengklik tautan tersebut dalam waktu 24 jam maka tautan akan terhapus</p>
            <p>Terima Kasih,</p>
            <p>Search Job Team</p>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        </div>'
            );
        } else if ($type == 'forgot') {
            $this->email->subject('Ganti Password Anda');
            $this->email->message('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <div class="card-body">
            <p class="card-title" style="margin-top: 43px;">YTH :' .  $pengguna . '</p>
            <p>Silahkan klik tautan dibawah untuk mengubah password akun perusahaan anda :</p>
            <a href="' . base_url() . 'Auth/ganti_password_company?email=' . $this->input->post('email') .
                '&token=' . urlencode($token) . '">ubah password perusahaan anda</a>
                <p class="card-text" style="margin-top: 30px;">Jika anda tidak mengklik tautan tersebut dalam waktu 24 jam maka tautan akan terhapus</p>
                <p>Terima Kasih,</p>
                <p>Search Job Team</p>
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
            </div>
                ');
        }


        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verification_company()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $company = $this->db->get_where('company', ['email' => $email])->row_array();

        if ($company) {

            $usertoken = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($usertoken) {

                if (time() - $usertoken['date_create'] < (60 * 60 * 24)) {

                    $this->db->set('status', 1);
                    $this->db->where('email', $email);
                    $this->db->update('company');
                    $this->db->delete('token', ['email' => $email]);
                    $this->session->set_flashdata('terverifikasi', true);
                    redirect('Auth/login_company');
                } else {

                    $this->db->delete('company', ['email' => $email]);
                    $this->db->delete('token', ['token' => $token]);

                    $this->session->set_flashdata('token_kadaluarsa', true);
                    redirect('Auth/login_company');
                }
            } else {
                $this->session->set_flashdata('token_salah', true);
                redirect('Auth/login_company');
            }
        } else {
            $this->session->set_flashdata('email_salah', true);
            redirect('Auth/login_company');
        }
    }

    public function forgot_password_company()
    {
        $var['title'] = 'Company | Forgot Password';
        $this->load->view('company/auth/forgot_password', $var);
    }

    public function new_password_company()
    {
        $var['title'] = 'Company | New Password';
        $this->load->view('company/auth/new_password', $var);
    }

    public function action_forgot_company()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['valid_email' => 'invalid email (email tidak valid)', 'required' => 'email is required (email harus di isi)']);
        if ($this->form_validation->run() == false) {
            $this->forgot_password_company();
        } else {
            $email = $this->input->post('email');
            $company = $this->db->get_where('company', ['email' => $email, 'status' => 1])->row_array();

            if ($company) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_create' => time()
                ];

                $this->db->insert('token', $user_token);
                $this->kirim_email($token, 'forgot');
                $this->session->set_flashdata('success_send_email', '<div class="alert alert-success" role="alert">Link untuk ubah password telah dirimkan ke email perusahaan anda</div>');
                redirect('Auth/redirect2');
            } else {
                $this->session->set_flashdata('not_acount', true);
                redirect('Auth/forgot_password_company');
            }
        }
    }

    public function ganti_password_company()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');


        $company = $this->db->get_where('company', ['email' => $email])->row_array();

        if ($company) {

            $user_token = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('ganti_email', $email);
                $this->session->set_userdata('data_token', $token);
                $this->ubah_password_company($email);
                // redirect('Auth/ubah_password?email=' . $email . '&token='.  $token);
            } else {
                $this->session->set_flashdata('token_salah', true);
                redirect('Auth/login_company');
            }
        } else {
            $this->session->set_flashdata('email_salah', true);
            redirect('Auth/login_company');
        }
    }

    public function ubah_password_company()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]', ['required' => 'password is required (password harus di isi)', 'min_length' => 'password minimum 6 characters (kata sandi minimal 6 karakter)']);
        $this->form_validation->set_rules('konfirm_password', 'Password', 'required|trim|matches[password]', ['required' => 'confirm password is required (konfirmasi password harus di isi)', 'matches' => 'confirm password does not match (konfirmasi password tidak cocok)']);
        if ($this->form_validation->run() == false) {
            $this->new_password_company();
        } else {

            $password = $this->input->post('password');
            $email = $this->session->userdata('ganti_email');

            $this->db->set('password', password_hash($password, PASSWORD_BCRYPT));
            $this->db->where('email', $email);
            $this->db->update('company');

            $this->session->unset_userdata('ganti_email');

            $this->db->delete('token', ['email' => $email]);

            $this->session->set_flashdata('success_update_pass', true);
            redirect('Auth/login_company');
        }
    }

    public function logout_company()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama_perusahaan');
        $this->session->set_flashdata('logout', true);
        redirect('Company');
    }
}
