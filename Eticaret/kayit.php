<?php

include ('baglanti.php');//baglanti.php yi bu dosyaya dahil ettik.

//hata meajlari bunda tutulucak.
$username_err="";
$surname_err="";
$email_err="";
$parola_err="";
$parolatkr_err="";

//eger kaydet butonuna basilirsa kaydetsin
if(isset($_POST["kaydet"])){

  //kullanici adi dogrulama
  if(empty($_POST['kullaniciadi'])){
    $username_err='Kullanici adi bos geçilemez';
  }
  elseif(strlen($_POST['kullaniciadi'])<3){
    $username_err='Kullanici adiniz en az 3 karakterden olusmalidir.';
  }
  elseif (!preg_match('/[A-Za-z]{3,30}$/', $_POST['kullaniciadi'])) {
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
  elseif (!preg_match('/[A-Za-z]{3,30}$/', $_POST['kullanicisoyadi'])) {
  $surname_err="Soyad harflerden olusmalidir.";
  }
  else{
    $surname=htmlspecialchars($_POST['kullanicisoyadi']) ;
  }


  //email dogrulama

  if(empty($_POST['email'])){
    $email_err='email alani bos geçilemez';
  }
  elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $email_err = "hatali email formati";
  }
  else{
    $email=htmlspecialchars($_POST['email']) ;
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

  //parola tekrar dogrulamasi

  if(empty($_POST['parolatkr'])){
    $parolatkr_err='parola tekrar alani bos geçilemez';
  }
  elseif($_POST['parola'] !=$_POST['parolatkr'] ){
    $parolatkr_err='parola eslesmesi saglanamadi.';
  }
  else{
    $parolatkr=htmlspecialchars($_POST['parolatkr']);
  }
  
  //bu degerler girildiyse ekleme yapicak
  if(isset($name)&&isset($surname)&&isset($email)&&isset($parola)){

      $ekle="insert into Musteriler (MusteriAd,MusteriSoyad,Eposta,Sifre) values('$name','$surname','$email','$parola')";
  $calistirekle=$db->query($ekle);
  if($calistirekle){
     echo '<div class="alert alert-success" role="alert">
      kayit basarili sekilde eklendi
      </div>';
  }
  else{
      echo '<div class="alert alert-danger" role="alert">
      kayit basarisiz oldu
      </div>';
  }
  // $users=$calistirekle->fetchAll(pdo::FETCH_ASSOC);
  //print_r($users);
  }

}

?>

<!doctype html>
<html lang="tr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Uye kayit islemi</title>
  </head>
    <body >
                <div class="container">
                    <div class="card p-5 m-5">
                    <form action="kayit.php" method="POST">

                        <div class="mb-3">
                        <label for="exampleInputEmail2" class="form-label">Kullanici Ad</label>
                        <input type="text" class="form-control form-control 
                        <?php if(!empty($username_err)){
                          echo 'is-invalid';
                        }   ?>                 
                        " id="exampleInputEmail2" name="kullaniciadi"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">                        <?php echo $username_err; ?><!--degiskenin icine hangi deger geldiyse onu yazdiricak.-->
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail3" class="form-label">Kullanici Soyad</label>
                        <input type="text" class="form-control form-control
                        <?php if(!empty($surname_err)){ echo 'is-invalid';}  ?>
                        " id="exampleInputEmail3" name="kullanicisoyadi"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $surname_err; ?>
                        </div>
                        </div>


                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="text" class="form-control form-control 
                        <?php if(!empty($email_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="email"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $email_err; ?>
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Parola</label>
                        <input type="password" class="form-control form-control 
                        <?php if(!empty($parola_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputPassword1" name="parola">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $parola_err; ?>
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Parola tekrar</label>
                        <input type="password" class="form-control form-control
                        <?php if(!empty($parolatkr_err)){echo 'is-invalid';}   ?>                        
                        " id="exampleInputPassword1" name="parolatkr">
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $parolatkr_err; ?>
                        </div>
                        </div>
           
                        <button type="submit" class="btn btn-primary" name="kaydet">Kaydet</button>
                    </form>
                    </div>
                </div>
    </body>
</html>