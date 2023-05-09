<?php
session_start();
include('baglanti.php');

if(!isset($_SESSION['name'])){
    header("location:login.php");

}

if(count($_SESSION['sepet'])==0){
    header("location:sepet.php");
}
if(!isset($_SESSION['Toplamtutar'])){
    header("location:sepet.php");

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
      <body class="bg-light">
    
<div class="container">
  <main>
   
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Sepet</span>
          
        </h4>
        <ul class="list-group mb-3">
                <?php
                 foreach($_SESSION['sepet'] as $value):?>
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">Urun Adi</h6>
              <small class="text-muted"><?php echo $value['UrunAd'];?></small>
            </div>
            <span class="text-muted"><?php echo $value['adet']* $value['UrunFiyat'];?></span>
          </li>
          <?php endforeach;?>
         
          <li class="list-group-item d-flex justify-content-between">
            <span>Toplam Tutar</span>
            <strong><?php echo 'Toplam Tutar='.$_SESSION['Toplamtutar'];?></strong>
          </li>
        </ul>

       
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Fatura Adresi</h4>
        <form class="needs-validation" novalidate action="odemesonuc.php" method="POST">
          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Ad</label>
              <input type="text" class="form-control" id="firstName" placeholder="" value="<?= $_SESSION['name'] ?>" required readonly>
              
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Soyad </label>
              <input type="text" class="form-control" id="lastName" placeholder="" value="<?= $_SESSION['surname'] ?>" required readonly>
              
            </div>

            

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?= $_SESSION['email'] ?>" readonly>
            
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Adres</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required readonly value="<?= $_SESSION['adres'] ?>">
              
            </div>

           
            <div class="col-md-5">
              <label for="country" class="form-label">Ulke</label>
              <select class="form-select" id="country" required>
                <option value="">Secin...</option>
                <option>Turkiye</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>

            <div class="col-md-4">
              <label for="state" class="form-label">Sehir</label>
              <select class="form-select" id="state" required>
                <option value="">Secin...</option>
                <option>Istanbul</option>
                <option>Duzce</option>
              </select>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>

          
          </div>

          <hr class="my-4">

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Odeme adresi ile fatura adresi ayni yer</label>
          </div>

          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="save-info">
            <label class="form-check-label" for="save-info">Bu bilgiyi bir dahaki sefer icin sakla</label>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Odeme</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">Kredi Karti</label>
            </div>
            <div class="form-check">
              <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="debit">Banka karti</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">PayPal</label>
            </div>
          </div>

          <div class="row gy-3">
            <div class="col-md-6">
              <label for="cc-name" class="form-label">karttaki ad</label>
              <input type="text" class="form-control" id="cc-name" placeholder="" required>
              <small class="text-muted">Full name as displayed on card</small>
              <div class="invalid-feedback">
                Name on card is required
              </div>
            </div>

            <div class="col-md-6">
              <label for="cc-number" class="form-label">kredi karti numarasi</label>
              <input type="text" class="form-control" id="cc-number" placeholder="" required>
              <div class="invalid-feedback">
                Credit card number is required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-expiration" class="form-label">son kullanma tarihi </label>
              <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
              <div class="invalid-feedback">
                Expiration date required
              </div>
            </div>

            <div class="col-md-3">
              <label for="cc-cvv" class="form-label">CVV</label>
              <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
              <div class="invalid-feedback">
                Security code required
              </div>
            </div>
          </div>

          <hr class="my-4">
          
          <button class="w-100 btn btn-primary btn-lg" type="submit" name="odeme">Odeme Yap</button>
          



        </form>
      </div>
    </div>
  </main>

  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2017–2021 Company Name</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="#">Privacy</a></li>
      <li class="list-inline-item"><a href="#">Terms</a></li>
      <li class="list-inline-item"><a href="#">Support</a></li>
    </ul>
  </footer>
</div>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <script src="form-validation.js"></script>













</body>
</html>