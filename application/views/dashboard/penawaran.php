<!-- Head -->
<?php $this->load->view('component/_head') ?>
<!-- Head -->

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <span class="loader"></span>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->


        <!-- ****** Top Header -->
        <?php $this->load->view('component/_header') ?>
        <!-- ****** Top Header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php $this->load->view('component/_sidebar') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb and right sidebar toggle -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <!-- <h6 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome Jason!</h6> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a>
                                        <i class="fas fa-angle-double-right"></i> Master Brosur
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Daftar Penawaran</h4>
                                <hr>
                                <h6 class="card-subtitle">
                                    <div class="btn-list">
                                        <a href="#" id="refresh_tabel" class="btn btn-outline-primary float-right"><i class="fas fa-redo-alt" data-toggle="tooltip" data-placement="bottom" title="refresh"></i> </a>
                                        <button class="btn btn-outline-success float-right" data-toggle="modal" data-target="#success-header-modal"><i class="fas fa-user-plus" data-toggle="tooltip" data-placement="bottom" title="Add"></i></button>
                                    </div>
                                </h6>
                                <div class="table-responsive">
                                    <table id="multi_col_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Penawaran</th>
                                                <th>Nama Instansi</th>
                                                <th>Tanggal Penawaran</th>
                                                <th>Nama Produk </th>
                                                <th>QTY </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($penawaran as $data) : ?>
                                                <tr>
                                                    <td><?php echo $i++ ?></td>
                                                    <td><?php echo $data->kode_penawaran ?></td>
                                                    <td><?php echo $data->instansi_pengguna ?></td>
                                                    <td><?php echo $data->tgl_penawaran ?></td>
                                                    <td><?php echo $data->nama_produk ?></td>
                                                    <td><?php echo $data->qty_penawaran ?></td>

                                                    <td>
                                                        <a href="<?php echo site_url('penawaran/edit_penawaran/' . $data->id_penawaran) ?>" class="btn btn-sm btn-outline-success">
                                                            <i class="fas fa-edit" data-toggle="tooltip" data-placement="bottom" title="Edit"></i>
                                                        </a>
                                                        <a onclick="deleteConfirm('<?php echo site_url('penawaran/deletepenawaran/' . $data->id_penawaran) ?>')" href="#!" class="btn btn-sm btn-outline-danger">
                                                            <i class="icon-trash" data-toggle="tooltip" data-placement="bottom" title="Hapus"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Row -->
                <!-- End Location and Earnings Charts Section -->

                <!-- Start Top Leader Table -->
                <!-- <?php //$this->load->view('component/_table') 
                        ?> -->
                <!-- End Top Leader Table -->
            </div>

            <!-- End Container fluid  -->

            <!-- footer -->
            <?php $this->load->view('component/_footer') ?>
            <!-- End footer -->

        </div>
        <!-- End Page wrapper  -->

    </div>
    <!-- End Wrapper -->

    <!-- Jquery -->
    <?php $this->load->view('component/_jquery') ?>
    <!-- End JQuery -->

    <!-- Form Add Modal -->
    <div id="success-header-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="success-header-modalLabel">Form Tambah Penawaran
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <!-- Form -->
                    <form action="<?php echo base_url('penawaran/save_penawaran') ?>" method="post" enctype="multipart/form-data" role="form" class="pl-3 pr-3">
                    
                        <div class="form-group">
                            <div class="form-floating">
                                <input type="hidden" name="kode_penawaran" id="kode_penawaran" value="<?php $kode_penawaran = "SIP-".date("dmY").substr(md5(time()), 0, 5); echo $kode_penawaran;?>">
                                <input type="text" class="form-control" id="kode" placeholder="Kode Penawaran"
                                value="<?php $kode_penawaran = "SIP-".date("dmY").substr(md5(time()), 0, 5); echo $kode_penawaran;?>" disabled>
                                <label for="kode">Kode Penawaran</label>
                            </div>
                        </div>  

                        <div class="form-group">
                            <div class="form-floating">
                                <select class="form-select" id="id_pengguna" name="id_pengguna"  aria-label="Floating label select example" required>
                                    <option disabled value="" selected>Pilih salah satu...</option>
                                    <?php foreach ($instansi as $l) { ?>
                                        <option value="<?php echo $l['id_pengguna']; ?>"><?php echo $l['nama_pengguna']." - ".$l['instansi_pengguna']; ?> </option>
                                    <?php } ?>
                                </select>
                                <label for="id_pengguna">Kostumer & Instansi</label>
                            </div>
                        </div>  

                        <div class="form-group">
                            <table class="table-borderless col-md-12" id="dynamic_field">  
                                <tr>
                                    <td class="col-6 col-sm-6 col-lg-6 col-md-6">
                                        <div class="form-floating">
                                            <select class="form-select" id="id_produk[]" name="id_produk[]"  aria-label="Floating label select example" required>
                                                <option disabled value="" selected>Pilih salah satu...</option>
                                                <?php foreach ($produk as $l) { ?>
                                                    <option value="<?php echo $l['id_produk']; ?>"><?php echo $l['nama_produk']; ?> </option>
                                                <?php } ?>
                                            </select>
                                            <label for="id_produk[]">Kostumer & Instansi</label>
                                        </div>
                                    </td> 
                                    <td class="col-5 col-sm-5 col-lg-5 col-md-5">
                                        <div class="form-floating">
                                            <input type="text" name="qty[]" id="qty[]" placeholder="Quantity" class="form-control" autocomplete="off" required/>
                                            <label for="qty[]">Quantity</label>
                                        </div>
                                    </td>  
                                    <td class="text-center">
                                        <button type="button" name="add" id="add" class="btn btn-success "><i class="fa fa-plus"></i></button>
                                    </td>  
                                </tr>  
                            </table> 
                        </div>

                        <div class="input-group date" id="pengadaan_alat">
                            <div class="form-floating">
                            <input type="text" class="form-control" name="tgl_penawaran" id="tgl_penawaran" placeholder="Pilih Tanggal" autocomplete="off" required />
                                <label for="tgl_penawaran">Tanggal Penawaran</label>
                            </div>
                            <span class="input-group-append">
                                <span class="input-group-text bg-light">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                        <!-- End Form -->

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-window-close"></i> Batal</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
         $(document).ready(function(){      
            var i=1;  

            $('#add').click(function(){  
                i++;  
                $('#dynamic_field').append(
                    '<tr id="row'+i+'" class="dynamic-added"><td class="col-6 col-sm-6 col-lg-6 col-md-6"><div class="form-floating"><select class="form-select" id="id_produk[]" name="id_produk[]"  aria-label="Floating label select example" required><option disabled value="" selected>Pilih salah satu...</option><?php foreach ($produk as $l) { ?><option value="<?php echo $l['id_produk']; ?>"><?php echo $l['nama_produk']; ?> </option><?php } ?></select><label for="id_produk[]">Kostumer & Instansi</label></div></td><td class="col-5 col-sm-5 col-lg-5 col-md-5"><div class="form-floating"><input type="text" name="qty[]" id="qty[]" placeholder="Quantity" class="form-control" autocomplete="off" required/><label for="qty[]">Quantity</label></div></td><td class="text-center"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove"><i class="fa fa-times"></i></button></td></tr>'
                );  
                
            });


            $(document).on('click', '.btn_remove', function(){  
                var button_id = $(this).attr("id");   
                $('#row'+button_id+'').remove();  
            });  

        });  
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>