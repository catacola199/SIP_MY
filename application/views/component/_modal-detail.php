<!-- Modal Detail -->
<?php foreach ($jadwal_tek as $data) : ?>
    <div class="modal fade" id="detail-<?= $data->id_permohonan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->no_permohonan ?></label>
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
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-warning text-white"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TERLAKSANA') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-secondary text-white"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TIDAK SELESAI') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-danger text-white"><?php echo $data->status ?></p>
                                    <?php elseif ($data->status == 'TERUNGGAH') : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-dark text-white"><?php echo $data->status ?></p>
                                    <?php else : ?>
                                        <p class="ml-2 col-sm-4 col-form-label spstatus bg-success text-white"><?php echo $data->status ?></p>
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
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Penawaran</label>
                                    <?php if ($data->file_penawaran == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->file_buktibayar ?></label>

                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Invoice</label>
                                    <?php if ($data->file_invoice == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black">
                                            <a target="_blank" href="<?php echo site_url('Jadwal_Teknisi/viewInvoice/' . $data->no_permohonan) ?>"><?= $data->file_invoice ?></a>
                                        </label>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black">
                                            <a href="#!" data-bs-toggle="modal" data-bs-target="#invoice-<?= $data->id_permohonan ?>"><?= $data->file_invoice ?></a>
                                        </label>
                                    <?php endif; ?>
                                </div>
                                <div class="mb-1 row">
                                    <label class="col-sm-4 col-md-5 col-lg-4 col-form-label">Bukti Pembayaran</label>
                                    <?php if ($data->file_buktibayar == null) : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black"> -</label>
                                    <?php else : ?>
                                        <label class="col-sm-8 col-md-7 col-lg-8 col-form-label text-black text-capitalize"><?= $data->file_buktibayar ?></label>

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
                                            <th>No Permohonan</th>
                                            <th>Nama Produk</th>
                                            <th>Tipe Produk</th>
                                            <th>Jenis Produk</th>
                                            <th>Lampiran</th>
                                            <?php if (($this->fungsi->user_login()->id_role) != 4) : ?>
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
                                                    <td class="text-capitalize"><?php echo $produk->no_permohonan ?></td>
                                                    <td class="text-capitalize"><?php echo $produk->nama_produk ?></td>
                                                    <td class="text-capitalize"><?php echo $produk->tipe_produk ?></td>
                                                    <td class="text-capitalize"><?php echo $produk->jenis_produk ?></td>
                                                    <td><a class="btn btn-sm btn-outline-primary" href="<?php echo base_url('upload/penawaran/' . $data->file_penawaran) ?>" target="_blank"> D </a></td>
                                                    <?php if (($this->fungsi->user_login()->id_role) != 4) : ?>
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
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="invoice-<?= $data->id_permohonan ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="btn-close float-end" data-bs-toggle="modal" href="#detail-<?= $data->id_permohonan ?>" aria-label="Close"></button>
                    <p><?= $data->file_invoice ?></p>
                    <div class="row">
                        <embed type="application/pdf" src="<?= base_url('upload/invoice/' . $data->file_invoice) ?>" height="550"></embed>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<!-- Modal Detail End -->