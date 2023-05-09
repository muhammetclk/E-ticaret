<?php
session_start();
if(!isset($_SESSION["aramadegeri"])){
    header("location:login.php");
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
          </div>
        </div>
      </nav>
</body>
</html>
<?php
$sonuclar=$_SESSION["aramadegeri"];
//print_r($sonuclar);
?>
<h1>Arama sonucunuz:</h1>
<div class="container">
      <div class="row mt-5 ">
    <?php foreach($sonuclar as $key=>$value):  ?>
          <div class="col-md-4 mt-5">
                <form action="urunler.php" method="POST">              
                <div class="card" style="width: 18rem;">
                    <img src="https://picsum.photos/id/163/600/400" class="card-img-top" alt="...">

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