<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="upload-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Upload Dokumen </h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('Jadwal_Teknisi/update_uploadDoc') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                        <!-- <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>"> -->
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                <label for="No">No Permohonan</label>
                            </div>
                        </div>
                        <input type="hidden" name="file_penawaran_old" id="file_penawaran_old" value="<?= $data->file_penawaran ?>">
                        <div class="form-group">
                            <label for="file_penawaran">File Penawaran</label>
                            <input type="file" class="form-control form-control-file" name="file_penawaran" id="file_penawaran" accept=".pdf">
                        </div>                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>