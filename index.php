<div>
<?php
    include "./template/LoadClass.php";
?>
</div>
<div>
    <h1>Hello</h1>
    <h2>
        <?php
            $u = new Location('2','ENTC', 'Katubedda', '1', '2', '10');
            $loc_controller = new LocationController();
            //$loc_controller->addLocation($u);
            //$loc = $loc_controller->getLocationByID('1');
            $loc_controller->updateLocationName($u);
            $loc =$loc_controller->getLocationByCity('Katubedda');
            foreach($loc as $d){
                echo $d->getLocationName().'<br>';
                echo $d->getAltitude().'<br>';
                echo '---------------------<br>';
            }
            //echo 'Roshan Result '.$loc->getLocationName();
        ?>
    </h2>
</div>
