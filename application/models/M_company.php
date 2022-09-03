<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_company extends CI_Model
{
    private $company = 'company';
    private $loker = 'post_job';

    public function get_company()
    {
        $id = $this->session->userdata('id');
        $this->db->select('company.*, ukuran_perusahaan.ukuran');
        $this->db->from('company');
        $this->db->join('ukuran_perusahaan', 'company.jumlah_karyawan = ukuran_perusahaan.id');
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
        $this->db->select('*');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->where('com.id', $id);
        return $this->db->get()->result();
    }

    public function jml_lowongan()
    {
        $id = $this->session->userdata('id');
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
        $this->bid_kerja = $post['bid_kerja'];
        $this->deskripsi = $post['deskripsi'];
        $this->benefit = $post['benefit'];
        $this->rentang_gaji = $post['rentang_gaji'];
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
}
