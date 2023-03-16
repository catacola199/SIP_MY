<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="tunda-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tertunda</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <form action="<?php echo base_url('Jadwal_Teknisi/update_jadwal') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3" autocomplete="off">
                                <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                                <div class="form-group">
                                    <div class="form-floating">
                                        <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                        <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                        <label for="No">No Permohonan</label>
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
<?php endforeach; ?>