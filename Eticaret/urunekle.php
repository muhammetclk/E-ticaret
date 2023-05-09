<?php
include('baglanti.php');

session_start();
if(!isset($_SESSION["SaticiId"])){
    header("location:saticilogin.php");   
}


$urunad_err="";
$stok_err="";
$urunozellik_err="";
$fiyat_err="";
if(isset($_POST['urunekle'])){

    $marka=$_POST['marka'];
    $kategori=$_POST['kategori'];
    if($marka=='Casio'){
        $marka=1;
    }
    elseif($marka=='Admira'){
        $marka=2;
    }
    elseif($marka=='Yamaha'){
        $marka=3;
    }

    if($marka=='Piyano'){
        $marka=1;
    }
    elseif($marka=='Gitar'){
        $marka=2;
    }
    elseif($marka=='Davul'){
        $marka=3;
    }

    if(empty($_POST['urunad'])){
        $urunad_err='urun  adi bos geçilemez';
        }
        elseif(strlen($_POST['urunad'])<3){
        $urunad_err='urun ad  en az 3 karakterden olusmalidir.';
        }
        elseif (!preg_match('/^[A-Za-z]{0,100}$/i', $_POST['urunad'])) {
            $urunad_err="urun adi  harflerden ve rakamlardan  olusabilir..";
        }
        else{
        $urunad=htmlspecialchars($_POST['urunad']) ;
        }


        if(empty($_POST['stok'])){
            $stok_err='stok adedi bos geçilemez';
            }
           
            elseif (!preg_match("/^\\+?[1-9][0-9][0-9]$/",$_POST['stok'])) {
                $stok_err="stok  rakamlardan olusmalidir. 3 basamakli deger  girilebilir.";
            }
            else{
            $stok=htmlspecialchars($_POST['stok']) ;
            }


        if(empty($_POST['urunozellik'])){
            $urunozellik_err='urun ozellik bos geçilemez';
                }
               
            elseif (!preg_match('/^[A-Za-z]{0,100}$/i', $_POST['urunozellik'])) {
                    $urunozellik_err="urun ozelllik  harflerden ve rakamlardan olusabilir.";
                }
                else{
                $urunozellik=htmlspecialchars($_POST['urunozellik']) ;
                }



        if(empty($_POST['fiyat'])){
                $fiyat_err='fiyat bos geçilemez';
                    }
                   
                elseif (!preg_match("/^\\+?[1-9][0-9]{1,14}$/",$_POST['fiyat'])) {
                        $fiyat_err="fiyat  rakamlardan olusmalidir.";
                }
                else{
                    $fiyat=htmlspecialchars($_POST['fiyat']) ;
                    }

        if(isset($urunad)&&isset($marka)&&isset($kategori)&&isset($fiyat)&&isset($urunozellik)&&isset($stok)){

            $saticiid=$_SESSION['SaticiId'];
            $sql="insert  into Urunler values('$urunad','$kategori','$fiyat','$stok','$saticiid','$marka','$urunozellik')";
            $calistir=$db->query($sql);
             header('Location:urunekle.php');
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
   

      <div class="container">
                    <div class="card p-5 m-5">
                    <form action="urunekle.php" method="POST">
                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Urun Ad</label>
                        <input type="text" value="" class="form-control form-control 
                        <?php if(!empty($urunad_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="urunad"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $urunad_err;  ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <select name="marka" id="urunmarka">
                            <option value="1">Casio</option>
                            <option value="2">Admira</option>
                            <option value="3">Yamaha</option>
                        </select>
                        
                        </div>
                        

                        <div class="mb-3">
                        <select name="kategori" id="urunkategori">
                            <option value="1">Piyano</option>
                            <option value="2">Gitar</option>
                            <option value="3">Davul</option>
                        </select>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">stok</label>
                        <input type="number" value="" class="form-control form-control 
                        <?php if(!empty($stok_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="stok"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $stok_err; ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">urunozellik</label>
                        <input type="text" value="" class="form-control form-control 
                        <?php if(!empty($urunozellik_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="urunozellik"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $urunozellik_err;  ?> 
                        </div>
                        </div>

                        <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">fiyat</label>
                        <input type="number" value="" class="form-control form-control 
                        <?php if(!empty($fiyat_err)){echo 'is-invalid';}   ?>                         
                        " id="exampleInputEmail1" name="fiyat"> 
                        <div id="validationServer03Feedback" class="invalid-feedback">
                        <?php echo $fiyat_err;  ?> 
                        </div>
                        </div>

                        
    
               
                        <button type="submit" class="btn btn-primary" name="urunekle">Urun ekle</button>
                    </form>
                    </div>
                </div>


  
        
              
  </body>
</html>