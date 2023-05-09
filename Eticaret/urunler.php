<?php
include('baglanti.php');

session_start();

if(!isset($_SESSION["name"])){

  header("location:login.php");
  
}

$arama_err="";
if(isset($_POST["ara"])){


  //urun arama kismi
//parola dogrulama alani

if(empty($_POST['arama'])){
  $arama_err='arama alani bos geçilemez';
}

elseif (!preg_match('/^[A-Za-z]{0,100}$/i', $_POST['arama'])) {
  $arama_err='arama buyuk/kucuk harf ve rakamlardan olusabilir.';
}
else{
  $kelime=htmlspecialchars($_POST['arama']);
}


if(isset($kelime)){
print_r($kelime); 
$sql="select UrunAd,Fiyat,UrunId from Urunler where UrunAd like '%$kelime%' or UrunAd like '$kelime%' or UrunAd like '%$kelime'  ";
$calistir=$db->query($sql);
$sonuclar=$calistir->fetchAll(pdo::FETCH_ASSOC);
if($sonuclar!=null){
  $_SESSION['aramadegeri']=$sonuclar;
  header('location:arama.php');
}
}
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


             <form class="d-flex ml-5" action="urunler.php" method="POST">
                <input class="form-control me-2 <?php if(!empty($arama_err)){echo 'is-invalid';}   ?>" type="search" name="arama"    placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" name="ara" type="submit">Search</button>
            </form>

          </div>
        </div>
      </nav>

      <?php

    
        $sorgu="Select * from Urunler";
        $calistir=$db->query($sorgu);
        $urunler= $calistir->fetchAll(pdo::FETCH_ASSOC);
      



        if(isset($_POST["sepeteat"])){
          
       print_r($_POST['Fiyat']);
       print_r($_POST["UrunId"]);
       
        //urun ekleme
        if($_POST['Fiyat']!=null&& $_SESSION['UrunEklekontrol']!=false ){

          if(true){
        // $sayi=intval($_POST['sayi']);
        // print_r($sayi);
        
           
      
          // $_SESSION['UrunEklekontrol']=false;
          $urun=array(
            
            "UrunAd"=>$_POST['UrunAd'],
           "adet"=>intval($_POST['adet']),
           "UrunFiyat"=>intval($_POST['Fiyat']),
           "UrunId"=>intval($_POST['UrunId'])

          );
      
          }

          $_SESSION['sepet'][$_POST['UrunId']]=$urun;
          

        } }
      
      ?>
    

    <div class="container">
      <div class="row mt-5 ">
    <?php foreach($urunler as $key=>$value):  ?>
          <div class="col-md-4 mt-5">
                <form action="urunler.php" method="POST">              
                <div class="card" style="width: 18rem;">
                    <img style="width:286px;height:200px;" src="<?=$value['urunfoto']  ?>" class="card-img-top" alt="...">
                       
                    <div class="card-body">                                    
                      <input readonly type="text" name="UrunAd" value="<?=$value['UrunAd']  ?>" >
                      <input readonly  type="number" name="Fiyat" id="Fiyat" value="<?=$value['Fiyat']  ?>"   >
                      <input style="display:none;" type="number"  name="UrunId" value="<?=$value['UrunId']  ?>"  >
                      <input type="number" name="adet" value="1" >                   
                      <button type="submit" name="sepeteat" >sepete ekle </button>                                           
                    
                    </div>
                </div>
              </form>
                
            </div><?php endforeach; ?>
          </div>
      </div>

  </body>
</html>

