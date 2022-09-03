<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_admin extends CI_Model
{
    private $bid_company = 'bidang_perusahaan';
    private $bid_job = 'bidang_pekerjaan';
    private $tk_kerja = 'tingkat_pekerjaan';
    private $jns_kerja = 'jenis_pekerjaan';
    private $uk_company = 'ukuran_perusahaan';

    public function get_bidang_perusahaan()
    {
        return $this->db->get($this->bid_company)->result();
    }

    public function get_bidang_pekerjaan()
    {
        return $this->db->get($this->bid_job)->result();
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
}
