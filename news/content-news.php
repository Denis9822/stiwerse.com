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



<li> <? if($cat['id']==2) echo '<a href="/"'; else { ?><a href="../cat/cat.php?page=<?echo 1?>?<?echo $cat['id'];}?>"   class="s<?php if ($f==$cat['id']) echo 'active';?>"> <? echo $cat['name']; ?>  </a></li>

</ul>



<?
}
?>
</div>

</br></br></br>

<div class="content-news">
     <div class = "content-news-news">
        <?
        
         $result1 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id'] ) ;
          
          if(mysqli_num_rows($result1)==0)
{
    ?>
    <center><h1> <?echo "Данной статьи не найдено!!!" ?></h1> </center>
    
    <?
  exit();
    
}
          
         while( $news = mysqli_fetch_assoc($result1) )
         {
             ?>
            <div class="content-news-title"> <? echo $news['title']?> </div>
             <hr></br></br>
             <div class="content-news-content"> <? echo $news['text']; ?> </div>
             </br>
              <hr> 
              </br>
             <div class ="content-news-media">
                 <div class="content-news-data"> Дата публикации:  <? echo $news['date']; ?>  </div>
                  <div class="content-news-view"> Просмотров:   </div>
                  <div class="content-news-views"><? echo $news['view']; ?> </div>
               
             </div>
             
             <?
             $result3 = mysqli_query($connection, 'SELECT * FROM `category` WHERE `id`='.$news['category_id'] ) ;
             
             $cat1 = mysqli_fetch_assoc($result3)
             ?>
            <div class="content-news-category"> Категория: <a href="../cat/cat.php?page=<?echo 1?>?<?echo $cat1['id'];?>"> <? echo $cat1['name']; ?> </a> </div>
            
            
                 <?
             }
             
             
            ?>
            
            <br/><br/>
            <br/>
            <span class="readmore">ЧИТАЙТЕ ТАКЖЕ: </span>
            <br/><hr/>
            
            <?
            
            if($_GET['id']>3)
            {
             $result4 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id'].-1);
             $result5 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id'].-2 );
             $result6 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id'].-3 ); 
            }
            else
             {
              $result4 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id']++);
              $result5 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id']++);
              $result6 = mysqli_query($connection, 'SELECT * FROM `news` WHERE `id`='.$_GET['id']++);
             }

           $read = mysqli_fetch_assoc($result4);
           $read1 = mysqli_fetch_assoc($result5);
           $read2 = mysqli_fetch_assoc($result6);
            
            ?>
            
            <div class="read"> 
                <a href="/id/<?echo $read['id'] ?>" <center><center> <img  src=  "../<? echo $read['img']?>" class="img3"/> </center><span class="zagolovokss">  <? echo $read['title'] ?> </span> </a>
            </div>
            
            <div class="read"> 
                <a href="/id/<?echo $read1['id'] ?>" <center><center> <img  src=  "../<? echo $read1['img']?>" class="img3"/> </center><span class="zagolovokss">  <? echo $read1['title'] ?> </span> </a>
            </div>
            
            <div class="read"> 
                <a href="/id/<?echo $read2['id'] ?>" <center><center> <img  src=  "../<? echo $read2['img']?>" class="img3"/> </center><span class="zagolovokss">  <? echo $read2['title'] ?> </span> </a>
            </div>
      
            
            

    </div>
    
     <div class="content-news-rigth">
        <div class="content-news-rigth-zagolovok"> <center>Самые популярные новости </center>  </div>
         
         <?
        $result2 = mysqli_query($connection, "SELECT * FROM `news` GROUP BY `view` DESC LIMIT 5"  ) ;
         
         while( $popular = mysqli_fetch_assoc($result2) )  
         {
         ?>
         
        <div class="content-news-rigth-popular-news">
            
           <a href="/id/<?echo $popular['id'] ?>" <center><center> <img  src=  "../<? echo $popular['img']?>" class="img2"/> </center><span class="zagolovoks">  <? echo $popular['title'] ?> </span> </a>
        </div>
        <?
         }
         ?>
         
    </div>



</div>

