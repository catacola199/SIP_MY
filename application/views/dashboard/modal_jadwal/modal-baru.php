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
                        <div class="col pl-4 pr-4">
                            <div class="form-group">
                                <label for="no_permohonan" class="form-label">Nomor Permohonan</label>
                                <div class="container ml-0">
                                    <div class="row">
                                        <div class="col-md-1 col-sm-2 p-0">
                                            <input type="text" readonly class="form-control-plaintext" name="no_permohonan_a" id="no_permohonan_a" value="NO.">
                                        </div>                                   
                                        <div class="col-md-3 col-sm-4 p-0"  style="margin-left: 2px">
                                            <input type="text" class="form-control" name="no_permohonan_b" id="no_permohonan_b" placeholder="xxx" required>
                                        </div>
                                        <div class="col-md-4 col-sm-6 p-0" style="margin-left: 2px">
                                            <input type="text" readonly class="form-control-plaintext" name="no_permohonan_c" id="no_permohonan_c" value="/SRV/SIP/<?= date("m")?>/<?= date("Y")?>">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kategori_jadwal">Kategori</label>
                                <div class="form-floating">
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Instalasi"> Instalasi
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Service"> Service
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Survey"> Survey
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Training"> Training
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Setting Ukes"> Setting Ukes
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Presentasi"> Presentasi
                                    <input type="checkbox" name="check_list[]" alt="Checkbox" value="Pre-Instal"> Pre-Instal
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
                                            <input type="number" class="form-control" name="pic_phone" id="pic_phone" placeholder="PIC Phone" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;" required>
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
                    <button class="btn btn-success" data-bs-target="#Jadwal2" data-bs-toggle="modal"><i class="fa fa-arrow-right"></i> Lanjut</button>
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
                                <div class="form-floating">
                                    <input type="text" class="form-control form-control-user" name="nama_driver" id="nama_driver" placeholder="Nama Driver" autocomplete="off" required>
                                    <label for="nama_driver">Nama Driver</label>
                                </div>
                            </div>
                            <div class="input-group date" id="pengadaan_alat">
                                <div class="form-floating">
                                    <input type="text" class="form-control" name="tgl_jadwal" id="tgl_jadwal" placeholder="Pilih Tanggal" autocomplete="off" required />
                                    <label for="tgl_jadwal">Tanggal Jadwal </label>
                                </div>
                                <span class="input-group-append">
                                    <span class="input-group-text bg-light">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </span>
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
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END MODAL BIKIN JADWAL-->
</form>