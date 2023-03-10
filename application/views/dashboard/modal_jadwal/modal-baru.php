<div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Permohonan</h1>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <form action="<?php echo base_url('Jadwal_Teknisi/save_jadtek') ?>" method="post" autocomplete="off" enctype="multipart/form-data" class="pl-3 pr-3">
                            <div class="form-group">
                                <div class="form-floating">
                                    <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?php $no_permohonan = "SIP-J" . date("dmY") . substr(md5(time()), 0, 5);
                                                                                                        echo $no_permohonan; ?>">
                                    <input type="text" class="form-control" id="kode" placeholder="No Permohonan" value="<?php $no_permohonan = "SIP-J" . date("dmY") . substr(md5(time()), 0, 5);
                                                                                                                            echo $no_permohonan; ?>" disabled>
                                    <label for="No">No Permohonan</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-floating">
                                    <select class="form-select" id="kategori_jadwal" name="kategori_jadwal" aria-label=".." required>
                                        <option disabled value="" selected>Pilih salah satu...</option>
                                        <option value="instalasi">Instalasi</option>
                                        <option value="kalibrasi">Kalibrasi</option>
                                        <option value="pemeliharaan">Pemeliharaan</option>
                                        <option value="service">Service</option>
                                        <option value="service">Setting Ukes</option>
                                        <option value="service">Presentasi</option>
                                        <option value="service">Pre-Instal</option>
                                    </select>
                                    <label for="kategori_jadwal">Kategori</label>
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
                                                            <?php echo $l['jenis_produk'] . " - " . $l['nama_produk'] . " - " . $l['tipe_produk']; ?>
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                                <label for="id_produk_baru[]">Produk</label>
                                            </div>
                                        </td>
                                        <td class="col-5 col-sm-5 col-lg-5 col-md-5">
                                            <div class="form-floating">
                                                <input type="text" name="pabrik[]" id="pabrik[]" placeholder="Pabrik" class="form-control" autocomplete="off" required />
                                                <label for="pabrik[]">Pabrik</label>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" name="add" id="add" class="btn btn-success "><i class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>