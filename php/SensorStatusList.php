<?php
    include "../LoadClass.php";
    $status = $_GET["status"];

    $sensorObjController = new SensorObjController();
    $sensors = null;
    if($status == '0'){
        $sensors = $sensorObjController->getSensorViewObjs();
    }else{
        $sensors = $sensorObjController->getSensorViewObjsByStatus($status);
    }
    echo '<table class="table table-responsive">';
    echo '<tr>';
        echo '<th>';
            echo 'Status';
        echo '</th>';
        echo '<th>';
            echo 'Location';
        echo '</th>';
        echo '<th>';
            echo 'Type';
        echo '</th>';
        echo '<th>';
            echo 'Company';
        echo '</th>';
    echo '</tr>';


    if($sensors == null){
       echo 'No result found';
    }else{
        foreach($sensors as $sensor){
            echo '<tr>';
            //Status
            echo '<td class="project-status">';
            if($sensor->getSensorStatus() == "Working"){
                echo '<span class="label label-primary">Working</span>';
            }else{
                echo '<span class="label label-danger">Not Working</span>';
            }
            echo '</td>';
            echo '<td class="project-title">';
            echo '<a href="#">'.$sensor->getSensorLocationName().'</a>';
            echo '<br/>';
            echo '<small>...</small>';
            echo '</td>';
            echo '<td class="project-title">';
            switch($sensor->getSensorType()){
                case "Temperature":
                    echo '<i class="fa fa-spoon btn btn-danger"></i>';
                    break;
                case "Pressure":
                    echo '<i class="fa fa-bolt btn btn-default"></i>';
                    break;
                case "Humidity":
                    echo '<i class="fa fa-tint btn btn-primary"></i>';
                    break;
                case "Oxygen":
                    echo '<i class="fa fa-male btn btn-info"></i>';
                    break;
                case "Nitrogen":
                    echo '<i class="fa fa-shield btn btn-success"></i>';
                    break;
            }
            echo '<a href="#"> '.$sensor->getSensorType().'</a>';
            echo '</td>';
            echo '<td>';
            echo '<a href="#"> '.$sensor->getSensorManufacturerName().'</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</table>';
    }



