<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="edit-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Edit Jadwal Teknisi</h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('Jadwal_Teknisi/update_baru') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3" autocomplete="off">
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
                                <select class="form-select" data-live-search="true" id="id_produk" name="id_produk" aria-label="Floating label select example" required>
                                    <option disabled value="" selected>Pilih salah satu...</option>
                                    <?php foreach ($produk as $p) { ?>
                                        <?php if ($p['id_produk'] == $data->id_produk) : ?>
                                            <option value="<?php echo $p['id_produk']; ?>">
                                                <?php echo $p['jenis_produk'] . " - " . $p['nama_produk'] . " - " . $p['tipe_produk']; ?>
                                            </option>
                                        <?php else : ?>
                                            <option value="<?php echo $p['id_produk']; ?>">
                                                <?php echo $p['jenis_produk'] . " - " . $p['nama_produk'] . " - " . $p['tipe_produk']; ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php } ?>
                                </select>
                                <label for="id_produk">Jenis, Nama dan Tipe Produk</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="text" class="form-control form-control-user" name="pabrik_produk" id="pabrik_produk" placeholder="Pabrik" required>
                                <label for="pabrik_produk">Pabrik</label>
                            </div>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>