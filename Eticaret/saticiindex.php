<?php

session_start();
if(!isset($_SESSION["SaticiId"])){
    header("location:saticilogin.php");   
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
    <title>Anasayfa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo 'saticiindex.php' ?>">Müzik Dükkanim</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" href="<?php echo 'saticiindex.php' ?>">Anasayfa <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="<?php echo 'saticiurun.php' ?>">Ürünlerini goruntule</a>           
            <a class="nav-link" href="<?php echo 'urunekle.php' ?>" tabindex="-1" aria-disabled="true">Urun ekle</a>
            <a class="nav-link" href="<?php echo 'cikis.php' ?>">Oturumu Kapat </a>
          </div>
        </div>
      </nav>
   
  
        
              
  </body>
</html>


<?php

echo 'Merhaba '.$_SESSION['name']." ".$_SESSION['surname']." Hosgeldin";



?>