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
                        <section id="basic-horizontal-layouts">
                            <form action="<?php echo base_url('Jadwal_Teknisi/update_selesai') ?>" method="post" enctype="multipart/form-data" class="pl-3 pr-3">
                                <input type="text" hidden name="id_permohonan" id="id_permohonan" value="<?= $data->id_permohonan ?>">
                                <div class="row match-height">
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6 col-12">
                                            <div class="card text-center text-black">
                                                <h4><?= $data->no_permohonan ?> </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Jadwal -->
                                    <section id="multiple-column-form">
                                        <div class="row match-height">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">Detail</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="card-body">
                                                            <form class="form">
                                                                <div class="row">
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label>Jenis Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->jenis_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Nama Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->nama_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Tipe Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->tipe_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Pabrik</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->pabrik_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Status</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->status ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 col-12">
                                                                        <div class="row">
                                                                            <div class="col-md-4">
                                                                                <label>Jenis Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->jenis_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Nama Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->nama_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Tipe Produk</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->tipe_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Pabrik</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->pabrik_produk ?></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <label>Status</label>
                                                                            </div>
                                                                            <div class="col-md-8 form-group">
                                                                                <label>: <?= $data->status ?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Detail Jadwal End -->

                                    <!-- Detail Produk -->
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center"><?= $data->jenis_produk ?></h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Jenis Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->jenis_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->nama_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tipe Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->tipe_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Pabrik</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->pabrik_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Status</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->status ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4 class="card-title text-center"><?= $data->jenis_produk ?></h4>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <form class="form form-horizontal">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label>Jenis Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->jenis_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Nama Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->nama_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Tipe Produk</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->tipe_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Pabrik</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->pabrik_produk ?></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label>Status</label>
                                                                </div>
                                                                <div class="col-md-8 form-group">
                                                                    <label>: <?= $data->status ?></label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Produk End -->
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- Modal Detail End -->