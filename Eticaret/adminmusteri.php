<?php
include('baglanti.php');
session_start();

if(!isset($_SESSION["name"])){
    header("location:login.php");   
}


if($_GET){
$gelensilistegi=$_GET['sil'];
     $sorgu="Delete from Musteriler where MusteriId='$gelensilistegi'";
     $execute=$db->query($sorgu);
        header('location:adminmusteri.php');
 
    }

?>







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <style>
    table { border-collapse: collapse;}
    th,td { padding: 5px}
   </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Anasayfa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo 'adminindex.php' ?>">Müzik Dükkanim</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" href="<?php echo 'adminindex.php' ?>">Anasayfa <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="<?php echo 'adminsatici.php' ?>">saticilari goruntule</a>           
            <a class="nav-link" href="<?php echo 'adminmusteri.php' ?>" tabindex="-1" aria-disabled="true">Musteri goruntule </a>
            <a class="nav-link" href="<?php echo 'cikis.php' ?>">Oturumu Kapat </a>
          </div>
        </div>
      </nav>
   
<?php



$sql="select * from Musteriler";
      $calistir=$db->query($sql);
      $musteriler=$calistir->fetchAll(pdo::FETCH_ASSOC);

      
?>    
<table border="1">

<thead>
  <th>Musteri Id</th>
  <th>MusteriAd</th>
  <th>MusteriSoyad</th>
  <th>Eposta</th>
  <th>Adres</th>
  <th>Sifre </th>
  <th>Telefon</th>
  <th>KayitTarihi</th>
  <th>Ulke</th>
  <th>Sehir</th>
</thead>
<tbody>
      <?php


  
 
foreach($musteriler as $value):?>
  <tr>
    <td><?php echo $value['MusteriId'];?></td>
    <td><?php echo $value['MusteriAd'];?></td>
    <td><?php echo $value['MusteriSoyad'];?></td>
    <td><?php echo $value['Eposta']?></td>
    <td><?php echo $value['Adres'];?></td>
    <td><?php echo $value['Sifre'];?></td>
    <td><?php echo $value['Telefon'];?></td>
    <td><?php echo $value['KayitTarihi']?></td>
    <td><?php echo $value['Ulke'];?></td>
    <td><?php echo $value['Sehir'];?></td>
    
    <td><a href=" http://localhost/uyelik/deneme%20copy%202/adminmusteri.php?sil=<?php echo $value['MusteriId'];?>"> sil</a></td>
  </tr>
           
<?php endforeach;



 ?>     


</tbody>
</table>





        
              
  </body>
</html>


