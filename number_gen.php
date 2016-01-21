<?php
include "LoadClass.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sensor Reading Generator</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">

        <h3 class="font-bold">Sensor Data Generator</h3>
        <div class="error-desc">
            This page generates sensor readings
            <?php
                $index = 8;
                $value1 = 30;
                $value2 = 35;
                $readingController = new ReadingController();
                while(true){
                    sleep(10);
                    if($index==8){
                        $index = 9;
                    }
                    elseif($index==9){
                        $index = 10;
                    }
                    else{
                        $index = 8;
                    }
                    $reading_object = new Reading(0,$index,date("Y-m-d"), date("h:i:sa"), rand($value1,$value2));
                    $readingController->insert($reading_object);
                }

            ?>

        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
