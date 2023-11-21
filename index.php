<?php
session_start();
error_reporting(0);
include('includes/config.php');

if (strlen($_SESSION['userlogin']) == 0) {
    header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="This is a Philippine Cancer Center HR Management System">
    <meta name="keywords" content="PCC-HRMS, HRMS, Human Resource, Capstone, System, HR">
    <meta name="author" content="Heionim">
    <meta name="robots" content="noindex, nofollow">
    <title>PCC HRMS</title>

    <style>
        .page-header {
            background-color: #204A3D;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
        }

        .page-header .breadcrumb-item.active,
        .page-header .welcome h3,
        .page-header .close {
            color: #F0F0F0;
        }

        /* ATTENDANCE TABLE */
        .container {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 1rem 0.5rem;

        }

        h2 {
            font-size: 1rem;
            border-bottom: 2px solid #ccc;
            padding: 0.5rem;
        }

        thead,
        tbody {
            background-color: #d9d9d9;
            color: #204A3D;
            font-size: 0.8rem;
            text-align: center;
        }

        /* CALENDAR CHART */
        #calendar {
            max-width: 600px;
            margin: 0 auto;
            border-collapse: collapse;
        }

        #calendar th,
        #calendar td {
            width: 14.28%;
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        #calendar th {
            background-color: #f2f2f2;
        }

        .event {
            background-color: #4CAF50;
            color: #fff;
            padding: 2px;
            border-radius: 4px;
            display: block;
            margin-top: 5px;
        }

        #month-year {
            text-align: center;
            margin-bottom: 10px;
        }
    </style>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/pcc-logo.svg">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!-- Main Wrapper -->
    <div class="main-wrapper">

        <!-- Header -->
        <?php include_once("includes/header.php"); ?>

        <!-- Sidebar -->
        <?php include_once("includes/sidebar.php"); ?>

        <div class="page-wrapper">
            <div class="content container-fluid">

                <!-- WELCOME MESSAGE -->
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="welcome d-flex justify-content-between align-items-center">
                                <h3 class="page-title">Welcome HR Administrator Heionim!</h3>
                                <button type="button" class="close" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- METRICS -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                                <div class="dash-widget-info">
                                    <h3>15</h3>
                                    <span>Total Employees</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>12</h3>
                                    <span>Today's Attendance</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>2</h3>
                                    <span>Today's Absent</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                                <div class="dash-widget-info">
                                    <h3>1</h3>
                                    <span>Today' Leave</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <!-- ATTENDANCE TABLE -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <div class="container">
                            <h2 class="mt-3 mb-4">Today's Attendance</h2>

                            <div class="table-responsive">
                                <table class="table table-bordered border-primary">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Time In</th>
                                            <th>Time Out</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>09:00 AM</td>
                                            <td>05:00 PM</td>
                                            <td>Present</td>
                                        </tr>
                                        <tr>
                                            <td>Jane Doe</td>
                                            <td>09:30 AM</td>
                                            <td>04:45 PM</td>
                                            <td>Present</td>
                                        </tr>
                                        <tr>
                                            <td>Alice Smith</td>
                                            <td>10:00 AM</td>
                                            <td>05:30 PM</td>
                                            <td>Absent</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- CALENDAR EVENTS SAMPLE -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                        <?php
                        // Sample events data
                        $events = [
                            ['2023-11-20', 'Employee Meeting'],
                            ['2023-11-25', 'Comapany Celebration'],
                            // Add more events as needed
                        ];

                        // Function to format date for display
                        function formatDate($date)
                        {
                            return date('Y-m-d', strtotime($date));
                        }

                        // Function to get the current month and year
                        function getCurrentMonthYear()
                        {
                            return date('F Y');
                        }

                        $currentMonth = date('m');
                        $currentYear = date('Y');
                        ?>
                        <div class="container">
                            <div id="calendar">
                                <div id="month-year">
                                    <h2><?= getCurrentMonthYear() ?></h2>
                                </div>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Sun</th>
                                            <th>Mon</th>
                                            <th>Tue</th>
                                            <th>Wed</th>
                                            <th>Thu</th>
                                            <th>Fri</th>
                                            <th>Sat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $currentMonth, $currentYear);
                                        $firstDayOfMonth = date('w', strtotime("$currentYear-$currentMonth-01"));
                                        $dayCounter = 0;

                                        echo '<tr>';
                                        for ($x = 0; $x < $firstDayOfMonth; $x++) {
                                            echo '<td></td>';
                                            $dayCounter++;
                                        }

                                        for ($day = 1; $day <= $daysInMonth; $day++) {
                                            echo '<td>';
                                            echo $day;

                                            // Display events for the day
                                            foreach ($events as $event) {
                                                if (formatDate($event[0]) == "$currentYear-$currentMonth-$day") {
                                                    echo '<span class="event">' . $event[1] . '</span>';
                                                }
                                            }

                                            echo '</td>';

                                            // Start a new row after Saturday
                                            if (++$dayCounter % 7 == 0 && $day < $daysInMonth) {
                                                echo '</tr><tr>';
                                            }
                                        }

                                        // Complete the row with empty cells
                                        while ($dayCounter % 7 != 0) {
                                            echo '<td></td>';
                                            $dayCounter++;
                                        }

                                        echo '</tr>';
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- ABSENCE RATE CHART -->
                <div class="row">
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-12">
                        <div class="container mt-2">
                            <div class="row">
                                <div class="col-md-8 mx-auto">
                                    <div id="chartContainer" style="width: 800px; max-height: 400px;">
                                        <canvas id="absenceChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
                        $absence_rate = [2.5, 3.0, 2.8, 1.5, 2.0, 2.3, 1.3, 6.4, 2.6, 9, 4, 2.5, 0.0];
                        ?>

                        <!-- RENDER CHART JS -->
                        <script>
                            let months = <?php echo json_encode($months); ?>;
                            let absenceRate = <?php echo json_encode($absence_rate); ?>;

                            let ctx = document.getElementById('absenceChart').getContext('2d');
                            let myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: months,
                                    datasets: [{
                                        label: 'Absence Rate (%)',
                                        data: absenceRate,
                                        backgroundColor: '#FCD937',
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true,
                                            max: 10
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>


            </div>
        </div>

    </div>


    <!-- jQuery -->
    <script src="assets/js/jquery-3.2.1.min.js"></script>

    <!-- Bootstrap Core JS -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Slimscroll JS -->
    <script src="assets/js/jquery.slimscroll.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael.min.js"></script>
    <script src="assets/js/chart.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/app.js"></script>
</body>

</html>