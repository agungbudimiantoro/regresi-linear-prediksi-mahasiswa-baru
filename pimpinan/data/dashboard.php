<script>
    var data = {
        datasets: [{
            data: [<?php
                    $query_rawat_inap = mysqli_query($conn, "SELECT COUNT(kode_rawat_inap) as total from rawat_inap");
                    $data_rawat_inap = mysqli_fetch_assoc($query_rawat_inap);
                    echo $data_rawat_inap['total'];
                    echo ',';
                    $query_rawat_jalan = mysqli_query($conn, "SELECT COUNT(kode_rawat_jalan) as total from rawat_jalan");
                    $data_rawat_jalan = mysqli_fetch_assoc($query_rawat_jalan);
                    echo $data_rawat_jalan['total'];
                    ?>],
            backgroundColor: ['rgba(190, 55, 55,1.0)', 'rgba(22,21, 122,1.0)']
        }],
        labels: [
            'Rawat Inap',
            'Rawat Jalan',
        ],

    };

    //-------------
    //- BAR CHART -
    //-------------
    var barChart = $('#barChart');
    var barChartData = jQuery.extend(true, {}, data)

    var barChartOptions = {}

    var barChart = new Chart(barChart, {
        type: 'pie',
        data: barChartData,
        options: barChartOptions
    })
</script>

<?php
