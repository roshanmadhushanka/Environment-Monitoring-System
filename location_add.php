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

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="css/plugins/ionRangeSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">

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
                                        else{
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
                            <li><a href="sensor_status.php">Sensor Status</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="user_add.php"><i class="fa fa-envelope"></i> <span class="nav-label">Manage Accounts</span></a>
                    </li>
                <?php } ?>
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
                                    <a href="">
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
                            <a href="">
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

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add a location <small>  to the system </small></h5>
                    </div>
                    <div class="ibox-content">
                        <form method="post" action="php/AddLocation.php" class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Location Name</label>
                                <div class="col-sm-10"><input type="text" name="location_name" class="form-control" required></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Location City</label>
                                <div class="col-sm-10"><input type="text" name="location_city" class="form-control" required></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Longitude</label>
                                <div class="col-sm-10"><input type="text" name="longitude" class="form-control" required></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Latitude</label>
                                <div class="col-sm-10"><input type="text" name="latitude" class="form-control" required></div>
                            </div>

                            <div class="form-group"><label class="col-sm-2 control-label">Altitude</label>
                                <div class="col-sm-10"><input type="text" name="Altitude" class="form-control" required></div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white" type="submit">Cancel</button>
                                    <input type="submit" class="btn btn-primary" value="Save Changes">
                                </div>
                            </div>

                        </form>
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
<script src="js/plugins/flot/jquery.flot.resize.js"></script>
<script src="js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Flot demo data -->
<script src="flot-demo.js"></script>

<!-- Mainly scripts -->
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<!-- JSKnob -->
<script src="js/plugins/jsKnob/jquery.knob.js"></script>

<!-- Input Mask-->
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Data picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- NouSlider -->
<script src="js/plugins/nouslider/jquery.nouislider.min.js"></script>

<!-- Switchery -->
<script src="js/plugins/switchery/switchery.js"></script>

<!-- IonRangeSlider -->
<script src="js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>

<!-- iCheck -->
<script src="js/plugins/iCheck/icheck.min.js"></script>

<!-- MENU -->
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

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

    $("#ionrange_1").ionRangeSlider({
        min: 0,
        max: 5000,
        type: 'double',
        prefix: "$",
        maxPostfix: "+",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_2").ionRangeSlider({
        min: 0,
        max: 10,
        type: 'single',
        step: 0.1,
        postfix: " carats",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_3").ionRangeSlider({
        min: -50,
        max: 50,
        from: 0,
        postfix: "�",
        prettify: false,
        hasGrid: true
    });

    $("#ionrange_4").ionRangeSlider({
        values: [
            "January", "February", "March",
            "April", "May", "June",
            "July", "August", "September",
            "October", "November", "December"
        ],
        type: 'single',
        hasGrid: true
    });

    $("#ionrange_5").ionRangeSlider({
        min: 10000,
        max: 100000,
        step: 100,
        postfix: " km",
        from: 55000,
        hideMinMax: true,
        hideFromTo: false
    });

    $(".dial").knob();

    $("#basic_slider").noUiSlider({
        start: 40,
        behaviour: 'tap',
        connect: 'upper',
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#range_slider").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });

    $("#drag-fixed").noUiSlider({
        start: [ 40, 60 ],
        behaviour: 'drag-fixed',
        connect: true,
        range: {
            'min':  20,
            'max':  80
        }
    });
</script>

</body>

</html>
