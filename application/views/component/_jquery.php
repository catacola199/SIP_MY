<!-- All Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="<?= base_url('src') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<script src="<?= base_url('src') ?>/dist/js/feather.min.js"></script>
<script src="<?= base_url('src') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('src') ?>/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->

<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
<script src="<?= base_url('src') ?>/dist/js/custom.js"></script>
<!-- <script src="<?= base_url('src') ?>/dist/js/pages/dashboards/dashboard1.min.js"></script> -->
<script src="<?= base_url('src') ?>/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url('src') ?>/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url('src') ?>/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url('src') ?>/assets/extra-libs/sparkline/sparkline.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script> -->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- selectpicker -->
<script src="https://unpkg.com/@jarstone/dselect/dist/js/dselect.js"></script>
<!-- ckedior -->
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script> -->
<script src="https://unpkg.com/simplebar@latest/dist/simplebar.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

<script>
    // ClassicEditor
    // .create( document.querySelector( '#editor' ) )
    // .catch( error => {
    //     console.error( error );
    // } );
    $(document).ready(function() {
        $('#multi_col_order').DataTable();
        $('table.display').DataTable();
        $('#produk').DataTable();
        $('#teknisi').DataTable();

        $('#tgl_lahir').datepicker({
            header: true,
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap5',
            showRightIcon: false
        });

        $('#tgl_jadwal').datepicker({
            header: true,
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap5',
            showRightIcon: false
        });
        $('#tgl_masuk').datepicker({
            header: true,
            format: "dd-mm-yyyy",
            uiLibrary: 'bootstrap5',
            showRightIcon: false
        });
        // $('textarea.form-control').summernote({
        //     tabsize: 3,
        //     height: 120,
        //     toolbar: [
        //     ['style', ['style']],
        //     ['font', ['bold', 'underline', 'clear']],
        //     ['color', ['color']],
        //     ['para', ['ul', 'ol', 'paragraph']],
        //     ['table', ['table']],
        //     ['insert', ['link']]
        //     ]
        // });

        $('#fullscreen').on('click', function() {
            document.getElementById('exit_fullscreen').style.removeProperty("display");
            document.getElementById('fullscreen').style.display = 'none';

        });
        $('#exit_fullscreen').on('click', function() {
            document.getElementById('fullscreen').style.removeProperty("display");
            document.getElementById('exit_fullscreen').style.display = 'none';
        });
        // new SimpleBar(document.getElementById('notif'));


        //Memanggil Alamat; Prov,Kab,Kec,Desa
        $.ajax({
            url: '<?= base_url('alamat/showProvinsi') ?>',
            dataType: "JSON",
            success: function(data) {
                var select = '';
                $.each(data, function(key, val) {
                    $("#provinsi").append("<option value='" + val.id + "' >" + val.name + "</option>");
                });
            }
        });

        function getKabupaten(id) {
            $("#kabupaten").empty();
            $("#kecamatan").empty();
            $("#desa").empty();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('alamat/get_kabupaten'); ?>',
                data: {
                    provinsi_id: id
                },
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, val) {
                        $("#kabupaten").append("<option value='" + val.id + "' >" + val.name + "</option>");
                    });
                }
            });
        }

        function getKecamatan(id) {
            $("#kabupaten").empty();
            $("#kecamatan").empty();
            $("#desa").empty();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('alamat/get_kecamatan'); ?>',
                data: {
                    kabupaten_id: id
                },
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, val) {
                        $("#kecamatan").append("<option value='" + val.id + "' >" + val.name + "</option>");
                    })
                }
            });
        }

        function getDesa(id) {
            $("#kabupaten").empty();
            $("#kecamatan").empty();
            $("#desa").empty();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('alamat/get_desa'); ?>',
                data: {
                    kecamatan_id: id
                },
                dataType: "JSON",
                success: function(data) {
                    $.each(data, function(key, val) {
                        $("#desa").append("<option value='" + val.id + "' >" + val.name + "</option>");
                    })
                }
            });
        }

        $('#provinsi').on('change', function(e) {
            e.preventDefault();
            var provinsiID = $(this).val();
            console.log(provinsiID);

            if (provinsiID != '') {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('alamat/get_kabupaten'); ?>',
                    data: {
                        provinsi_id: provinsiID
                    },
                    dataType: "JSON",
                    success: function(data) {
                        var select = '';
                        $("#kabupaten").empty();
                        $("#kecamatan").empty();
                        $("#desa").empty();
                        $.each(data, function(key, val) {
                            $("#kabupaten").append("<option value='" + val.id + "' >" + val.name + "</option>");
                        });
                    }
                });
            } else {
                console.log("jadi");
                $("#kabupaten").empty();
                $("#kecamatan").empty();
                $("#desa").empty();
            }
        });

        $('#kabupaten').on('change', function(e) {
            e.preventDefault();
            var kabupatenID = $(this).val();
            if (kabupatenID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('alamat/get_kecamatan'); ?>',
                    data: {
                        kabupaten_id: kabupatenID
                    },
                    dataType: "JSON",

                    success: function(data) {
                        var select = '';
                        $("#kecamatan").empty();
                        $("#desa").empty();
                        $.each(data, function(key, val) {
                            $("#kecamatan").append("<option value='" + val.id + "' >" + val.name + "</option>");
                        })
                    }
                });
            } else {
                $("#kecamatan").empty();
                $("#desa").empty();
            }
        });

        $('#kecamatan').on('change', function(e) {
            e.preventDefault();
            var kecamatanID = $(this).val();
            if (kecamatanID) {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('alamat/get_desa'); ?>',
                    data: {
                        kecamatan_id: kecamatanID
                    },
                    dataType: "JSON",

                    success: function(data) {
                        var select = '';
                        $("#desa").empty();
                        $.each(data, function(key, val) {
                            $("#desa").append("<option value='" + val.id + "' >" + val.name + "</option>");
                        })
                    }
                });
            } else {
                $("#desa").empty();
            }
        });
    });


    function deleteConfirm(url) {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "Anda yakin ingin menghapus data ini?",
            showCancelButton: true,
            confirmButtonColor: '#5f76e8',
            cancelButtonColor: '#fd5f7d',
            confirmButtonText: 'Ya, Hapus!'
        }).then(result => {
            if (result.isConfirmed) {
                swal.fire({
                    imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
                    title: "Menghapus Data",
                    text: "Mohon Tunggu",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                }).then((result) => {
                    window.location.href = url;
                });
            }
        });
    }

    function verifConfirm(url) {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "Anda yakin ingin mengubah data ini?",
            showCancelButton: true,
            confirmButtonColor: '#5f76e8',
            cancelButtonColor: '#fd5f7d',
            confirmButtonText: 'Ya, Ubah!'
        }).then(result => {
            if (result.isConfirmed) {
                swal.fire({
                    imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
                    title: "Mengubah Data",
                    text: "Mohon Tunggu",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                }).then((result) => {
                    window.location.href = url;
                });
            }
        });
    }

    function verifTeknisi(url) {
        Swal.fire({
            icon: 'warning',
            title: 'Peringatan',
            text: "Anda yakin sudah melaksanakan pekerjaan ini?",
            showCancelButton: true,
            confirmButtonColor: '#5f76e8',
            cancelButtonColor: '#fd5f7d',
            confirmButtonText: 'Sudah, Terlaksana!'
        }).then(result => {
            if (result.isConfirmed) {
                swal.fire({
                    imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
                    title: "Mengubah Data",
                    text: "Mohon Tunggu",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1000
                }).then((result) => {
                    window.location.href = url;
                });
            }
        });
    }

    function editConfirm(url) {
        $('#btn-edit').attr('href', url);
        $('#editModal').modal();
    }

    $("#refresh_tabel").click(function(e) {
        swal.fire({
            imageUrl: "<?= base_url('assets/loader_kecil.gif'); ?>",
            title: "Refresh Data",
            text: "Mohon Tunggu",
            showConfirmButton: false,
            allowOutsideClick: false,
            timer: 1000
        }).then((result) => {
            window.location.reload();
        });
    });

    $(function() {
        $('.input-group.date').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayBtn: "linked",
            todayHighlight: true
        });
    });

    function checkPasswordMatch() {
        var password = $("#password_pengguna_baru").val();
        var confirmPassword = $("#password_pengguna_konfirm").val();
        var element = document.getElementById("password_pengguna_konfirm");

        if (password != confirmPassword)
            element.className += "border border-danger";
        else
            element.className += "border border-success";
    }

    var MAX_FILE_SIZE = 5 * 1024 * 1024; // 5MB

    $(document).ready(function() {
        $("#password_pengguna_konfirm").keyup(checkPasswordMatch);
        $('#image').change(function() {
            fileSize = this.files[0].size;
            if (fileSize > MAX_FILE_SIZE) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Ukuran file tidak lebih dari 5 MB!",
                    confirmButtonColor: '#5f76e8',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                }).then((result) => {
                    document.getElementById("image").value = '';
                });
                // this.setCustomValidity("File must not exceed 5 MB!");
                // this.reportValidity();
            } else {
                this.setCustomValidity("");
            }
        });
        $('#thumb_brosur').change(function() {
            fileSize = this.files[0].size;
            if (fileSize > MAX_FILE_SIZE) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Ukuran file tidak lebih dari 5 MB!",
                    confirmButtonColor: '#5f76e8',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                }).then((result) => {
                    document.getElementById("thumb_brosur").value = '';
                });
                // this.setCustomValidity("File must not exceed 5 MB!");
                // this.reportValidity();
            } else {
                this.setCustomValidity("");
            }
        });
        $('#file_brosur').change(function() {
            fileSize = this.files[0].size;
            if (fileSize > MAX_FILE_SIZE) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: "Ukuran file tidak lebih dari 5 MB!",
                    confirmButtonColor: '#5f76e8',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 2000
                }).then((result) => {
                    document.getElementById("file_brosur").value = '';
                });
                // this.setCustomValidity("File must not exceed 5 MB!");
                // this.reportValidity();
            } else {
                this.setCustomValidity("");
            }
        });
    });
</script>

<?php if ($this->session->flashdata('notif')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: "<?php echo $this->session->flashdata('notif'); ?>",
            confirmButtonColor: '#5f76e8'
        });
    </script>
<?php endif ?>
<?php if ($this->session->flashdata('error')) : ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: "<?php echo $this->session->flashdata('error'); ?>",
            confirmButtonColor: '#5f76e8'
        });
    </script>
<?php endif ?>
</body>

</html>