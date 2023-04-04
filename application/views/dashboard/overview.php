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
            <div class="container-fluid">
                <!-- Start First Cards -->

                <div class="row">
                    <div class="col-12">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <?php $this->load->view('component/_footer') ?>

        </div>
    </div>
    <?php $this->load->view('component/_jquery') ?>

<script>
    var labels = [];
    var values = [];
    var colors = [];
    var borders = [];
    var ctx = document.getElementById("myChart").getContext("2d");
    var chart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: [],
        datasets: [
        {
            label: "Jumlah",
            backgroundColor: colors,//"rgb(39, 210, 254, 0.2)"
            borderColor: colors,//"rgb(39, 210, 254, 1)"
            borderWidth: 1,
            data: []
        }
        ]
    },
    options: {
        scales: {
        xAxes: [{
            gridLines: {
                display: false
            },
            ticks: {
                fontColor: '#6a6b6a',
                fontSize: 12
            },
            scaleLabel: {
                display: true,
                labelString: 'Bulan',
                fontColor: '#6a6b6a',
                fontSize: 15
            }
        }],
        yAxes: [{
            ticks: {
                beginAtZero: true,
                fontColor: '#6a6b6a',
                fontSize: 12
            },
            scaleLabel: {
                display: true,
                labelString: 'Jumlah per Bulan',
                fontColor: '#6a6b6a',
                fontSize: 15
            }
        }]
        }
    }
    });

    // Mengatur polling untuk memperbarui data chart.js setiap 5 detik
    setInterval(function() {
    $.ajax({
        url: '<?php echo base_url()?>/overview/data_penjualan',
        type: "GET",
        success: function(data) {

        // Buat warna random untuk setiap bar
        for (var i = 0; i < data.length; i++) {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            var color = 'rgb(' + r + ',' + g + ',' + b + ','+0.3+')';
            var border = 'rgb(' + r + ',' + g + ',' + b + ','+1+')';
            colors.push(color);
            borders.push(border); 
        }
        // Mengubah data menjadi array
        var chartData = JSON.parse(data);

        // Jika variabel "labels" kosong, hapus semua data chart.js dan gambar kembali grafik dengan data yang baru
        if (labels.length === 0) {
            chart.data.labels = [];
            chart.data.datasets[0].data = [];
            for (var i in chartData) {
            chart.data.labels.push(chartData[i].tgl);
            chart.data.datasets[0].data.push(chartData[i].jumlah);
            }
            chart.update();
        }
        // Jika variabel "labels" tidak kosong, tambahkan data baru ke chart.js
        else {
            for (var i in chartData) {
            chart.data.labels.push(chartData[i].tgl);
            chart.data.datasets[0].data.push(chartData[i].jumlah);
            
            }
            chart.update({
            preservation: true // Menjaga posisi horizontal saat data baru ditambahkan
            });
        }
        }
    });
    }, 2000);

</script>