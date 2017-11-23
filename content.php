<?

  require_once('include.php');

 $result = mysqli_query($connection, "SELECT * FROM `category`");


?>

<div  class="menu">

<?
while($cat = mysqli_fetch_assoc($result) )
{
?>



 
<ul class="sq">


<li> <? if($cat['id']==2) echo '<a href="/"'; else { ?><a href="cat/cat?page=<?echo $i+1?>?<?echo $cat['id'];}?>"   class="s<?php if ($f==$cat['id']) echo 'active';?>"> <? echo $cat['name']; ?>  </a></li>


</ul>



<?
}
?>
</div>
</br></br></br>

 
 

 <?
  $result7 = mysqli_query($connection, "SELECT * FROM `news`"); 
  $page = $_GET['page'];
    $first =$page*10-10;
    $second = 10;
    
  $messOnPage=10;

  $countPost=mysqli_num_rows($result7);
  
  $lastPage = ceil($countPost / $messOnPage);
  

  if($first  == -10){
  $first=0;}

    
 $result2 = mysqli_query($connection, "SELECT * FROM `news` GROUP BY `id` DESC LIMIT $first, $second");



 while(($title=mysqli_fetch_assoc($result2)))
{
?>

<div class="news-left"> <a href="/id/<?echo $title['id']?>" <center> <center> <img src= "<? echo $title['img']?>" class="img1"/> </center><span class="zagolovok"> <? echo $title['title']?> </span> </a>  <span class="spancontent"> <center> <?echo mb_substr(strip_tags($title['text']),0,125,'utf-8')?>... </center></span>  </div>
<?
}
?>

<?
  
$array_all=array();
$array_first5=array(); 
$min=0;
$max=0;
$er=false;
$ers=false;
?>


 <div class="perec">
    <ul>
        <center>
            <? 
            for($i=0;$i<$lastPage;$i++)
            {
                $array_all[]=$i+1;
                if ($i<5)
                   $array_first5[]=$i+1;
                
            }
            ?>
            <?
            
            for($i=0;$i<count($array_all);$i++){
                
    
          

      if ($page<$i+4 && $i<$page+2)
         {
              if($page>3 && $er==false ){
            ?>
            
              <li><a  href="?page=<?echo 1 ?>" class="q<? if ($str==1) echo 'yes' ?>" > <? echo 1 ?> </a></li>
              <li> ... </li>
             <?
             $er=true;
             }


             if($str==false)
             {
                 ?>
                  <li><a  href="/" class="q<? if ($str==false) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
                  <li><a  href="?page=<?echo $i+2?>" class="q<?if ($str==$i+2) echo 'yes' ?>" > <? echo $i+2 ?></a></li>
                  <li><a  href="?page=<?echo $i+3?>" class="q<?if ($str==$i+3) echo 'yes' ?>" > <? echo $i+3 ?></a></li>
                  <li><a  href="?page=<?echo $i+4?>" class="q<?if ($str==$i+4) echo 'yes' ?>" > <? echo $i+4 ?></a></li>
                  <li><a  href="?page=<?echo $i+5?>" class="q<?if ($str==$i+5) echo 'yes' ?>" > <? echo $i+5 ?></a></li>
                 <?
                 break;
             }
             
             else if($page==1)
             {
                 
                ?>
                  <li><a  href="?page=<?echo $i+1?>" class="q<?if ($str==$i+1) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
                  <li><a  href="?page=<?echo $i+2?>" class="q<?if ($str==$i+2) echo 'yes' ?>" > <? echo $i+2 ?></a></li>
                  <li><a  href="?page=<?echo $i+3?>" class="q<?if ($str==$i+3) echo 'yes' ?>" > <? echo $i+3 ?></a></li>
                  <li><a  href="?page=<?echo $i+4?>" class="q<?if ($str==$i+4) echo 'yes' ?>" > <? echo $i+4 ?></a></li>
                  <li><a  href="?page=<?echo $i+5?>" class="q<?if ($str==$i+5) echo 'yes' ?>" > <? echo $i+5 ?></a></li>
               <?
                  break;
             }
             else {
             ?>
             <li><a  href="?page=<?echo $i+1 ?>" class="q<? if ($str==$i+1) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
             
             <?

             }
    
                }
          
                }
                
                 if(count($array_all)>$page+2 && $ers==false ){
            ?>
            <li> ... </li>
              <li><a  href="?page=<?echo count($array_all)  ?>" class="q<? if ($str==count($array_all)) echo 'yes' ?>" > <? echo count($array_all) ?> </a></li>
              
             <?
             $ers=true;
            
             }
                ?>
             
     
         </center>
    </ul>
 </div>


