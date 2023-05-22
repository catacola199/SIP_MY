<!-- Modal Detail -->
<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="detail-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Jadwal </h1>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-3 justify-content-md-center">
                        <div class="col">
                            <h3 class="text-center text-black"><?= $data->no_permohonan ?></h3>
                        </div>
                    </div>
                    <hr class="border border-secondary border-1 opacity-50">
                    <div class="card border-primary shadow-sm">
                        <div class="card-header">
                            Detail Permohonan
                        </div>
                        <div class="card-body row">
                            <div class="col-sm-12 col-md-10 col-lg-6">
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">No Permohonan</label>
                                    <?php if ($data->no_permohonan == null) : ?>
                                        <label class="col-sm-8  col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize" title="<?= $data->tgl_dibuat ?>"><?= $data->no_permohonan ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Kategori</label>
                                    <?php if ($data->kategori == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->kategori ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Rumah Sakit</label>
                                    <?php if ($data->nama_rs == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->nama_rs ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Alamat Rumah Sakit</label>
                                    <?php if ($data->alamat_rs == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->alamat_rs ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Nama PIC</label>
                                    <?php if ($data->pic_name == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->pic_name ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Phone PIC</label>
                                    <?php if ($data->pic_phone == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->pic_phone ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Status</label>
                                    <?php if ($data->status == 'BARU') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-info text-white"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TERJADWAL') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-yellow text-dark"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TERTUNDA') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-warning text-white" title="<?= $data->tgl_tunda ?>"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TERLAKSANA') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-dark text-white"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TIDAK SELESAI') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-danger text-white" title="<?= $data->tgl_selesai ?>"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TERUNGGAH') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-primary text-white"><?php echo $data->status ?></p>
                                    <?php else : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-success text-white" title="<?= $data->tgl_selesai ?>"><?php echo $data->status ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-10 col-lg-6">
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Teknisi</label>
                                    <?php if ($data->nama_pengguna == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->nama_pengguna ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Nama Driver</label>
                                    <?php if ($data->nama_driver == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->nama_driver ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Tanggal Jadwal</label>
                                    <?php if ($data->tgl_jadwal == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->tgl_jadwal ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Surat Tugas</label>
                                    <?php if ($data->file_st == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black">
                                            <a href="#!" data-bs-toggle="modal" data-bs-target="#inovice-<?= $data->id_permohonan ?>" ><?= $data->file_st ?></a>
                                        </label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Penawaran</label>
                                    <?php if ($data->file_penawaran == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black">
                                            <a href="#!" data-bs-toggle="modal" data-bs-target="#penawaran-<?= $data->id_permohonan ?>" title="<?= $data->tgl_uploadfile ?>"><?= $data->file_penawaran ?></a>
                                        </label>
                                    <?php endif; ?>
                                </div>

                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Metode Pembayaran</label>
                                    <?php if ($data->metode_bayar == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->metode_bayar ?></label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Keterangan</label>
                                    <?php if ($data->keterangan == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-form-label text-black text-capitalize"><?= $data->keterangan ?></label>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-primary  mb-3">
                        <div class="card-header">Produk</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Alat</th>
                                            <th>Merk & Tipe</th>
                                            <th>Spare Alat</th>
                                            <th>Lampiran</th>
                                            <?php if ((($this->fungsi->user_login()->id_role) != 4) && ($data->status == 'BARU')) : ?>
                                                <th>Action</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($jadwal_produk as $produk) : ?>
                                            <?php if ($produk->no_permohonan == $data->no_permohonan) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>

                                                    <td class="text-capitalize"><?php echo $produk->nama_produk ?></td>
                                                    <td class="text-capitalize"><?php echo $produk->merk_produk . " - " . $produk->tipe_produk ?></td>
                                                    <td class="text-capitalize"><?php echo $produk->pabrik_produk ?></td>
                                                    <td>
                                                        <?php if ($produk->dokumen_bap != null) : ?>
                                                            <a class="btn btn-primary" href="<?php echo base_url('upload/dokumen_bap/' . $produk->dokumen_bap) ?>" target="_blank"> Lihat Lampiran </a>
                                                        <?php else : ?>
                                                            <a class="btn btn-primary disabled" href="#!" target="_blank"> Lihat Lampiran </a>
                                                        <?php endif; ?>
                                                    </td>
                                                    <?php if ((($this->fungsi->user_login()->id_role) != 4) && ($data->status == 'BARU')) : ?>
                                                        <td>
                                                            <a onclick="deleteConfirm('<?php echo site_url('Jadwal_Teknisi/delete_jadtek/' . $produk->id_produk) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                                <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                            </a>
                                                        </td>
                                                    <?php endif; ?>
                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card border-primary  mb-3">
                        <div class="card-header">Tertunda</div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>#</th>
                                            <th>Nama Alat</th>
                                            <th>Lampiran BAP Tertunda</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($jadwal_produk as $produk) : ?>
                                            <?php if ($produk->no_permohonan == $data->no_permohonan) : ?>
                                                <tr>
                                                    <td><?= $i++ ?></td>
                                                    <td class="text-capitalize"><?php echo $produk->nama_produk ?></td>
                                                    <td class="text-capitalize">
                                                        <?php if ($data->ket_tertunda != null) : ?>
                                                            <?php echo $data->ket_tertunda ?>
                                                        <?php else : ?>
                                                            -
                                                        <?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <?php foreach ($bap_tertunda as $bap) : ?>
                                                            <?php if ($produk->id_permohonan == $bap->id_permohonan) : ?>
                                                                <a class="btn btn-primary" href="<?php echo base_url('upload/tertunda/' . $bap->file_bap) ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="<?= date('d F Y', strtotime($bap->tanggal)); ?>"><?= $bap->status_tertunda ?></a>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </td>

                                                </tr>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inovice-<?= $data->id_permohonan ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-toggle="modal" href="#detail-<?= $data->id_permohonan ?>" aria-label="Close"></button>
                    <p><?= $data->file_invoice ?></p>
                    <div class="row">
                        <embed type="application/pdf" src="<?= base_url('upload/invoice/' . $data->file_invoice) ?>" height="530"></embed>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="bayar-<?= $data->id_permohonan ?>" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" ria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-toggle="modal" href="#detail-<?= $data->id_permohonan ?>" aria-label="Close"></button>
                    <p><?= $data->file_buktibayar ?></p>
                    <div class="row">
                        <embed type="application/pdf" src="<?= base_url('upload/bukti_bayar/' . $data->file_buktibayar) ?>" height="530"></embed>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="penawaran-<?= $data->id_permohonan ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-toggle="modal" href="#detail-<?= $data->id_permohonan ?>" aria-label="Close"></button>
                    <p><?= $data->file_penawaran ?></p>
                    <div class="row">
                        <embed type="application/pdf" src="<?= base_url('upload/penawaran/' . $data->file_penawaran) ?>" height="530"></embed>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Detail End -->