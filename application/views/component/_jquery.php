<!-- All Jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>
<script src="<?= base_url('src') ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="<?= base_url('src') ?>/dist/js/feather.min.js"></script>
<script src="<?= base_url('src') ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url('src') ?>/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?= base_url('src') ?>/dist/js/custom.js"></script>
<script src="<?= base_url('src') ?>/dist/js/pages/dashboards/dashboard1.min.js"></script>

<script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/b-2.2.3/b-html5-2.2.3/datatables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Separate -->
<script>
    $(document).ready(function () {
        $('#multi_col_order').DataTable();
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
        $('#pengadaan_alat').datepicker({
            format: "dd/mm/yyyy",
            autoclose: true,
            todayBtn: "linked",
            todayHighlight: true
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

</body>

</html>