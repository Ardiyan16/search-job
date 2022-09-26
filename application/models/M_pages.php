<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pages extends CI_Model
{
    private $post_job = 'post_job';
    private $user = 'users';
    private $pendidikan = 'pendidikan';
    private $pengalaman = 'pengalaman';
    private $info = 'info_tambahan';
    private $resume = 'resume';

    public function loker_home()
    {
        $this->db->select('pj.*, com.nama_perusahaan,com.logo, jepek.jenis_kerja, reg.name kota, prov.name provinsi');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->where('pj.status', '0');
        $this->db->order_by('pj.id', 'desc');
        $this->db->limit(10);
        return $this->db->get()->result();
    }

    public function total_loker()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('post_job');
        $this->db->where('status', '0');
        return $this->db->get()->row()->jml;
    }

    public function total_company()
    {
        $this->db->select('COUNT(id) as jml');
        $this->db->from('company');
        $this->db->where('status', '1');
        return $this->db->get()->row()->jml;
    }

    public function get_lowongan($perpage, $start)
    {
        $this->db->select('pj.*, com.nama_perusahaan,com.logo, jepek.jenis_kerja, reg.name city, prov.name provinces');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->where('pj.status', '0');
        $this->db->order_by('pj.id', 'desc');
        return $this->db->get('', $perpage, $start)->result();
    }

    public function search_lowongan($job_title, $provinsi, $kota, $perpage, $start)
    {
        $this->db->select('pj.*, com.nama_perusahaan,com.logo, jepek.jenis_kerja, reg.name city, prov.name provinces');
        $this->db->from('post_job pj');
        $this->db->like('job_title', $job_title);
        $this->db->like('provinsi', $provinsi);
        $this->db->like('pj.kota', $kota);
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->where('pj.status', '0');
        $this->db->order_by('pj.id', 'desc');
        return $this->db->get('', $perpage, $start)->result();
    }

    public function count_all_lowongan()
    {
        $this->db->where('status', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get('post_job')->num_rows();
    }

    public function count_all_search($job_title, $provinsi, $kota)
    {
        $this->db->like('job_title', $job_title);
        $this->db->like('provinsi', $provinsi);
        $this->db->like('kota', $kota);
        $this->db->where('status', 0);
        $this->db->order_by('id', 'desc');
        return $this->db->get('post_job')->num_rows();
    }

    public function detail_lowongan($id)
    {
        $this->db->select('pj.*, com.nama_perusahaan, com.logo, com.alamat, com.situs, com.deskripsi, reg.name city, prov.name provinces, tp.tingkat_kerja, 
        jepek.jenis_kerja, bp.bidang_pekerjaan, com.deskripsi, com.no_telp, bper.bidang_perusahaan');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->join('tingkat_pekerjaan tp', 'pj.tingkat_pekerjaan = tp.id');
        $this->db->join('bidang_pekerjaan bp', 'pj.bid_kerja = bp.id');
        $this->db->join('bidang_perusahaan bper', 'com.bid_company = bper.id');
        $this->db->where('pj.id', $id);
        return $this->db->get()->row();
    }

    public function get_bookmark($id)
    {
        $id_users = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('bookmark_job');
        $this->db->where('id_post_job', $id);
        $this->db->where('id_users', $id_users);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->row();
    }

    public function users()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where($this->user, ['id' => $id])->row();
    }

    public function get_pendidikan()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('pendidikan', ['id_user' => $id])->row();
    }

    public function get_keterampilan()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('keterampilan', ['id_users' => $id])->result();
    }

    public function get_resum()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where('resum', ['id_users' => $id])->row();
    }

    public function lamaran_tersimpan()
    {
        $id = $this->session->userdata('id');
        $this->db->select('pj.*, bj.id_post_job, bj.id_users, com.logo, com.nama_perusahaan');
        $this->db->from('bookmark_job bj');
        $this->db->join('post_job pj', 'bj.id_post_job = pj.id');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->where('id_users', $id);
        $this->db->order_by('bj.id', 'desc');
        return $this->db->get()->result();
    }

    public function get_profile()
    {
        $id = $this->session->userdata('id');
        // $this->db->select('users.*, reg.name kota, prov.name provinsi');
        // $this->db->from('users');
        // $this->db->join('regencies reg', 'users.kota = reg.id');
        // $this->db->join('provinces prov', 'users.provinsi = prov.id');
        // $this->db->where('users.id', $id);
        // return $this->db->get()->row();
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function get_pendidikan2()
    {
        $id = $this->session->userdata('id');
        $this->db->select('pendidikan.*, reg.name kota, prov.name provinsi');
        $this->db->from('pendidikan');
        $this->db->join('regencies reg', 'pendidikan.kota = reg.id');
        $this->db->join('provinces prov', 'pendidikan.provinsi = prov.id');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }

    public function get_pengalaman()
    {
        $id = $this->session->userdata('id');
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

    public function save_pendidikan()
    {
        $post = $this->input->post();
        $this->id_user = $post['id_user'];
        $this->nama_institusi = $post['nama_institusi'];
        $this->bulan = $post['bulan'];
        $this->tahun = $post['tahun'];
        $this->kualifikasi = $post['kualifikasi'];
        $this->kota = $post['kota'];
        $this->provinsi = $post['provinsi'];
        $this->bidang_studi = $post['bidang_studi'];
        $this->nilai = $post['nilai_akhir'];
        $this->informasi_tambahan = $post['informasi_tambahan'];
        $this->db->insert($this->pendidikan, $this);
    }

    public function update_pendidikan()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->id_user = $post['id_user'];
        $this->nama_institusi = $post['nama_institusi'];
        $this->bulan = $post['bulan'];
        $this->tahun = $post['tahun'];
        $this->kualifikasi = $post['kualifikasi'];
        $this->kota = $post['kota'];
        $this->provinsi = $post['provinsi'];
        $this->bidang_studi = $post['bidang_studi'];
        $this->nilai = $post['nilai_akhir'];
        $this->informasi_tambahan = $post['informasi_tambahan'];
        $this->db->update($this->pendidikan, $this, array('id' => $post['id']));
    }

    public function save_pengalaman()
    {
        $post = $this->input->post();
        $awal = $this->input->post('tahun_awal') . '-' . $this->input->post('bulan_awal') . '-' . $this->input->post('tgl');
        $akhir = $this->input->post('tahun_akhir') . '-' . $this->input->post('bulan_akhir') . '-' . $this->input->post('tgl');
        $this->id_users = $post['id_users'];
        $this->posisi = $post['posisi'];
        $this->nama_perusahaan = $post['nama_perusahaan'];
        $this->awal = $awal;
        $this->akhir = $akhir;
        $this->bidang = $post['bidang'];
        $this->keahlian = $post['keahlian'];
        $this->city = $post['city'];
        $this->provinces = $post['provinces'];
        $this->industri = $post['industri'];
        $this->gaji = str_replace(",", "", $post['gaji']);
        $this->keterangan = $post['keterangan'];
        $this->db->insert($this->pengalaman, $this);
    }

    public function update_pengalaman()
    {
        $post = $this->input->post();
        $awal = $this->input->post('tahun_awal') . '-' . $this->input->post('bulan_awal') . '-' . $this->input->post('tgl');
        $akhir = $this->input->post('tahun_akhir') . '-' . $this->input->post('bulan_akhir') . '-' . $this->input->post('tgl');
        $this->id = $post['id'];
        $this->id_users = $post['id_users'];
        $this->posisi = $post['posisi'];
        $this->nama_perusahaan = $post['nama_perusahaan'];
        $this->awal = $awal;
        $this->akhir = $akhir;
        $this->bidang = $post['bidang'];
        $this->keahlian = $post['keahlian'];
        $this->city = $post['city'];
        $this->provinces = $post['provinces'];
        $this->industri = $post['industri'];
        $this->gaji = str_replace(",", "", $post['gaji']);
        $this->keterangan = $post['keterangan'];
        $this->db->update($this->pengalaman, $this, ['id' => $post['id']]);
    }

    public function update_profile()
    {
        $post = $this->input->post();
        if ($this->input->post('tgl') <= 9) {
            $tgl_lahir = $this->input->post('thn') . '-' . $this->input->post('bln') . '-' . '0' . $this->input->post('tgl');
        } else {
            $tgl_lahir = $this->input->post('thn') . '-' . $this->input->post('bln') . '-' . $this->input->post('tgl');
        }
        $this->id = $post['id'];
        $this->nama_depan = $post['nama_depan'];
        $this->nama_belakang = $post['nama_belakang'];
        $this->tgl_lahir = $tgl_lahir;
        $this->no_telp = $post['no_telp'];
        $this->alamat = $post['alamat'];
        $this->id = $post['id'];
        $this->provinsi = $post['provinsi'];
        $this->kota = $post['kota'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->negara = $post['negara'];
        if (!empty($_FILES["picture"]["name"])) {
            $this->picture = $this->upload_picture();
        } else {
            $this->picture = $post["old_images"];
        }
        $this->db->update($this->user, $this, ['id' => $post['id']]);
    }

    private function upload_picture()
    {
        $config['upload_path']          = './assets/image/picture_users';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $nama_lengkap = $_FILES['picture']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        $this->upload->initialize($config);
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('picture')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function get_info_tambahan()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where($this->info, ['id_users' => $id])->row();
    }

    public function get_info_tambahan2()
    {
        $id = $this->session->userdata('id');
        $this->db->select('it.*, prov.name provinsi, reg.name kota');
        $this->db->from('info_tambahan it');
        $this->db->join('provinces prov', 'it.provinsi1 = prov.id');
        $this->db->join('regencies reg', 'it.kota1 = reg.id');
        $this->db->where('id_users', $id);
        return $this->db->get()->row();
    }

    public function get_info_tambahan3()
    {
        $id = $this->session->userdata('id');
        $this->db->select('it.*, prov.name provinsi, reg.name kota');
        $this->db->from('info_tambahan it');
        $this->db->join('provinces prov', 'it.provinsi2 = prov.id');
        $this->db->join('regencies reg', 'it.kota2 = reg.id');
        $this->db->where('id_users', $id);
        return $this->db->get()->row();
    }

    public function get_info_tambahan4()
    {
        $id = $this->session->userdata('id');
        $this->db->select('it.*, prov.name provinsi, reg.name kota');
        $this->db->from('info_tambahan it');
        $this->db->join('provinces prov', 'it.provinsi3 = prov.id');
        $this->db->join('regencies reg', 'it.kota3 = reg.id');
        $this->db->where('id_users', $id);
        return $this->db->get()->row();
    }

    public function save_info_tambahan()
    {
        $post = $this->input->post();
        $this->id_users = $post['id_users'];
        $this->gaji_diharapkan = str_replace(",", "", $post['gaji_diharapkan']);
        $this->provinsi1 = $post['provinsi1'];
        $this->kota1 = $post['kota1'];
        $this->provinsi2 = $post['provinsi2'];
        $this->kota2 = $post['kota2'];
        $this->provinsi3 = $post['provinsi3'];
        $this->kota3 = $post['kota3'];
        $this->informasi_lainnya = $post['informasi_lainnya'];
        $this->db->insert($this->info, $this);
    }

    public function update_info_tambahan()
    {
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->id_users = $post['id_users'];
        $this->gaji_diharapkan = str_replace(",", "", $post['gaji_diharapkan']);
        $this->provinsi1 = $post['provinsi1'];
        $this->kota1 = $post['kota1'];
        $this->provinsi2 = $post['provinsi2'];
        $this->kota2 = $post['kota2'];
        $this->provinsi3 = $post['provinsi3'];
        $this->kota3 = $post['kota3'];
        $this->informasi_lainnya = $post['informasi_lainnya'];
        $this->db->update($this->info, $this, array('id' => $post['id']));
    }

    public function get_resume()
    {
        $id = $this->session->userdata('id');
        return $this->db->get_where($this->resume, ['id_users' => $id])->row();
    }

    public function delete_resume($id)
    {
        $this->hapus_file($id);
        return $this->db->delete($this->resume, array("id" => $id));
    }

    public function hapus_file($id)
    {
        $data = $this->db->get_where($this->resume, ['id' => $id])->row();
        if ($data->file != "01.jpg") {
            $filename = explode(".", $data->file)[0];
            return array_map('unlink', glob(FCPATH . "/assets/document/resume/$filename.*"));
        }
    }

    public function get_lamaran($perpage, $start)
    {
        $id = $this->session->userdata('id');
        $this->db->select('aj.*, pj.*, c.logo, c.nama_perusahaan');
        $this->db->from('apply_job aj');
        $this->db->join('post_job pj', 'aj.id_job = pj.id');
        $this->db->join('company c', 'pj.id_company = c.id');
        $this->db->where('aj.id_users', $id);
        $this->db->order_by('aj.id', 'desc');
        return $this->db->get('', $perpage, $start)->result();
    }

    public function count_lamaran_saya()
    {
        $id = $this->session->userdata('id');
        $this->db->select('COUNT(id) as jml');
        $this->db->from('apply_job aj');
        $this->db->where('aj.id_users', $id);
        $this->db->order_by('aj.id', 'desc');
        return $this->db->get()->row()->jml;
    }

    public function pagination_company($limit, $start)
    {
        // if($company) {
        //     $this->db->like('nama_perusahaan', $company);
        // }
        $this->db->select('company.*, bp.bidang_perusahaan');
        $this->db->from('company');
        $this->db->join('bidang_perusahaan bp', 'company.bid_company = bp.id');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('', $limit, $start)->result();
    }

    public function search_company($limit, $start, $company)
    {
        $this->db->like('nama_perusahaan', $company);
        $this->db->select('company.*, bp.bidang_perusahaan');
        $this->db->from('company');
        $this->db->join('bidang_perusahaan bp', 'company.bid_company = bp.id');
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('', $limit, $start)->result();
    }

    public function count_all_company()
    {
        $this->db->where('status', 1);
        $this->db->order_by('id', 'desc');
        return $this->db->get('company')->num_rows();
    }

    public function detail_company($id)
    {
        $this->db->select('company.*, bp.bidang_perusahaan, up.ukuran');
        $this->db->from('company');
        $this->db->join('bidang_perusahaan bp', 'company,bid_company = bp.id');
        $this->db->join('ukuran_perusahaan up', 'company.jumlah_karyawan = up.id');
        $this->db->where('company.id', $id);
        return $this->db->get()->row();
    }

    public function jumlah_lowongan_perusahaan($id)
    {
        $this->db->select('COUNT(psj.id) as jml');
        $this->db->from('post_job psj');
        $this->db->join('company cm', 'psj.id_company = cm.id');
        $this->db->where('cm.id', $id);
        return $this->db->get()->row()->jml;
    }

    public function lowongan_perusahaan($id)
    {
        $this->db->select('pj.*, com.nama_perusahaan,com.logo, jepek.jenis_kerja, reg.name kota, prov.name provinsi');
        $this->db->from('post_job pj');
        $this->db->join('company com', 'pj.id_company = com.id');
        $this->db->join('jenis_pekerjaan jepek', 'pj.jenis_pekerjaan = jepek.id');
        $this->db->join('regencies reg', 'pj.kota = reg.id');
        $this->db->join('provinces prov', 'pj.provinsi = prov.id');
        $this->db->where('pj.status', '0');
        $this->db->where('com.id', $id);
        $this->db->order_by('pj.id', 'desc');
        return $this->db->get()->result();
    }

    public function sudah_melamar2($id)
    {
        $id_users = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('apply_job');
        $this->db->where('id_job', $id);
        $this->db->where('id_users', $id_users);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->row();
    }

    public function sudah_melamar()
    {
        $id_users = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('apply_job');
        $this->db->where('id_users', $id_users);
        $this->db->order_by('id', 'desc');
        return $this->db->get()->result();
    }
}
