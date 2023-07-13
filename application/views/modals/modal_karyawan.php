

<div id="add_karyawan" class="modal fade" tabindex="-1" data-bs-backdrop="static" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah Produk
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                <form id="formKaryawan" autocomplete="off">
                <div class="row mb-1">
                    <div class="col-lg-4 col-md-12">
                        <div class="row d-flex justify-content-center sticky-top">
                            <div class="card p-0" style="max-width: 20rem">
                                <img src="" class="card-img-top" id="photo_karyawan" alt="">
                                <div class="card-body p-3">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Photo</label>
                                        <input class="form-control" type="file" id="formFile" name="formFile">
                                    </div>
                                </div>                           
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="mb-3">
                            <label for="nip" class="form-label">Nomor Induk Pegawai</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="123123XXX" required>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                            <input type="text" class="form-control" id="nik" name="nik" placeholder="3325XXXXXXXXXXXX" required maxlength="16">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama" autocomplete="new-password" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" autocomplete="new-password" required>
                        </div>
                        <div class="">
                            <label for="ttl" class="form-label">Tempat dan Tanggal Lahir</label>
                            <div class="row" id="ttl">
                                <div class="col">
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control date-id" id="tgl_lahir" name="tgl_lahir" placeholder="01-01-2001" required maxlength="10">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="goldar" class="form-label">Golongan Darah</label>
                            <select class="form-select pilihan" id="goldar" name="goldar" required data-placeholder="Golongan Darah">
                                <option></option>
                                <option value="A">A</option>
                                <option value="O">O</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="-">Tidak Tahu</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Karyawan</label>
                            <div class="row g-3" id="alamat">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="form-select pilihan" id="provinsi" name="provinsi" required data-placeholder="Pilih Provinsi">
                                        <option value="">Provinsi</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="form-select pilihan" id="kabupaten" name="kabupaten" required data-placeholder="Pilih Kabupaten">
                                        <option value="">Kabupaten</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="form-select pilihan" id="kecamatan" name="kecamatan" required data-placeholder="Pilih Kecamatan">
                                        <option value="">Kecamatan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select class="form-select pilihan" id="desa" name="desa" required data-placeholder="Pilih Desa">
                                        <option value="">Desa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_lengkap" class="form-label">Alamat lengkap</label>
                            <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" autocomplete="new-password" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="text" class="form-control date-id" id="tgl_masuk" name="tgl_masuk" placeholder="01-01-2022" required maxlength="10">
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Level Karyawan</label>
                            <select class="form-select pilihan" id="role" name="role" required data-placeholder="Level Karyawan">
                                <option></option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->