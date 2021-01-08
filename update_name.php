<?php

 include 'mysql.php';
 $name=$_POST['first_name'].' '.$_POST['Last_name'];

 $query='SELECT * FROM `names`';

 $stm=$connect->prepare($query);
 $stm->execute();
 $count_value=$stm->rowCount();
 $fetch_count_name=$stm->FetchAll();

 foreach ($fetch_count_name as $row) 
 {
  if ($row['count_change'] >= 2) 
     {  
      echo "Not_possible";
     }else{

      $row['count_change'];

      if ($row['count_change'] == 1) 
      {
        $The_number_of_times=$row['count_change']+$_POST['The_number_of_times']; 
       }else{
        $The_number_of_times=$_POST['The_number_of_times']; 
       }

      $query='
       UPDATE `names` SET `name`="'.$name.'",
       `count_change`="'.$The_number_of_times.'"';

       $stm=$connect->prepare($query);
       if ($stm->execute()) 
       {
         echo "Updated";
       }     
     }
 }



?>