<?php
include('baglanti.php');
session_start();

if(!isset($_SESSION["name"])){
    header("location:login.php");   
}


if($_GET){
$gelensilistegi=$_GET['sil'];

$sorgu3="select * from Saticilar where SaticiId='$gelensilistegi'";
$execute2=$db->query($sorgu3);
$sonuc=$execute2->fetchAll(pdo::FETCH_ASSOC);

     $sorgu="Delete from Saticilar where SaticiId='$gelensilistegi'";
     $execute=$db->query($sorgu);
     
     foreach($sonuc as $value){
      
      $ad= $value['SaticiAd'];
      echo $ad;
      $soyad=  $value['SaticiSoyad'];
      $adres= $value['Adres'];
      $ulke= $value['Ulke'];
      $sehir=  $value['Sehir'];
      $email=  $value['Email'];
      $sifre=  $value['Sifre'];
      $telefon=  $value['Telefon'];
      $kayittarihi=  $value['KayitTarihi'];
      $sirketad=  $value['SirketAdi'];

     }

$sorgu2="insert into  silinmissaticikayitlari values('$gelensilistegi','$ad','$soyad','$adres','$ulke','$sehir','$email','$sifre','$telefon','$kayittarihi','$sirketad')";
$execute3=$db->query($sorgu2);
        header('location:adminsatici.php');
 
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



$sql="select * from Saticilar";
      $calistir=$db->query($sql);
      $saticilar=$calistir->fetchAll(pdo::FETCH_ASSOC);

      
?>    
<table border="1">

<thead>
  <th>Satici Id</th>
  <th>SaticiAd</th>
  <th>SaticiSoyad</th>
  <th>Adres</th>
  <th>Ulke</th>
  <th>Sehir </th>
  <th>Email</th>
  <th>Sifre</th>
  <th>Telefon</th>
  <th>KayitTarihi</th>
  <th>SirketAdi</th>

</thead>
<tbody>
      <?php


  
 
foreach($saticilar as $value):?>
  <tr>
    <td><?php echo $value['SaticiId'];?></td>
    <td><?php echo $value['SaticiAd'];?></td>
    <td><?php echo $value['SaticiSoyad'];?></td>
    <td><?php echo $value['Adres']?></td>
    <td><?php echo $value['Ulke'];?></td>
    <td><?php echo $value['Sehir'];?></td>
    <td><?php echo $value['Email'];?></td>
    <td><?php echo $value['Sifre']?></td>
    <td><?php echo $value['Telefon'];?></td>
    <td><?php echo $value['KayitTarihi'];?></td>
    <td><?php echo $value['SirketAdi']?></td>
    <td><a href=" http://localhost/uyelik/deneme%20copy%202/adminsatici.php?sil=<?php echo $value['SaticiId'];?>"> sil</a></td>
  </tr>
           
<?php endforeach;



 ?>     


</tbody>
</table>





        
              
  </body>
</html>


