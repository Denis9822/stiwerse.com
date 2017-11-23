<?

  require_once('../include.php');

 $result = mysqli_query($connection, "SELECT * FROM `category`");


?>

<div  class="menu">

<?
while($cat = mysqli_fetch_assoc($result) )
{
?>



 
<ul class="sq">




<li> <? if($cat['id']==2) echo '<a href="/"'; else { ?><a href="../cat/cat?page=<?echo 1?>?<?echo $cat['id'];}?>"   class="s<?php if ($f==$cat['id']) echo 'active';?>"> <? echo $cat['name']; ?>  </a></li>

</ul>



<?
}
?>
</div>
</br></br></br>
 

 <?






 $id_page= $_GET['page'];
$pieces = explode("?", $id_page);

if($_GET['id']==true)
$result10= mysqli_query($connection, "SELECT * FROM `news` WHERE `category_id`=".$_GET['id']);
else
$result10= mysqli_query($connection, "SELECT * FROM `news` WHERE `category_id`=".$pieces[1]);

if(mysqli_num_rows($result10)==0)
{
    ?>
    <center><h1> <?echo "Статей не найдено!!!" ?></h1> </center>
    
    <?
  
    
}

  $page = $pieces[0];
  $idcat = $pieces[1];
    $first =$page*10-10;
    $second = 10;
    
  $messOnPage=10;

   $countPost=mysqli_num_rows($result10);
   $lastPage = ceil($countPost / $messOnPage);
   $id_cat= $_GET['id'];
   

   


 if($first  == -10){
  $first=0;}
if ($id_page==false)
  $result5 = mysqli_query($connection, "SELECT * FROM `news` WHERE `category_id`=". $id_cat." GROUP BY `id` DESC LIMIT 10");
else 
  $result5 = mysqli_query($connection, "SELECT * FROM `news` WHERE `category_id`=".$pieces[1]." GROUP BY `id` DESC LIMIT $first, $second");
  
 while(($cats_news=mysqli_fetch_assoc($result5)))
{
?>
<div class="news-left"> <a href="../id/<? echo $cats_news['id']?>" <center> <center> <img src= "../<? echo $cats_news['img']?>" class="img1"/> </center><span class="zagolovok"> <? echo $cats_news['title']?> </span> </a>  <span class="spancontent"> <center> <?echo mb_substr(strip_tags($cats_news['text']),0,125,'utf-8')?>... </center></span>  </div>

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
            
            
            for($i=0;$i<count($array_all);$i++)
            {
            
                    
                   if(count($array_all)<=5)
                   {     
                   
                        if($_GET['id']==true)
                        { 
                            ?>
                                <li><a href="?page=<?echo $i+1?>?<?echo $_GET['id'] ?>" class="q<? if ($str==$i+1) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
                            <?
                        }
                        else
                        {
                            ?>
                                <li><a href="?page=<?echo $i+1?>?<?echo $pieces[1] ?>" class="q<? if ($str==$i+1) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
                            <?
                        }
          
                    }
                    else
                    {
                        
                        if ($page<$i+4 && $i<$page+2)
                        {
                                    if($_GET['id']==true)
                                    { 
                                    
                                         if($page>3 && $er==false )
                                         {
                                            ?>
                                              <li><a  href="?id=<?echo $_GET['id']?>" class="q<? if ($str==0) echo 'yes' ?>" > <? echo 1 ?> </a></li>
                                              <li> ... </li>
                                             <?
                                             $er=true;
                                         }
                                         
                                         ?>
                                         <li><a  href="?page=<?echo $i+1?>?<?echo $_GET['id'] ?>" class="q<? if ($str==$i+1) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
                                         <?
                                        
                                      
                                         
                                    }
                                    else
                                    {
                                    
                                         if($page>3 && $er==false )
                                         {
                                            ?>
                                              <li><a  href="?page=<?echo 1?>?<?echo $pieces[1] ?>" class="q<? if ($str==1) echo 'yes' ?>" > <? echo 1 ?> </a></li>
                                              <li> ... </li>
                                             <?
                                             $er=true;
                                         }
                                         
                                         ?>
                                         <li><a  href="?page=<?echo $i+1?>?<?echo $pieces[1] ?>" class="q<? if ($str==$i+1) echo 'yes' ?>" > <? echo $i+1 ?></a></li>
                                         <?
                                      
                                         
                                    }
                             
                        }
                    
                
            }
            }
            
            
                            if($_GET['id']==true)
                                    { 
                                         if(count($array_all)>$page+2 && $ers==false )
                                         {
                                            ?>
                                            <li> ... </li>
                                              <li><a  href="?page=<?echo count($array_all)?>?<?echo $_GET['id']?>" class="q<? if ($str==count($array_all)) echo 'yes' ?>" > <? echo count($array_all) ?> </a></li>
                                              
                                             <?
                                             $ers=true;
                                            
                                         }
            
                                    }
                                    else
                                    {
                                      if(count($array_all)>$page+2 && $ers==false )
                                         {
                                            ?>
                                            <li> ... </li>
                                              <li><a  href="?page=<?echo count($array_all)?>?<?echo $pieces[1]?>" class="q<? if ($str==count($array_all)) echo 'yes' ?>" > <? echo count($array_all) ?> </a></li>
                                              
                                              <?
                                             
                                             $ers=true;
                                            
                                         }
                                        
                                    }
            
                ?>
             
     
         </center>
    </ul>
 </div>


