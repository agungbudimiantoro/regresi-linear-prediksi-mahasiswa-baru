<?php
$tahun = date('Y');
?>
<script>
    var dataSets = [{
        label: 'Tanggal Berobat',
        backgroundColor: 'rgba(214, 48, 49,1.0)',
        borderColor: 'rgba(0,0,0,0.8)',
        pointRadius: false,
        pointColor: '#000',
        pointStrokeColor: 'rgba(0,0,0,1)',
        pointHighlightFill: '#fff',
        pointHighlightStroke: 'rgba(0,0,0,1)',
        data: [<?php
                for ($i = 2015; $i <= $tahun; $i++) {
                    $query_bulan = mysqli_query($conn, "SELECT COUNT(kode_rawat_jalan) as jumlah FROM rawat_jalan WHERE YEAR(tgl_berobat) = $i");
                    $pen_line = mysqli_fetch_assoc($query_bulan);
                    if ($pen_line == null) {
                        echo 0;
                    } else {
                        echo $pen_line['jumlah'];
                    }
                    echo ',';
                } ?>],
    }];


    var data = {
        labels: [<?php
                    for ($i = 2015; $i <= $tahun; $i++) {
                        echo $i;
                        echo ',';
                    }
                    ?>],
        datasets: dataSets
    }

    //-------------
    //- BAR CHART -
    //-------------
    var barChart = $('#barChartObat');
    var barChartData = jQuery.extend(true, {}, data)

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
    }

    var barChart = new Chart(barChart, {
        type: 'bar',
        data: barChartData,
        options: barChartOptions
    })
</script>

<?php
