<?php
session_start();

if (!isset($_SESSION["login"])) {
    header('location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- ICON -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/stylegrafik.css">

    <title>CHART</title>
</head>

<body class="main-bg">
    <?php include('./navbar.php') ?>
    <?php
    $connect = mysqli_connect("localhost", "root", "", "employees");
    // $connect = mysqli_connect("localhost", "id17884817_root", "Kiki4t4tk4k1!", "id17884817_azhar416");
    $emp_no = mysqli_query($connect, "select emp_no from employees where emp_no >= 9998 LIMIT 15");
    $salary = mysqli_query($connect, "select salary from salaries where emp_no = '10001'");
    $frm_date = mysqli_query($connect, "select from_date from salaries where emp_no = '10001'");
    ?>
    <div class="fluid-container" style="margin-left: auto; margin-right: auto; width: 100%">
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header" style="margin-left: auto; margin-right: auto;">
                        <h2 class="card-title">Gaji Pegawai</h2>
                    </div>
                    <!-- /.card-header -->
                    <div class="chart">
                        <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="pegawai row">
            <div class="col-6">
                <h1>
                    Georgi Facello
                </h1>
            </div>
            <div class="col-6">
                <select name="employee_no">
                    <?php
                    if ($emp_no) {
                        if (mysqli_num_rows($emp_no) > 0) {
                            while ($row = mysqli_fetch_array($emp_no)) {
                                echo "<option value = '$row'>$row[0]</option>";
                            }
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
    <!-- Chart -->
    <script src="../plugins/chart.js/Chart.min.js"></script>
    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Script Chart -->
    <script>
        $(function() {
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: [
                    <?php while ($fd = mysqli_fetch_array($frm_date)) {
                        echo '"' . $fd['from_date'] . '",';
                    } ?>
                ],
                datasets: [{
                    label: 'Salary',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php while ($s = mysqli_fetch_array($salary)) {
                                echo '"' . $s['salary'] . '",';
                            } ?>]
                }, ]
            }
            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })
        });
    </script>
</body>

</html>