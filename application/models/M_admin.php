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

    public function get_bidang_perusahaan()
    {
        return $this->db->get($this->bid_company)->result();
    }

    public function get_users()
    {
        return $this->db->get_where('users', ['status', 1])->result();
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
}
