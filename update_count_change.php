<?php

include 'mysql.php';

$query='UPDATE `names` SET `count_change`=""';

$stm=$connect->prepare($query);
if ($stm->execute()) 
    {
     echo "delete";
    }     


?>