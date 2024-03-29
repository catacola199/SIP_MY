<?php foreach ($jadwal_tek as $data) : ?>
    <form action="<?php echo base_url('Jadwal_Teknisi/update_terjadwal') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3" autocomplete="off">
        <div class="modal fade" id="jadwal-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Bikin Jadwal </h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                        <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                        <label for="No">No Permohonan</label>
                                    </div>
                                </div>
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
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                                    <button type="submit" class="btn btn-success" data-bs-target="#Jadwal2" data-bs-toggle="modal"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="Jadwal2" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Hide this modal and show the first with the button below.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
    </form>
<?php endforeach; ?>