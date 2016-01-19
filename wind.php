
<?php
    session_start();
    include "LoadClass.php";
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Environmental Monitoring System| Temperature</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="css/plugins/chosen/chosen.css" rel="stylesheet">

    <link href="css/plugins/switchery/switchery.css" rel="stylesheet">

    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <link href="css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <script type="text/javascript" src="AirComposition.js"></script>

</head>

<body>
<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
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

                <li>
                    <a href="index.php#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Manage Devices</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="device_add.php">Add Sensor</a></li>
                        <li><a href="board_add.php">Add Sensor Board</a></li>
                        <li><a href="edit_sensor.php">Edit/Remove Sensor</a></li>
                        <li><a href="edit_sensor_board.php">Edit/Remove Sensor Board</a></li>
                    </ul>
                </li>

                <li>
                    <a href="user_add.php"><i class="fa fa-envelope"></i> <span class="nav-label">Manage Accounts</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg dashbard-1">
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
                    <a href="login.php">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
                </ul>
            </nav>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Select Location & Date</h5>
                        </div>
                        <div class="ibox-content">
                            <form class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Select Location</label>
                                    <div class="col-sm-10">
                                        <select class="form-control m-b" name="location" id="location" onchange="process()">
                                            <option selected disabled>- Select a location -</option>
                                            <?php
                                            $locationController = new LocationController();
                                            $locations = $locationController->selectAll();
                                            foreach($locations as $location){
                                                echo '<option value="'.$location->getLocationId().'">'.$location->getLocationName().'</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group" id="data_2">
                                    <label class="col-sm-2 control-label">Select Date</label>
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        <input type="text" class="form-control" value="12/17/2015" name="date" id="date" onchange="process()">
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="widget style1 blue-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-bomb fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Oxygen </span>
                                <h2 class="font-bold">
                                    <div id="oxygenPercentage"></div>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="widget style1 navy-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-puzzle-piece fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Nitrogen </span>
                                <h2 class="font-bold">
                                    <div id="nitrogenPercentage"></div>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>  </h5>

                        </div>
                        <div class="ibox-content">
                            <div id="morris-line-chart" style="width:"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Air Composition</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <div id="morris-donut-chart" ></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="footer">
            <div>
                <strong>Copyright</strong> Ozious Technology &copy; 2015/16
            </div>
        </div>

    </div>
</div>


</div>


<script src="js/jquery-1.10.2.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- JSKnob -->
<script src="js/plugins/jsKnob/jquery.knob.js"></script>

<!-- Input Mask-->
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Switchery -->
<script src="js/plugins/switchery/switchery.js"></script>

<!-- IonRangeSlider -->
<script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Mainly scripts -->
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
<script src="js/plugins/morris/morris.js"></script>
<script src="js/demo/morris-demo.js"></script>

<script>
    $(document).ready(function(){

        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });

        $('#data_2 .input-group.date').datepicker({
            startView: 1,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_3 .input-group.date').datepicker({
            startView: 2,
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        $('#data_4 .input-group.date').datepicker({
            minViewMode: 1,
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            todayHighlight: true
        });

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

        var elem = document.querySelector('.js-switch');
        var switchery = new Switchery(elem, { color: '#1AB394' });

        var elem_2 = document.querySelector('.js-switch_2');
        var switchery_2 = new Switchery(elem_2, { color: '#ED5565' });

        var elem_3 = document.querySelector('.js-switch_3');
        var switchery_3 = new Switchery(elem_3, { color: '#1AB394' });

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });
    var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

</script>

</body>

</html>
