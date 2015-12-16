<div>
<?php
    include "./template/LoadClass.php";
?>
</div>
<div>
    <h1>Hello</h1>
    <h2>
        <?php
            //almsaaid.com
            //$u = new Location('2','ENTC', 'Katubedda', '1', '2', '10');
            //$loc_controller = new LocationController();
            //$loc_controller->delete('1');
            //$loc =$loc_controller->getAllLocations();
            /*
            foreach($loc as $d){
                echo $d->getLocationName().'<br>';
                echo $d->getAltitude().'<br>';
                echo '---------------------<br>';
            }
            */
            //echo 'Roshan Result '.$loc->getLocationName();


            //$m = new Manufacturer('1', 'Eranga', '3', 'Kularathna Rd', 'Ambalangoda', 'India', '0711382686');
            //$man_controller = new ManufacturerController();
            /*
            $man = $man_controller->selectAll();
            foreach($man as $d){
                echo $d->getManufacturerName();
            }*/
            //echo $man->getManufacturerName();
            //$man_controller->update($m);

            //$r = new Reading('', '2', '2015-12-12', '02:00:00', '30');
            /*
            $read_controller = new ReadingController();
            $readings = $read_controller->selectByDateDiff('2', '2015-12-12', '2016-12-12');
            foreach($readings as $r){
                echo $r->getSensorIdsensor().' '.$r->getDate().'<br>';
            }
            //$read_controller->insert($r);
            echo 'success';
            */

            //$sen_controller = new SensorController();
            //$sensors = $sen_controller->selectByID('2');
            //echo $sensors->getManufacturedDate();
            //foreach($sensors as $s){
                //echo $s->getManufacturedDate().'<br>';
            //}
            //$s = new Sensor('3', '1', '2015-12-17', '1', '1');
            //$sen_controller->update($s);

            $sen_board_controller = new SensorBoardController();
            //$sen = new SensorBoard('', '', '1', '2');
            $sen = $sen_board_controller->selectAll();
            foreach($sen as $s){
                echo $s->getIdsensorBoard().'<br>';
            }


        ?>
    </h2>
</div>
