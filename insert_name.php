<?php


include 'mysql.php';

 $name=$_POST['first_name'].' '.$_POST['Last_name'];

 $query='SELECT * FROM `names`';

 $stm=$connect->prepare($query);
 $stm->execute();
 $count_value=$stm->rowCount();

 if ($count_value == 0) 
 {   
      $query='
       INSERT INTO `names`(`name`) 
              VALUES ("'.$name.'")';
       $stm=$connect->prepare($query);
       if ($stm->execute()) 
       {
       	echo "done_successfully";
       }

 }else{
 	echo "There_is_a_name";
 }






?>