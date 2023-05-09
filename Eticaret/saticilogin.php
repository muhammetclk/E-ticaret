<?php

include ('baglanti.php');//baglanti.php yi bu dosyaya dahil ettik.

//hata meajlari bunda tutulucak.
$email_err="";
$parola_err="";


//eger giris butonuna basilirsa kaydetsin
if(isset($_POST["giris"])){

  
  //email dogrulama

  if(empty($_POST['email'])){
    $email_err='email alani bos geçilemez';
  }
  else{
    $email=htmlspecialchars($_POST['email']) ;
  }


  //parola dogrulama alani

  if(empty($_POST['parola'])){
    $parola_err='parola alani bos geçilemez';
  }
  else{
    $parola=htmlspecialchars($_POST['parola']);
  }

  //bu degerler girildiyse ekleme yapicak
  if(isset($email)&&isset($parola)){

    $secim="select * from Saticilar where Email ='$email'";//email unıque tanımlı yanı bir tane var
    $calistir=$db->query($secim);
   // $kayitsayisi=$calistir->rowCount();//eger etkilenen kayit sayisi 1 ise kulanici var 0 ise kullanici yoktur. 
   
    if($calistir->rowCount()){

        $ilgilikayit=$calistir->fetchAll(pdo::FETCH_ASSOC);
        //print_r($ilgilikayit);
        
        $sifre=$ilgilikayit[0]["Sifre"];
       // print_r($sifre);
        //print_r($parola);
        
        if($parola==$sifre){//parola ile sifre uyusuyormu

            //parola da dogruysa
            session_start();//oturum baslattik.
            $_SESSION["email"]=$ilgilikayit[0]["Email"];//kaydin emailini sessiona attik.
            $_SESSION["name"]=$ilgilikayit[0]["SaticiAd"];//bu degerleri veritabnindan cektigimiz degerden  aliyoruz.
            $_SESSION["surname"]=$ilgilikayit[0]["SaticiSoyad"];
            $_SESSION["SaticiId"]=$ilgilikayit[0]["SaticiId"];
            $_SESSION['UrunEklekontrol']=true; 
            $_SESSION['fiyat']=null;
            $_SESSION['sepet']=[];
            //daha sonra yonlendirme yapiyoruz.            
              header("location:saticiindex.php");
            
        }
        else{
            echo   '<div class="alert alert-danger" role="alert">
            yanlis email yada sifre 
            </div>';;

        }
    }
    else{
        echo   '<div class="alert alert-danger" role="alert">
        yanlis email yada sifre
        </div>';
    }
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

    <title>Satici login islemi</title>
  </head>
    <body >
                <div class="container">
                    <div class="card p-5 m-5">
                    <form action="saticilogin.php" method="POST">


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
               
                        <button type="submit" class="btn btn-primary" name="giris">Giris yap</button>
                    </form>
                    </div>
                </div>
    </body>
</html>
