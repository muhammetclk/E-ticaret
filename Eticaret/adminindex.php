<?php
include('baglanti.php');
session_start();

if(!isset($_SESSION["name"])){
    header("location:login.php");   
}


if(isset($_POST['yedekle'])){

$sql="BACKUP DATABASE Eticaret TO DISK ='C:\Users\FIRAT\Eticaret.bak\Desktop'";
$execute=$db->query($sql);
echo 'buraya  girdi';
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
   
      <form action="adminindex.php" method="POST">

       <button type="submit" class="btn btn-primary" name="yedekle">veritabanini yedekle </button>
      </form>
  
        
              
  </body>
</html>


<?php





?>