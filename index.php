<div>
<?php
    include "./template/LoadClass.php";
?>
</div>
<div>
    <h1>Hello</h1>
    <h2>
        <?php
            $u = new Location('0','ENTC', 'Katubedda', '1', '2', '3');
            echo $u->getLocationName();
            $loc_controller = new LocationController();
            //$loc_controller->addLocation($u);
            //$loc = $loc_controller->getLocationByID('1');
            $loc =$loc_controller->getLocationByCity('Katubedda');
            foreach($loc as $d){
                echo $d->getLocationName();
            }
            //echo 'Roshan Result '.$loc->getLocationName();
        ?>
    </h2>
</div>
