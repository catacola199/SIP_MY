<script>
$("#formFile").change(function() {
    var file = this.files[0];
    if (file && file.type.match(/^image\//)) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $("#photo_karyawan").attr("src", e.target.result);
    }
    reader.readAsDataURL(file);
    }
});
var user = $('#tbl_user').DataTable({
    "ajax": "<?php echo base_url('Karyawan/getUser')?>",
    "columns": [
        {   
            "data": null,
            "className": "text-center align-middle",
            "render": function (data, type, row, meta) {
                return meta.row + 1;
            }
        },
        {   "data": "user_image",
            "className": "text-center",
            "render": function (data, type, row, meta) {
                var options = '<img src="<?= base_url('upload')?>'+data+'" class="rounded mx-auto d-block" width="80" height="80" style="object-fit:cover"  alt="">';
                return options;
            }
        },
        {   "data": "karyawan_nama",
            "className": "align-middle"
        },
        {   "data": "karyawan_npwp",
            "className": "align-middle"
        },
        {   "data": "karyawan_email",
            "className": "align-middle"
        },
        {   "data": "user_isactive",
            "className": "text-center align-middle",
            "render": function (data, type, row, meta) {
                var options = "";
                if (data == 1){
                    options += '<span class="badge text-bg-success">Active</span>';
                }else{
                    options += '<span class="badge text-bg-danger">Not Active</span>';
                } 
                return options;
            }
        },
        { 
            "data": null,
            "className": "text-center align-middle",
            "render": function (data, type, row, meta) {
                var options = '<div class="dropdown-center">';
                        options +=  '<button class="btn btn-light text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">';
                            options +=  '<i class="ti ti-dots"></i>';
                        options +=  '</button>';
                        options +=  '<ul class="dropdown-menu">';
                            options +=  '<li><a class="dropdown-item" href="#">Edit</a></li>';
                            options +=  '<li><a class="dropdown-item" href="#">Delete</a></li>';
                        options +=  '</ul>';
                    options +=  '</div>';
                return options;
                // return '<button class="btn btn-light text-dark"><i class="ti ti-dots"></i></button>';
            }
        }
    ],
});

$('#formKaryawan').submit(function(e){
    let timerInterval;
    e.preventDefault();
    var form = $('#formKaryawan').serialize();
    $.ajax({
        url: '<?php echo base_url('Karyawan/simpanData'); ?>',
        type: 'POST',
        cache	: false,
        data: form,
        success: function(data){
            $("#dimmis").click();
            $('#formKaryawan')[0].reset();
            $("#photo_karyawan").attr("src",'');
            $('#goldar').val(null).trigger('change');
            $('#provinsi').val(null).trigger('change');
            $('#kabupaten').val(null).trigger('change');
            $('#kecamatan').val(null).trigger('change');
            $('#desa').val(null).trigger('change');
            $('#role').val(null).trigger('change');
            swal.fire({
                imageUrl: '<?= base_url()?>/assets/images/loading.gif',
                title: "Menyimpan Data",
                text: "Mohon Tunggu",
                showConfirmButton: false,
                allowOutsideClick: false,
                timer: 1500,
                timerProgressBar: true,
            }).then((result) => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    html: 'Data berhasil disimpan! <br><br>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500,
                    timerProgressBar: true,
                }).then((result) =>{
                    user.ajax.reload();
                });
            });
        }
    });
});

$.ajax({
    url: '<?= base_url('user/showRole')?>',
    dataType: "JSON",
    success: function(data){
        var select = '';
        $.each(data, function(key, val){
            $("#role").append("<option value='"+ val.role_id +"' >"+ val.role_name +"</option>");
        });
    }
});

$('.close').click(function(){
    $('#formKaryawan')[0].reset();
    $("#photo_karyawan").attr("src",'');
    $('#goldar').val(null).trigger('change');
    $('#provinsi').val(null).trigger('change');
    $('#kabupaten').val(null).trigger('change');
    $('#kecamatan').val(null).trigger('change');
    $('#desa').val(null).trigger('change');
    $('#role').val(null).trigger('change');
});
</script>