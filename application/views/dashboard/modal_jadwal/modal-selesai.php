<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="selesai-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Selesai </h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('Jadwal_Teknisi/update_selesai') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
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
                                <select id="pembayaran" name="pembayaran" class="form-control" required>
                                    <option disabled value="" selected>Pilih salah satu...</option>
                                    <option value="Garansi">Garansi</option>
                                    <option value="Tidak Garansi">Tidak Garansi</option>
                                </select>
                                <label for="pembayaran">Pilihan Pembayaran</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <select id="status" name="status" class="form-control" required>
                                    <option disabled selected>Pilih salah satu...</option>
                                    <option value="SELESAI">Selesai</option>
                                    <option value="TIDAK SELESAI">Tidak Selesai</option>
                                </select>
                                <label for="status">Status</label>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Tulis disini" id="keterangan" name="keterangan" autocomplete="off"></textarea>
                                <label for="keterangan">Keterangan</label>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Selesai</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>