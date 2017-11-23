<!doctype html>

 <style type="text/css">
 <?
 $id_page= $_GET['page'];
$pieces = explode("?", $id_page);
include_once('style.php');

$f = 2;
$str = $_GET['page'];

   if($pieces[0]==false)
$title="Новости - самые интересные новости мира, новости дня - Stiverse.com";
else
$title="Новости - самые интересные новости мира, новости дня - Stiverse.com ". $pieces[0]." страница";


$disc="Интересные новости и факты в мире онлайн, последние новости, новости дня. Главные новости на Stiverse.com, все новости 2017";
$keyw="новости дня, новости мира, интересные новости, новости, последние новости, главные новости, новости 2017";
?>
 </style>

<script type="text/javascript"> 
 </script>
 
 
<html>


<!-- ШАПКА СТИЛИ И ТД -->

<?
include_once('head.php');
?>

 <body>
  <div class="wrapper"> 
  <!-- ГОЛОВА САЙТА -->
<?

include_once('bodyhead.php');


?>

    <!-- КОНТЕНТ САЙТА -->
<?

include_once('content.php');

?>
   
    <!-- ФУТЕР САЙТА -->
    

<?

include_once('footer.php');

?>



</div>


 </body>
</html>


 

