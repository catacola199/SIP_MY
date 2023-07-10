<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="uploadtek-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Upload Dokumen User </h1>
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
                        <div class="form-group">
                            <label for="surat_tugas">Kuisioner (Opsional)</label>
                            <input type="file" class="form-control form-control-file" name="file_kuisioner" id="file_kuisioner" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="surat_tugas">Surat Jalan (Opsional)</label>
                            <input type="file" class="form-control form-control-file" name="file_sj" id="file_sj" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="upload">Upload BAP</label>
                            <div class="table-responsive" name="upload">
                                <table class="table table-borderless">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Upload</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($jadwal_produk as $produk) : ?>
                                            <?php if ($produk->no_permohonan == $data->no_permohonan) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td class="col-4"><label for="file_bap[]"><?php echo $produk->nama_produk ?></label></td>
                                                    <td class="col-auto">
                                                        <input type="hidden" name="no_permohon[]" id="no_permohon[]" value="<?= $produk->no_permohonan ?>" required>
                                                        <input type="hidden" name="id_permohonan[]" id="id_permohonan[]" value="<?= $produk->id_permohonan ?>" required>
                                                        <input type="file" class="form-control form-control-file" name="file_bap[]" id="file_bap[]" accept=".pdf" required>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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

<!-- UPDATE FILE UPLOAD -->
<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="updatek-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Upload Dokumen User </h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form action="<?php echo base_url('Jadwal_Teknisi/update_file_tek') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                        <!-- <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>"> -->
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="hidden" name="no_permohonan" id="no_permohonan" value="<?= $data->no_permohonan ?>">
                                <input type="text" class="form-control" id="no_permohonan" placeholder="No Permohonan" value="<?= $data->no_permohonan ?>" disabled>
                                <label for="No">No Permohonan</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="surat_tugas">Kuisioner</label>
                            <input type="file" class="form-control form-control-file" name="file_kuisioner" id="file_kuisioner" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="surat_tugas">Surat Jalan</label>
                            <input type="file" class="form-control form-control-file" name="file_sj" id="file_sj" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <label for="upload">Upload BAP</label>
                            <div class="table-responsive" name="upload">
                                <table class="table table-borderless">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Produk</th>
                                            <th>Upload</th>
                                            <th>Upload</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($jadwal_produk as $produk) : ?>
                                            <?php if ($produk->no_permohonan == $data->no_permohonan) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td class="col-4"><label for="file_bap[]"><?php echo $produk->nama_produk ?></label></td>
                                                    <td class="col-auto">
                                                        <input type="hidden" name="id_dokumen[]" id="id_dokumen[]" value="<?= $produk->id_dokumen ?>" required>
                                                        <input type="hidden" name="no_permohon[]" id="no_permohon[]" value="<?= $produk->no_permohonan ?>" required>
                                                        <input type="hidden" name="id_permohonan[]" id="id_permohonan[]" value="<?= $produk->id_permohonan ?>" required>
                                                        <input type="file" class="form-control form-control-file" name="file_bap[]" id="file_bap[]" accept=".pdf">
                                                    </td>
                                                    <td class="col-4"><label for="file_bap[]"><?php echo $produk->id_dokumen ?></label></td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
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