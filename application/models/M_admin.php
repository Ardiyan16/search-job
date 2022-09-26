<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    private $bid_company = 'bidang_perusahaan';
    private $bid_specialis = 'bidang_spesialis';
    private $bid_job = 'bidang_pekerjaan';
    private $tk_kerja = 'tingkat_pekerjaan';
    private $jns_kerja = 'jenis_pekerjaan';
    private $uk_company = 'ukuran_perusahaan';
    private $info = 'info_tambahan';
    private $resume = 'resume';
    private $pendidikan = 'pendidikan';
    private $pengalaman = 'pengalaman';
    private $blog = 'blog';

    public function get_bidang_perusahaan()
    {
        return $this->db->get($this->bid_company)->result();
    }

    public function get_users()
    {
        return $this->db->get_where('users', ['status', 1])->result();
    }

    public function count_users()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('users');
        $this->db->where('status', 1);
        return $this->db->get()->row()->jml;
    }

    public function count_company()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('company');
        $this->db->where('status', 1);
        return $this->db->get()->row()->jml;
    }

    public function count_postjob()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('post_job');
        $this->db->where('status', 0);
        return $this->db->get()->row()->jml;
    }

    public function count_apply()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('apply_job');
        return $this->db->get()->row()->jml;
    }

    public function get_bidang_pekerjaan()
    {
        $this->db->select('bid_pekerjaan.*, bid_spesialis.spesialis');
        $this->db->from('bidang_pekerjaan bid_pekerjaan');
        $this->db->join('bidang_spesialis bid_spesialis', 'bid_pekerjaan.id_spesialis = bid_spesialis.id');
        return $this->db->get()->result();
    }

    public function get_tingkat_pekerjaan()
    {
        return $this->db->get($this->tk_kerja)->result();
    }

    public function get_jenis_pekerjaan()
    {
        return $this->db->get($this->jns_kerja)->result();
    }

    public function get_ukuran_perusahaan()
    {
        return $this->db->get($this->uk_company)->result();
    }

    public function get_bidang_spesialis()
    {
        return $this->db->get($this->bid_specialis)->result();
    }

    public function get_profile($id)
    {
        // $this->db->select('users.*, reg.name kota, prov.name provinsi');
        // $this->db->from('users');
        // $this->db->join('regencies reg', 'users.kota = reg.id');
        // $this->db->join('provinces prov', 'users.provinsi = prov.id');
        // $this->db->where('users.id', $id);
        // return $this->db->get()->row();
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function get_pendidikan2($id)
    {
        $this->db->select('pendidikan.*, reg.name kota, prov.name provinsi');
        $this->db->from('pendidikan');
        $this->db->join('regencies reg', 'pendidikan.kota = reg.id');
        $this->db->join('provinces prov', 'pendidikan.provinsi = prov.id');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function get_pengalaman($id)
    {
        $this->db->select('peng.*, bs.spesialis, bp.bidang_pekerjaan, reg.name kota, prov.name provinsi, bpr.bidang_perusahaan');
        $this->db->from('pengalaman peng');
        $this->db->join('bidang_spesialis bs', 'peng.bidang = bs.id');
        $this->db->join('bidang_pekerjaan bp', 'peng.keahlian = bp.id');
        $this->db->join('regencies reg', 'peng.city = reg.id');
        $this->db->join('provinces prov', 'peng.provinces = prov.id');
        $this->db->join('bidang_perusahaan bpr', 'peng.industri = bpr.id');
        $this->db->where('id_users', $id);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
        // return $this->db->get_where('pengalaman', ['id_users' => $id])->result();
    }

    public function get_keterampilan($id)
    {
        return $this->db->get_where('keterampilan', ['id_users' => $id])->result();
    }

    public function get_info_tambahan($id)
    {
        return $this->db->get_where($this->info, ['id_users' => $id])->row();
    }

    public function get_info_tambahan2($id)
    {
        $this->db->select('it.*, prov.name provinsi, reg.name kota');
        $this->db->from('info_tambahan it');
        $this->db->join('provinces prov', 'it.provinsi1 = prov.id');
        $this->db->join('regencies reg', 'it.kota1 = reg.id');
        $this->db->where('id_users', $id);
        return $this->db->get()->row();
    }

    public function get_info_tambahan3($id)
    {
        $this->db->select('it.*, prov.name provinsi, reg.name kota');
        $this->db->from('info_tambahan it');
        $this->db->join('provinces prov', 'it.provinsi2 = prov.id');
        $this->db->join('regencies reg', 'it.kota2 = reg.id');
        $this->db->where('id_users', $id);
        return $this->db->get()->row();
    }

    public function get_info_tambahan4($id)
    {
        $this->db->select('it.*, prov.name provinsi, reg.name kota');
        $this->db->from('info_tambahan it');
        $this->db->join('provinces prov', 'it.provinsi3 = prov.id');
        $this->db->join('regencies reg', 'it.kota3 = reg.id');
        $this->db->where('id_users', $id);
        return $this->db->get()->row();
    }

    public function get_company()
    {
        $this->db->select('com.*, up.ukuran, bp.bidang_perusahaan');
        $this->db->from('company com');
        $this->db->join('ukuran_perusahaan up', 'com.jumlah_karyawan = up.id');
        $this->db->join('bidang_perusahaan bp', 'com.bid_company = bp.id');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_company($id)
    {
        $this->db->select('com.*, up.ukuran, bp.bidang_perusahaan');
        $this->db->from('company com');
        $this->db->join('ukuran_perusahaan up', 'com.jumlah_karyawan = up.id');
        $this->db->join('bidang_perusahaan bp', 'com.bid_company = bp.id');
        $this->db->where('status', 1);
        $this->db->where('com.id', $id);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->row();
    }

    public function get_job_vacancy()
    {
        $this->db->select('pj.*, prov.name provinsi, reg.name kota, jp.jenis_kerja, bs.spesialis, com.nama_perusahaan');
        $this->db->from('post_job pj');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('jenis_pekerjaan jp', 'pj.jenis_pekerjaan = jp.id');
        $this->db->join('bidang_spesialis bs', 'pj.bid_spesialis = bs.id');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function detail_job_vacancy($id)
    {
        $this->db->select('pj.*, prov.name provinsi, reg.name kota, jp.jenis_kerja, bs.spesialis, bp.bidang_pekerjaan, tp.tingkat_kerja, com.nama_perusahaan');
        $this->db->from('post_job pj');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('jenis_pekerjaan jp', 'pj.jenis_pekerjaan = jp.id');
        $this->db->join('bidang_spesialis bs', 'pj.bid_spesialis = bs.id');
        $this->db->join('bidang_pekerjaan bp',  'pj.bid_kerja = bp.id');
        $this->db->join('tingkat_pekerjaan tp', 'pj.tingkat_pekerjaan = tp.id');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->where('pj.id', $id);
        return $this->db->get()->row();
    }

    public function total_pelamar($id)
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('apply_job');
        $this->db->where('id_job', $id);
        return $this->db->get()->row()->jml;
    }

    public function get_pelamar($id)
    {
        $this->db->select('*');
        $this->db->from('apply_job aj');
        $this->db->join('users', 'aj.id_users = users.id');
        $this->db->where('id_job', $id);
        $this->db->order_by('aj.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_pesan()
    {
        $this->db->select('con.*, usr.nama_depan, usr.nama_belakang, usr.email');
        $this->db->from('contact con');
        $this->db->join('users usr', 'con.id_users = usr.id');
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }

    public function get_blog()
    {
        $this->db->select('blog.*, emp.nama, emp.role_id, tp.topik topikk');
        $this->db->from('blog');
        $this->db->join('employee emp', 'blog.penulis = emp.id');
        $this->db->join('topik tp', 'blog.topik = tp.id');
        $this->db->order_by('blog.id', 'desc');
        return $this->db->get()->result();
    }

    public function save_blog()
    {
        $post = $this->input->post();
        date_default_timezone_set('Asia/Jakarta');
        $this->judul = $post['judul'];
        $this->topik = $post['topik'];
        $this->tanggal = date('Y-m-d h:i:s');
        $this->penulis = $post['penulis'];
        $this->isi = $post['isi'];
        $this->images = $this->upload_imageBlog();
        $this->db->insert($this->blog, $this);
    }

    private function upload_imageBlog()
    {
        $config['upload_path']          = './assets/image/blog_image';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['images']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('images')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }
}
