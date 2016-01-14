<html>
<head>
</head>
<body>
<?php
include "LoadClass.php";
$loc = 4;
$readingController = new ReadingController();
$val = $readingController->getTemperatureByLocationDate('4' ,'2016-01-14');
echo $val;
?>

</body>
</html>