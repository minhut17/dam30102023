<?php
$data = Statistical();
function Statistical()
{
    $sql = "SELECT COUNT(hang_hoa.ma_loai) as countct, 
    loai.ten_loai as name, 
    MIN(hang_hoa.don_gia) as minprice,
    MAX(hang_hoa.don_gia) as maxprice, 
    AVG(hang_hoa.don_gia) as avgprice 
    FROM loai 
    LEFT JOIN hang_hoa 
    ON loai.ma_loai = hang_hoa.ma_loai 
    GROUP BY loai.ma_loai";
    return pdo_query($sql);
}
$data = [];
foreach (getDataChart() as $key) {
    $data[] = "['" . $key['name'] . "'," . $key['countct'] . "]";
}
$data = implode(',', $data);

function getDataChart()
{
    $sql = "SELECT COUNT(hang_hoa.ma_loai) as countct, 
    loai.ten_loai as name
    FROM loai 
    LEFT JOIN hang_hoa 
    ON loai.ma_loai = hang_hoa.ma_loai 
    GROUP BY loai.ma_loai";
    return pdo_query($sql);
} ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const data = google.visualization.arrayToDataTable([
            ['Tên danh mục', 'Số lượng sản phẩm'],
            <?= $data ?>
        ]);

        const options = {
            title: 'BIỂU ĐỒ THỐNG KÊ SẢN PHẨM',
            is3D: false
        };

        const chart = new google.visualization.PieChart(document.getElementById('myChart'));
        chart.draw(data, options);
    }
</script>
</head>
<body>
<div class="text-center" id="myChart" style="width:1000px; height:500px;">

</div>
</body>
</html>

