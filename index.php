<?php
session_start();
include "LoadClass.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Environmental Monitoring System| Dashboard</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script
        type="text/javascript" src="/assets/script/canvasjs.min.js">
    </script>
    <script type="text/javascript" src="AutoTemperature.js"></script>
</head>

<body>
    <!-- Test Redirect PHP -->
    <?php header('Location: test.php');?>
    <!-- End Test Redirect PHP -->

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <span>
                                <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                            </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">
                                        <?php
                                            if(isset($_SESSION['current_user_id'])){
                                                $userController = new UserController();
                                                $user = $userController->selectByID($_SESSION['current_user_id']);
                                                echo $user->getFirstName().' '.$user->getLastName();
                                            }
                                            else{
                                                echo '<script> show_popup(); </script>';
                                                header('Location:http://localhost/Environment-Monitoring-System/login.php');
                                            }
                                        ?>
                             </strong>
                             </span>
                             <span class="text-muted text-xs block">
                                    <?php
                                    if(isset($_SESSION['login_id'])) {
                                        $userLoginController = new UserLoginController();
                                        $user = $userLoginController->selectById($_SESSION['login_id']);

                                        $userTypeController = new UserTypeController();
                                        $userType = $userTypeController->selectById($user->getUserTypeIduserType());

                                        echo $userType->getDescription();
                                    }
                                    ?><b class="caret"></b></span> </span> </a>

                        </div>


                    </li>
                    <li class="active">
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Introduction</span></a>
                    </li>

                    <li>
                        <a href="index.php#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Monitor Panel</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li><a href="temperature.php">Temperature & Humidity</a></li>
                            <li><a href="wind.php">Wind,Air Pressure & Quality</a></li>
                        </ul>
                    </li>
                    <?php if(isset($_SESSION['user_level_id']) && $_SESSION['user_level_id']==1){ ?>
                        <li>
                            <a href="index.php#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Manage Devices</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="device_add.php">Add Sensor</a></li>
                                <li><a href="board_add.php">Add Sensor Board</a></li>
                                <li><a href="edit_sensor.php">Remove Sensor</a></li>
                                <li><a href="edit_sensor_board.php">Remove Sensor Board</a></li>
                                <li><a href="manufacturer_add.php">Add Manufacturer</a></li>
                                <li><a href="location_add.php">Add Location</a></li>
                                <li><a href="edit_manufacturer.php">Remove Manufacturer</a></li>
                                <li><a href="edit_location.php">Remove Location</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="user_add.php"><i class="fa fa-envelope"></i> <span class="nav-label">Manage Accounts</span></a>
                        </li>
                    <?php } ?>

                </ul>

            </div>
        </nav>

        <div
            id="page-wrapper" class="gray-bg dashbard-1">
        <div>
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">


        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome to EMS</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">

                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts"
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="php/Logout.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-sm-3">
                        <h2>Available Features</h2>
                        <ul class="list-group clear-list m-t">
                            <li class="list-group-item fist-item">
                                <span class="label label-success">1</span> Monitor sensor system
                            </li>
                            <li class="list-group-item">
                                <span class="label label-info">2</span> Add or remove sensors
                            </li>
                            <li class="list-group-item">
                                <span class="label label-primary">3</span> Add or remove users
                            </li>
                            <li class="list-group-item">
                                <span class="label label-default">4</span> Get generated reports
                            </li>

                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="flot-chart dashboard-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                        <div class="row text-left">
                            <div class="col-xs-4">
                                <div class=" m-l-md">
                                <span class="h4 font-bold m-t block">Precipitation</span>
                                <small class="text-muted m-b block">89%</small>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">Humidity</span>
                                <small class="text-muted m-b block">83%</small>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">Wind</span>
                                <small class="text-muted m-b block">8 km/h</small>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="statistic-box">
                        <h4>
                            24 Hour Average Temperature Fluctuation
                        </h4>
                        <p>
                            for today and yesterday
                        </p>
                            <div class="row text-center">

                                <div class="col-lg-6">
                                    <canvas id="doughnutChart" width="78" height="78"></canvas>
                                    <h5 >Percentage Distribution</h5>
                                </div>
                            </div>
                            <div class="m-t">
                                <small>This pie chart shows the percentage distribution of temperatures</small>
                            </div>

                        </div>
                    </div>

            </div>

            <div class="col-lg-12">
                <div class="ibox float-e-margins ">
                    <div class="ibox-title">
                        <h5>EMS - Colombo City</h5>
                        <div class="ibox-tools">
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>

                    <div class="ibox-content ">
                        <div class="carousel slide" id="carousel2">
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" data-target="#carousel2"  class="active"></li>
                                <li data-slide-to="1" data-target="#carousel2"></li>
                                <li data-slide-to="2" data-target="#carousel2" class=""></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img alt="image"  class="img-responsive" src="img/city1.jpg">

                                </div>
                                <div class="item ">
                                    <img alt="image"  class="img-responsive" src="img/city2.jpg">

                                </div>
                                <div class="item">
                                    <img alt="image"  class="img-responsive" src="img/city3.jpg">

                                </div>
                            </div>
                            <a data-slide="prev" href="carousel.html#carousel2" class="left carousel-control">
                                <span class="icon-prev"></span>
                            </a>
                            <a data-slide="next" href="carousel.html#carousel2" class="right carousel-control">
                                <span class="icon-next"></span>
                            </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- EayPIE -->
    <script src="js/plugins/easypiechart/jquery.easypiechart.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <script>
        $(document).ready(function() {
            WinMove();
            setTimeout(function() {
                $.gritter.add({
                    title: 'This is the Environmental Monitoring System',
                    text: 'Go to <a href="temperature.php" class="text-warning">Monitor</a> To see sensor data<br/> check the Monitor section ',
                    time: 2000
                });
            }, 2000);


            $('.chart').easyPieChart({
                barColor: '#f8ac59',
//                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var data1 = [
                [0,27],[2,28],[4,25],[6,29],[8,34],[10,36],[12,35],[14,31],[16,36],[18,31],[20,30],[22,32],[24,33]
            ];
            var data2 = [
                [0,29],[2,30],[4,28],[6,27],[8,31],[10,32],[12,31],[14,35],[16,32],[18,33],[20,32],[22,31],[24,30]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#464f88"],
                        xaxis:{
                            ticks: 24
                        },
                        yaxis: {
                            ticks: 10
                        },
                        tooltip: false
                    }
            );

            var doughnutData = [
                {
                    value: 20,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "Below 30"
                },
                {
                    value: 72,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "30 to 35"
                },
                {
                    value: 8,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Above 35"
                }
            ];

            var doughnutOptions = {
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                percentageInnerCutout: 45, // This is 0 for Pie charts
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };

            var ctx = document.getElementById("doughnutChart").getContext("2d");
            var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

            var polarData = [
                {
                    value: 300,
                    color: "#a3e1d4",
                    highlight: "#1ab394",
                    label: "Below 30"
                },
                {
                    value: 140,
                    color: "#dedede",
                    highlight: "#1ab394",
                    label: "30 to 35"
                },
                {
                    value: 200,
                    color: "#b5b8cf",
                    highlight: "#1ab394",
                    label: "Above 35"
                }
            ];

            var polarOptions = {
                scaleShowLabelBackdrop: true,
                scaleBackdropColor: "rgba(255,255,255,0.75)",
                scaleBeginAtZero: true,
                scaleBackdropPaddingY: 1,
                scaleBackdropPaddingX: 1,
                scaleShowLine: true,
                segmentShowStroke: true,
                segmentStrokeColor: "#fff",
                segmentStrokeWidth: 2,
                animationSteps: 100,
                animationEasing: "easeOutBounce",
                animateRotate: true,
                animateScale: false,
            };
            var ctx = document.getElementById("polarChart").getContext("2d");
            var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

        });
    </script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">
        function show_popup() {
            var p = window.createPopup()
            var pbody = p.document.body
            pbody.style.backgroundColor = "lime"
            pbody.style.border = "solid black 1px"
            pbody.innerHTML = "This is a pop-up! Click outside to close."
            p.show(150,150,200,50,document.body)
        }
    </script>
</body>
</html>
