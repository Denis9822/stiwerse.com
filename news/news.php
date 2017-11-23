<!doctype html>

 <style type="text/css">
 <?

include_once('../style.php');
require_once('../include.php');

$mytitle1=mysqli_query($connection,"SELECT * FROM `news` WHERE `id`=".$_GET['id']);
$arr1=mysqli_fetch_assoc($mytitle1);

$title=$arr1['title']." - Stiverse.com";
$disc=mb_substr(strip_tags($arr1['text']),0,125,'utf-8');
?>
 </style>
 
<script type="text/javascript"> 
 </script>
 
 
<html>


<!-- ШАПКА СТИЛИ И ТД -->

<?
include_once('../head.php');
?>

 <body>
  <div class="wrapper"> 
  <!-- ГОЛОВА САЙТА -->
<?

include_once('../bodyhead.php');

?>

    <!-- КОНТЕНТ САЙТА -->
<?

include_once('content-news.php');


?>
   
    <!-- ФУТЕР САЙТА -->
    

<?

include_once('../footer.php');

?>



</div>


 </body>
</html>