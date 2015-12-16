<div>
<?php
    include "./template/LoadClass.php";
?>
</div>
<div>
    <h1>Hello</h1>
    <h2>
        <?php
            //$u = new Location('2','ENTC', 'Katubedda', '1', '2', '10');
            //$loc_controller = new LocationController();
            //$loc_controller->update($u);
            //$loc =$loc_controller->getAllLocations();
            /*
            foreach($loc as $d){
                echo $d->getLocationName().'<br>';
                echo $d->getAltitude().'<br>';
                echo '---------------------<br>';
            }
            */
            //echo 'Roshan Result '.$loc->getLocationName();


            $m = new Manufacturer('1', 'Eranga', '3', 'Kularathna Rd', 'Ambalangoda', 'India', '0711382686');
            $man_controller = new ManufacturerController();
            /*
            $man = $man_controller->selectAll();
            foreach($man as $d){
                echo $d->getManufacturerName();
            }*/
            //echo $man->getManufacturerName();
            $man_controller->update($m);

        ?>
    </h2>
</div>
