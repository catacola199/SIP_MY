<form action="<?php echo base_url('Jadwal_Teknisi/save_jadtek') ?>" method="post" autocomplete="off" enctype="multipart/form-data">
    <!--MODAL BIKIN BARU-->
    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Permohonan</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <?php
                        function numbertoroman($number)
                        {
                            $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
                            $returnValue = '';
                            while ($number > 0) {
                                foreach ($map as $roman => $int) {
                                    if ($number >= $int) {
                                        $number -= $int;
                                        $returnValue .= $roman;
                                        break;
                                    }
                                }
                            }
                            return $returnValue;
                        }
                        ?>
                        <div class="col pl-4 pr-4">
                            <label for="no_permohonan_b" class="form-label">Nomor Permohonan</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-white border border-0 p-0 mr-2">NO.</span>
                                <input type="hidden" name="no_permohonan_a" id="no_permohonan_a" value="NO.">
                                <input type="text" class="form-control rounded-2 border-opacity-10" name="no_permohonan_b" id="no_permohonan_b" placeholder="xxxx" required style="max-width:fit-content">
                                <input type="hidden" name="no_permohonan_c" id="no_permohonan_c" value="/SRV/SIP/<?= numbertoroman(date("m")) ?>/<?= date("Y") ?>">
                                <span class="input-group-text bg-white border border-0">/ST/SIP/<?= numbertoroman(date("m")) ?>/<?= date("Y") ?></span>
                            </div>
                            <div class="form-group ml-1">
                                <label for="kategori_jadwal">Kategori</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Instalasi">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Instalasi">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Service">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Service">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Survey">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Survey">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Training">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Training">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Cek Alat">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Cek Alat">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="QC Alat">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" QC Alat">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Bongkar Pasang alat & Timah">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Bongkar Pasang alat & Timah">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Setting Ukes">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Setting Ukes">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Presentasi">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Presentasi">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Pre-Install">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Preinstall">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Kirim Alat">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Kirim Alat">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Setting Kalibrasi">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Setting Kalibrasi">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-text rounded-2">
                                                <input type="checkbox" name="check_list[]" alt="Checkbox" value="Bongkar Alat & Timah">
                                            </div>
                                            <input type="text" readonly class="form-control-plaintext" value=" Bongkar Alat & Timah">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="nama_rs" id="nama_rs" placeholder="Nama Rumah Sakit" required>
                                    <label for="nama_rs">Nama Rumah Sakit</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" name="alamat_rs" placeholder="Alamat Rumah Sakit" id="alamat_rs" style="height: 100px" required></textarea>
                                    <label for="alamat_rs">Alamat Rumah Sakit</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="pic_name" id="pic_name" placeholder="PIC Name" required>
                                            <label for="pic_name">Nama PIC </label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="pic_phone" id="pic_phone" placeholder="PIC Phone" maxlength="13" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                                            <label for="pic_phone"> Phone PIC </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <table class="table-borderless col-md-12" id="dynamic_field">
                                    <tr>
                                        <td class="col-6 col-sm-6 col-lg-6 col-md-6">
                                            <div class="form-floating">
                                                <select class="form-select" id="id_produk_baru[]" name="id_produk_baru[]" aria-label="Floating label select example" required>
                                                    <option disabled value="" selected>Pilih salah satu...</option>
                                                    <?php foreach ($produk as $l) { ?>
                                                        <option value="<?php echo $l['id_produk']; ?>">
                                                            <?php echo $l['merk_produk'] . " - " . $l['nama_produk'] . " - " . $l['tipe_produk']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <label for="id_produk_baru[]">Produk</label>
                                            </div>
                                        </td>
                                        <td class="col-5 col-sm-5 col-lg-5 col-md-5">
                                            <div class="form-floating">
                                                <input type="text" name="pabrik[]" id="pabrik[]" placeholder="Spare Part" class="form-control" autocomplete="off" required />
                                                <label for="Spare Part[]">Spare Part</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success "><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button class="btn btn-success" data-bs-target="#Jadwal2" data-bs-toggle="modal"><i class="fa fa-arrow-right"></i> Selanjutnya</button>
                </div>
            </div>
        </div>
    </div>
    <!--END MODAL BIKIN BARU-->

    <!--MODAL BIKIN JADWAL-->
    <div class="modal fade" id="Jadwal2" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Bikin Jadwal </h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col pl-4 pr-4">
                            <div class="form-group">
                                <div class="form-floating">
                                    <select class="form-select" id="id_pengguna" name="id_pengguna" aria-label="Floating label select example" required>
                                        <option disabled value="" selected>Pilih salah satu...</option>
                                        <?php foreach ($teknisi as $l) { ?>
                                            <option value="<?php echo $l['id_pengguna']; ?>"><?php echo $l['nama_pengguna'] . " - " . $l['instansi_pengguna']; ?> </option>
                                        <?php } ?>
                                    </select>
                                    <label for="nama_teknisi">Nama Teknisi</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="surat_tugas">Surat Tugas</label>
                                <input type="file" class="form-control form-control-file" name="file_st" id="file_st" accept=".pdf">
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="nama_driver" id="nama_driver" placeholder="Nama Driver" autocomplete="off" required>
                                    <label for="nama_driver">Nama Driver</label>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user uang" name="insentif" id="insentif" placeholder="Insentif" autocomplete="off" required>
                                    <label for="nama_driver">Insentif</label>
                                </div>
                            </div>

                            <div class="form-group ">
                                <label for="ttl" class="form-label">Tanggal Jadwal</label>
                                <input type="text" class="form-control date-id" id="tgl_jadwal" name="tgl_jadwal" placeholder="01-01-2001" required maxlength="10">
                            </div>

                            <div class="form-group mt-1">
                                <label for="file_penawaran">File Penawaran</label>
                                <input type="file" class="form-control form-control-file" name="file_penawaran" id="file_penawaran" accept=".pdf">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button class="btn btn-primary" data-bs-target="#tambah" data-bs-toggle="modal"><i class="fa fa-arrow-left"></i> Sebelumnya</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL BIKIN JADWAL-->
</form>