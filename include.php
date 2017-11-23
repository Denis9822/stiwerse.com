<?php

 $connection = mysqli_connect('localhost','ssset20d_1','qwerty','ssset20d_1');
 
 if ($connection == false)
 
 {
     echo('eroor');
     echo mysqli_connect_error();
     exit();
     
 
 }
?>