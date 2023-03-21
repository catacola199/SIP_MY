<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_JadwalTeknisi extends CI_Model
{
    private $_table = "jadwal_teknisi";

    public function getProdukperPermohonan()
    {
        $this->db->select('teknisi_nopermohonan.`no_permohonan`,teknisi_nopermohonan.`id_permohonan`,teknisi_nopermohonan.`pabrik_produk`, produk.`id_produk`, produk.`nama_produk`,produk.`tipe_produk`, produk.`jenis_produk`, teknisi_dokumen.`dokumen_bap`');
        $this->db->from('teknisi_nopermohonan');
        $this->db->join('produk', 'teknisi_nopermohonan.id_produk = produk.id_produk', 'left');
        $this->db->join('teknisi_dokumen', ' teknisi_nopermohonan.`id_permohonan`= teknisi_dokumen.`id_permohonan`', 'left');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getJadwal()
    {
        $this->db->select('id_permohonan,no_permohonan, kategori, nama_rs, pic_name,status');
        $this->db->from('teknisi_nopermohonan');
        $this->db->group_by('no_permohonan');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getJadwalperTeknisi()
    {
        $this->db->select('teknisi_nopermohonan.id_permohonan,teknisi_nopermohonan.no_permohonan, teknisi_nopermohonan.kategori, 
        teknisi_nopermohonan.nama_rs, teknisi_nopermohonan.pic_name,teknisi_nopermohonan.`status`, pengguna.`id_pengguna`, pengguna.`nama_pengguna`');
        $this->db->from('teknisi_nopermohonan');
        $this->db->join('teknisi_terjadwal', 'teknisi_nopermohonan.no_permohonan = teknisi_terjadwal.`no_permohonan`');
        $this->db->join('pengguna', 'teknisi_terjadwal.`id_pengguna` = pengguna.`id_pengguna`');
        $this->db->where('pengguna.id_pengguna', $this->session->userdata('id_pengguna'));
        $this->db->group_by('teknisi_nopermohonan.`no_permohonan`');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getDetails()
    {
        $this->db->select('teknisi_nopermohonan.`id_permohonan`,teknisi_nopermohonan.`no_permohonan`, teknisi_nopermohonan.`kategori`, teknisi_nopermohonan.`nama_rs`, teknisi_nopermohonan.`alamat_rs`,teknisi_dokumen.`tgl_dok`,teknisi_nopermohonan.`tgl_selesai`,
        teknisi_nopermohonan.`pic_name`, teknisi_nopermohonan.`pic_phone`, teknisi_nopermohonan.`status`, pengguna.`nama_pengguna`, teknisi_terjadwal.`nama_driver`,teknisi_nopermohonan.`tgl_dibuat`,teknisi_tertunda.`ket_tertunda`,teknisi_terjadwal.`tgl_uploadfile`,
        teknisi_terjadwal.`tgl_jadwal`, teknisi_terjadwal.`file_penawaran`, teknisi_selesai.`metode_bayar`, teknisi_selesai.`file_buktibayar`, teknisi_selesai.`keterangan`, teknisi_selesai.`file_invoice`,teknisi_tertunda.`tgl_tunda`,
        teknisi_dokumen.`dokumen_bap`');
        $this->db->from('teknisi_nopermohonan');
        $this->db->join('teknisi_terjadwal', 'teknisi_terjadwal.no_permohonan = teknisi_nopermohonan.no_permohonan', 'left');
        $this->db->join('teknisi_dokumen', 'teknisi_dokumen.no_permohonan = teknisi_nopermohonan.no_permohonan', 'left');
        $this->db->join('teknisi_tertunda', 'teknisi_tertunda.no_permohonan = teknisi_nopermohonan.no_permohonan', 'left');
        $this->db->join('pengguna', 'teknisi_terjadwal.id_pengguna = pengguna.id_pengguna', 'left');
        $this->db->join('teknisi_selesai', 'teknisi_selesai.no_permohonan = teknisi_nopermohonan.no_permohonan', 'left');
        $query = $this->db->get();
        return  $query->result();
    }

    public function getTeknisi()
    {
        // return $this->db->query("SELECT pengguna.`id_pengguna`,pengguna.`foto_pengguna`,pengguna.`nama_pengguna` FROM pengguna
        // WHERE pengguna.`id_role` = 4")->result();
        $this->db->select('id_pengguna,nama_pengguna,instansi_pengguna');
        $this->db->from('pengguna');
        $this->db->where('id_role', 4);
        $query = $this->db->get();
        return  $query->result_array();
    }

    public function simpandatajadtek($data)
    {
        $this->db->insert_batch('teknisi_nopermohonan', $data);
        return TRUE;
    }

    public function simpandatadokumen($data)
    {
        $this->db->insert_batch('teknisi_dokumen', $data);
        return TRUE;
    }

    public function simpandatatertunda($data)
    {
        $this->db->insert('teknisi_tertunda', $data);
        return TRUE;
    }

    public function simpandataterjadwal($data)
    {
        $this->db->insert('teknisi_terjadwal', $data);
        return TRUE;
    }
    public function simpandataupload($data)
    {
        $this->db->insert('teknisi_upload', $data);
        return TRUE;
    }
    public function simpandataselesai($data)
    {
        $this->db->insert('teknisi_selesai', $data);
        return TRUE;
    }

    // Terjadwal
    public function _uploadFileterjadwal()
    {
        $config = array();
        $config['upload_path']          = './upload/penawaran/';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadpenawaran');
        $this->uploadpenawaran->initialize($config);

        if ($this->uploadpenawaran->do_upload('file_penawaran')) {
            return $this->uploadpenawaran->data("file_name");
        }
        //  print_r($this->upload->display_errors());
        return null;
    }

    // Upload Dokumen 
    public function _uploadFileSuratTugas()
    {
        $config = array();
        $config['upload_path']          = './upload/surattugas/';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'uploadsurattugas');
        $this->uploadsurattugas->initialize($config);

        if ($this->uploadsurattugas->do_upload('file_st')) {
            return $this->uploadsurattugas->data("file_name");
        }
        //  print_r($this->upload->display_errors());
        return null;
    }

    // Upload Dokumen

    public function _uploadFileBap()
    {
        $config = array();
        $config['upload_path']          = './upload/dokumen_bap/';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('id_permohon[]');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'dokumenbap');
        $this->dokumenbap->initialize($config);

        $jumlah_berkas = count($_FILES['file_bap']['name']);
        for ($i = 0; $i < $jumlah_berkas; $i++) {
            if (!empty($_FILES['file_bap']['name'][$i])) {

                $_FILES['file']['name'] = $_FILES['file_bap']['name'][$i];
                $_FILES['file']['type'] = $_FILES['file_bap']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['file_bap']['tmp_name'][$i];
                $_FILES['file']['error'] = $_FILES['file_bap']['error'][$i];
                $_FILES['file']['size'] = $_FILES['file_bap']['size'][$i];

                if ($this->dokumenbap->do_upload('file')) {

                    $uploadData = $this->dokumenbap->data();
                    $data['id_permohonan'] = $this->input->post('id_permohonan')[$i];
                    $data['no_permohonan'] = $this->input->post('no_permohon')[$i];
                    $data['dokumen_bap'] = $uploadData['file_name'];
                    $this->db->insert('teknisi_dokumen', $data);
                }
            }
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }

    // Form Selesai

    public function _uploadFileBuktiBayar()
    {
        $config = array();
        $config['upload_path']          = './upload/bukti_bayar/';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'buktibayar');
        $this->buktibayar->initialize($config);

        if ($this->buktibayar->do_upload('file_buktibayar')) {
            return $this->buktibayar->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }

    public function _uploadFileInvoice()
    {
        $config = array();
        $config['upload_path']          = './upload/invoice/';
        $config['allowed_types']        = 'pdf|doc|docx';
        // $config['file_name']            = $this->input->post('nama_brosur');
        $config['encrypt_name']         = false;
        $config['overwrite']            = true;
        $config['max_size']             = 5094; // 1MB

        $this->load->library('upload', $config, 'invoice');
        $this->invoice->initialize($config);

        if ($this->invoice->do_upload('file_invoice')) {
            return $this->invoice->data("file_name");
        }
        // print_r($this->upload->display_errors());
        return "default.pdf";
    }


    public function getID($id)
    {
        return $this->db->get_where('teknisi_nopermohonan', ['id' => $id])->row();
    }

    public function getIdTerjadwal($id)
    {
        return $this->db->get_where('teknisi_terjadwal', ['no_permohonan' => $id])->row();
    }

    public function _deleteFilePenawaran($id)
    {
        $file = $this->getIdTerjadwal($id);
        if ($file->file_penawaran != "default.pdf") {
            $filename = explode(".", $file->file_penawaran)[0];
            return array_map('unlink', glob(FCPATH . "upload/penawaran/$filename.*"));
        }
    }

    public function del_all($id)
    {
        $this->db->delete('teknisi_nopermohonan', array("no_permohonan" => $id));
        $this->db->delete('teknisi_terjadwal', array("no_permohonan" => $id));
        $this->db->delete('teknisi_selesai', array("no_permohonan" => $id));
        return TRUE;
    }

    public function update_jadtek($data, $id)
    {
        $this->db->update('teknisi_nopermohonan', $data, $id);
        return TRUE;
    }

    public function verif_teknisi($data, $id)
    {
        return $this->db->update('teknisi_nopermohonan', $data, $id);
    }

    public function update_filePenawaran($data, $id)
    {
        $this->db->update('teknisi_terjadwal', $data, $id);
        return TRUE;
    }
}
