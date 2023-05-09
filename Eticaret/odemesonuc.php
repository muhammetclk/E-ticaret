<?php

include('baglanti.php');
session_start();




if(isset($_POST['odeme'])){

    $musteriid=intval($_SESSION['MusteriId']);
    //echo 'iceri girdi';
    
        $sql="insert into Siparisler (MusteriId) values('$musteriid')";
    $calistir=$db->query($sql);
    $sorgu2="select SiparisId from Siparisler where MusteriId=$musteriid";
    $calistir2=$db->query($sorgu2);
    $siparisid=$calistir2->fetch(pdo::FETCH_ASSOC);
    $siparisid=$db->lastInsertId();
   // var_dump($siparisid);
//print_r($siparisid);

    foreach($_SESSION['sepet'] as $value){
        $urunid=$value['UrunId'];   
        $birimfiyat=$value['UrunFiyat'];
        
        $miktar=$value['adet'];
        
        
        $sql2="insert into SiparisDetay (SiparisId,BirimFiyat,Miktar,UrunId) values('$siparisid','$birimfiyat','$miktar','$urunid')";
        $calistir3=$db->query($sql2);        
    }






}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
    table { border-collapse: collapse;}
    th,td { padding: 5px}
   </style>
    <title>Document</title>
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
  
</thead>
<tbody>
      <?php


  
 echo  '<h1>Faturaniz</h1>';
foreach($_SESSION['sepet'] as $value):?>
  <tr>
    <td><?php echo $value['UrunAd'];?></td>
    <td><?php echo $value['UrunFiyat'];?></td>
    <td><?php echo $value['adet'];?></td>
    <td><?php echo $value['adet']* $value['UrunFiyat'];?></td>
   
  </tr>
           
<?php endforeach;?>


</tbody>
</table>

<div><?php echo 'Toplam Tutar='.$_SESSION['Toplamtutar'].'<br>';
echo 'siparisiniz alinmistir.';
?></div>


    
</body>
</html>
