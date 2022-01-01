<?php

class RT_model extends CI_Model {

    function Wilayah()
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_provinsi')->get()->result();
    }

    function Wilayah_kabupaten($provinsi_id)
    {
        $this->db->where('provinsi_id', $provinsi_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_kabupaten')->get()->result();
    }

    function Wilayah_kecamatan($kabupaten_id)
    {
        $this->db->where('kabupaten_id', $kabupaten_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_kecamatan')->get()->result();
    }

    function Wilayah_desa($kecamatan_id)
    {
        $this->db->where('kecamatan_id', $kecamatan_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_desa')->get()->result();
    }

    function Wilayah_rw($desa_id)
    {
        $this->db->where('desa_id', $desa_id);
        $this->db->order_by('id', 'ASC');
        return $this->db->from('wilayah_rw')->get()->result();
    }

    function input_wilayah($data)
    {   
        $input = array(
        'id' => $data['id'],
        'desa_id' => $data['desa_id'],
        'rw' => $data['rw'],
        'rt' => $data['rt']
        );
        $this->db->insert('wilayah_rw', $input);
    }

    function getAllWilayah()
    {
        $query = $this->db->query("SELECT * from wilayah_rw");
        $data = $query->result();

        return $data;
    }

    function display_row($id){		
		$query = $this->db->query("select * from wilayah_rw WHERE id = '".$id."'");

        foreach ($query->result_array() as $row)
		{
	       return $row;
		}
	}

    public function updateRT($data, $id){
        $this->db->where("id", $id);
        $this->db->update("wilayah_rw", $data);
    }

    function hapus_data($id){
		$this->db->where('id', $id);
		$this->db->delete('wilayah_rw');
	}
}