<?php

include('baglanti.php');
   session_start();



   if($_GET){

    unset($_SESSION["sepet"][$_GET["sil"]]);  
        header('location:sepet.php');
 
    }
    
    


   ?>


   <!doctype html>
   <html lang="en">
     <head>
       <!-- Required meta tags -->
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
       <!-- Bootstrap CSS -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   <style>
    table { border-collapse: collapse;}
    th,td { padding: 5px}
   </style>


       <title>Ürünlerimiz</title>
     </head>
     <body>
       <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
           <a class="navbar-brand" href="<?php echo 'index.php' ?>">Müzik Dükkanim</a>
           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
           </button>
           <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
             <div class="navbar-nav">
               <a class="nav-link active" href="<?php echo 'index.php' ?>">Anasayfa <span class="sr-only">(current)</span></a>
               <a class="nav-link" href="<?php echo 'urunler.php' ?>">Ürünlerimiz</a>
               <a class="nav-link" href="<?php echo 'sepet.php' ?>">Sepetim</a>
               <a class="nav-link" href="<?php echo 'hesap.php' ?>" tabindex="-1" aria-disabled="true">Hesabim</a>
               <a class="nav-link" href="<?php echo 'cikis.php' ?>">Oturumu Kapat </a>

             </div>
           </div>
</nav>



           
<table border="1">

<thead>
  <th>Urun Ad</th>
  <th>BirimFiyat</th>
  <th>Adet</th>
  <th>Tutar</th>
  <th>Kaldir</th>
</thead>
<tbody>
      <?php

if(count($_SESSION['sepet'])!=0){
  $toplamtutar=[];
 echo  '<h1>Sepetiniz</h1>';
foreach($_SESSION['sepet'] as $value):?>
  <tr>
    <td><?php echo $value['UrunAd'];?></td>
    <td><?php echo $value['UrunFiyat'];?></td>
    <td><?php echo $value['adet'];?></td>
    <td><?php echo $value['adet']* $value['UrunFiyat'];?></td>
   <?php $toplamtutar[]= $value['adet']* $value['UrunFiyat'];?>
    <td><a href=" http://localhost/uyelik/deneme%20copy%202/sepet.php?sil=<?php echo $value['UrunId'];?>"> sil</a></td>
  </tr>
           
<?php endforeach;

}
else {
    echo 'sepet bos';
} ?>     


</tbody>
</table>

<?php
 
 if(count($_SESSION['sepet'])!=0){
  $_SESSION['Toplamtutar']=array_sum($toplamtutar);
echo 'Toplam Tutar='.$_SESSION['Toplamtutar'];?>

<form action="odeme.php" method="POST">

<button type="submit" class=" mt-5 ml-5" name="sepetionayla">sepeti onayla</button>
</form>
 <?php } ?>





</body>
</html>




