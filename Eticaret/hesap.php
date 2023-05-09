<?php
include('baglanti.php');
session_start();
if(!isset($_SESSION["name"])){
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
      <?php
      $email=$_SESSION['email'];
      $sql="Select * from Musteriler where  Eposta = '$email'";
      $q=$db->query($sql);
      $user=$q->fetchAll(pdo::FETCH_ASSOC); 
      //print_r($user);
      $username_err="";
      $surname_err="";
      $parola_err="";
      $adres_err="";
      $country_err="";
      $city_err="";
      $tel_err="";
if(isset($_POST["guncelle"])){
  echo 'merhaba';
    //kullanici adi dogrulama
    if(empty($_POST['kullaniciadi'])){
    $username_err='Kullanici adi bos geçilemez';
    }
    elseif(strlen($_POST['kullaniciadi'])<3){
    $username_err='Kullanici adiniz en az 3 karakterden olusmalidir.';
    }
    elseif (!preg_match("/^([a-zA-Z' ]+)$/", $_POST['kullaniciadi'])) {
    $username_err="kullanici adi harflerden olusmalidir.";
    }
    else{
    $name=htmlspecialchars($_POST['kullaniciadi']) ;
    }

    //surname dogrulama
  if(empty($_POST['kullanicisoyadi'])){
    $surname_err='Soyad bos geçilemez';
  }
  elseif(strlen($_POST['kullanicisoyadi'])<=3){
    $surname_err='Soyadiniz en az 2 karakterden olusmalidir.';
  }
  elseif (!preg_match("/^([a-zA-Z' ]+)$/", $_POST['kullanicisoyadi'])) {
  $surname_err="Soyad harflerden olusmalidir.";
  }
  else{
    $surname=htmlspecialchars($_POST['kullanicisoyadi']) ;
  }

  //parola dogrulama alani

  if(empty($_POST['parola'])){
    $parola_err='parola alani bos geçilemez';
  }
  elseif(strlen($_POST['parola'])<6){
    $parola_err='parolaniz en az 6 karakterden olusmalidir.';
  }
  elseif (!preg_match('/^[a-z\d_]{5,20}$/i', $_POST['parola'])) {
    $parola_err='Parola buyuk/kucuk harf ve rakamlardan olusabilir.';
  }
  else{
    $parola=htmlspecialchars($_POST['parola']);
  }

  //adres dogrulama alani

  /*if(empty($_POST['adres'])){
    $adres_err='adres alani bos geçilemez';
  }*/
  
  if (!preg_match('/[A-Za-z0-9\-\\,.]+/',$_POST['adres'])) {
    $adres_err='adres buyuk/kucuk harflerden olusabilir.';
  }
  else{
    $adres=htmlspecialchars($_POST['adres']);
  }

  //ulke dogrulama alani

  /*if(empty($_POST['ulke'])){
    $country_err='adres alani bos geçilemez';
  }*/
  
  if (!preg_match("/^([a-zA-Z' ]+)$/",$_POST['ulke'])) {
    $country_err='ulke buyuk/kucuk harflerden olusabilir.';
  }
  else{
    $ulke=htmlspecialchars($_POST['ulke']);
  }

  //sehir dogrulama alani

  /*if(empty($_POST['sehir'])){
    $city_err='sehir alani bos geçilemez';
  }*/
  
  if (!preg_match("/^([a-zA-Z' ]+)$/",$_POST['sehir'])) {
    $city_err='sehir buyuk/kucuk harflerden olusabilir.';
  }
  else{
    $sehir=htmlspecialchars($_POST['sehir']);
  }

  //telefon dogrulama alani

  /*if(empty($_POST['telefon'])){
    $tel_err='telefon alani bos geçilemez';
  }*/
  
  if (!preg_match("/^\\+?[1-9][0-9]{7,14}$/",$_POST['telefon'])) {
    $tel_err='telefon sayilardan olusabilir ve en az 8 karakter den olusabilir..';
  }
  else{
    $telefon=htmlspecialchars($_POST['telefon']);
  }

  if(isset($parola)&&isset($name)&&isset($surname)&&isset($sehir)&&isset($ulke)&&isset($adres)&&isset($telefon)){
    $aktifemail=$_SESSION['email'];
  
    $sql="Update  Musteriler set Sifre='$parola',MusteriAd='$name',MusteriSoyad='$surname',Sehir='$sehir',Ulke='$ulke',Adres='$adres',Telefon='$telefon' where Eposta='$aktifemail'";
    $calistir=$db->query($sql);
    if(true){
      echo   '<div class="alert alert-succes" role="alert">
        Guncelleme basarili
        </div>';
        header('location:hesap.php');
    }
}
}
      ?>
      <div class="container">
                    <div class="card p-5 m-5">
                    <form action="hesap.php" method="POST">
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kullanici Ad</label>
                        <input type="text" value="<?=$user[0]['MusteriAd']?>" class="form-control form-control 
                        <?php if(!empty($username_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="kullaniciadi"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $username_err;  ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kullanici Soyad</label>
                        <input type="text" value="<?=$user[0]['MusteriSoyad']?>" class="form-control form-control 
                        <?php if(!empty($surname_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="kullanicisoyadi"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $surname_err; ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label" >E-Posta</label>
                        <input type="text" aria-disabled="true" value="<?=$user[0]['Eposta']?>" class="form-control form-control 
                        <?php if(!empty($email_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="email"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $email_err; ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Adres</label>
                        <input type="text" value="<?=$user[0]['Adres']?>" class="form-control form-control 
                        <?php if(!empty($adres_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="adres"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $adres_err; ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Ulke</label>
                        <input type="text" value="<?=$user[0]['Ulke']?>" class="form-control form-control 
                        <?php if(!empty($country_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="ulke"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $country_err;  ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Sehir</label>
                        <input type="text" value="<?=$user[0]['Sehir']?>" class="form-control form-control 
                        <?php if(!empty($city_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="sehir"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $city_err;  ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Telefon</label>
                        <input type="text" value="<?=$user[0]['Telefon']?>" class="form-control form-control 
                        <?php if(!empty($tel_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="telefon"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $tel_err;  ?> 
                        </div>
                        </div>
               
                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Parola</label>
                        <input type="password" value="<?=$user[0]['Sifre']?>" class="form-control form-control 
                        <?php if(!empty($parola_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputPassword1" name="parola">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $parola_err; ?>
                        </div>
                        </div>
               
                        <button type="submit" class="btn btn-primary" name="guncelle">Guncelle</button>
                    </form>
                    </div>
                </div>
  </body>
</html>





