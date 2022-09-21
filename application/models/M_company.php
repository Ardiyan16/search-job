<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_company extends CI_Model
{
    private $company = 'company';
    private $loker = 'post_job';
    private $info = 'info_tambahan';

    public function get_company()
    {
        $id = $this->session->userdata('id');
        $this->db->select('company.*, ukuran_perusahaan.ukuran, bidang_perusahaan.bidang_perusahaan');
        $this->db->from('company');
        $this->db->join('ukuran_perusahaan', 'company.jumlah_karyawan = ukuran_perusahaan.id');
        $this->db->join('bidang_perusahaan', 'company.bid_company = bidang_perusahaan.id');
        $this->db->where('company.id', $id);
        return $this->db->get()->row();
        // return $this->db->get_where($this->company, ['id' => $id])->row();
    }

    public function get_company2()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where($this->company, ['id' => $id])->row();
    }

    public function get_lowongan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('pj.*, com.nama_perusahaan,com.logo, jepek.jenis_kerja');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->where('com.id', $id);
        $this->db->order_by('pj.id', 'desc');
        return $this->db->get()->result();
    }

    public function jml_lowongan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('COUNT(id) as jml');
        $this->db->from('post_job');
        $this->db->where('id_company', $id);
        return $this->db->get()->row()->jml;
    }

    public function detail_lowongan($id)
    {
        $this->db->select('pj.*, com.nama_perusahaan, com.logo, com.alamat, com.situs, com.deskripsi, reg.name city, prov.name provinces, tp.tingkat_kerja, 
        jepek.jenis_kerja, bp.bidang_pekerjaan');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->join('tingkat_pekerjaan tp', 'pj.tingkat_pekerjaan = tp.id');
        $this->db->join('bidang_pekerjaan bp', 'pj.bid_kerja = bp.id');
        $this->db->where('pj.id', $id);
        return $this->db->get()->row();
    }

    public function update_company()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama = $post['nama'];
        $this->no_telp = $post['no_telp'];
        $this->nama_perusahaan = $post['nama_perusahaan'];
        $this->alamat = $post['alamat'];
        $this->kota = $post['kota'];
        $this->jumlah_karyawan = $post['jumlah_karyawan'];
        $this->bid_company = $post['bid_company'];
        $this->situs = $post['situs'];
        $this->deskripsi = $post['deskripsi'];
        if (!empty($_FILES["logo"]["name"])) {
            $this->logo = $this->upload_logo();
        } else {
            $this->logo = $post["old_images"];
        }
        $this->db->update($this->company, $this, ['id' => $post['id']]);
    }

    private function upload_logo()
    {
        $config['upload_path']          = './assets/image/company_logo';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['logo']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('logo')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function save_post_job()
    {
        $post = $this->input->post();
        $this->job_title = $post['job_title'];
        $this->kota = $post['kota'];
        $this->provinsi = $post['provinsi'];
        $this->bid_spesialis = $post['bid_spesialis'];
        $this->bid_kerja = $post['bid_kerja'];
        $this->deskripsi_job = $post['deskripsi_job'];
        $this->benefit = $post['benefit'];
        $this->rentang_gaji = str_replace(",", "", $post['rentang_gaji']);
        $this->rentang_gaji2 = str_replace(",", "", $post['rentang_gaji2']);
        $this->tingkat_pekerjaan = $post['tingkat_pekerjaan'];
        $this->pengalaman = $post['pengalaman'];
        $this->kualifikasi = $post['kualifikasi'];
        $this->jenis_pekerjaan = $post['jenis_pekerjaan'];
        $this->waktu_proses = $post['waktu_proses'];
        $this->tunjangan = $post['tunjangan'];
        $this->tgl_posting = date("Y-m-d");
        $this->id_company = $post['id_company'];
        $this->db->insert($this->loker, $this);
    }

    public function update_post_job()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->job_title = $post['job_title'];
        $this->kota = $post['kota'];
        $this->provinsi = $post['provinsi'];
        $this->bid_spesialis = $post['bid_spesialis'];
        $this->bid_kerja = $post['bid_kerja'];
        $this->deskripsi_job = $post['deskripsi_job'];
        $this->benefit = $post['benefit'];
        $this->rentang_gaji = str_replace(",", "", $post['rentang_gaji']);
        $this->rentang_gaji2 = str_replace(",", "", $post['rentang_gaji2']);
        $this->tingkat_pekerjaan = $post['tingkat_pekerjaan'];
        $this->pengalaman = $post['pengalaman'];
        $this->kualifikasi = $post['kualifikasi'];
        $this->jenis_pekerjaan = $post['jenis_pekerjaan'];
        $this->waktu_proses = $post['waktu_proses'];
        $this->tunjangan = $post['tunjangan'];
        $this->updated_at = date("Y-m-d");
        $this->id_company = $post['id_company'];
        $this->db->update($this->loker, $this, ['id' => $post['id']]);
    }

    public function total_users()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('users');
        $this->db->where('status', '1');
        return $this->db->get()->row()->jml;
    }

    public function get_pelamar($id)
    {
        $this->db->select('aj.*, u.nama_depan, u.nama_belakang, u.email, reg.name kota, prov.name provinsi, r.file');
        $this->db->from('apply_job aj');
        $this->db->join('users u', 'aj.id_users = u.id');
        $this->db->join('regencies reg', 'u.kota = reg.id');
        $this->db->join('provinces prov', 'u.provinsi = prov.id');
        $this->db->join('resume r', 'u.id = r.id_users');
        $this->db->where('id_job', $id);
        return $this->db->get()->result();
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
}
