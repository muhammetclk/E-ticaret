<?php

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
    <title>Anasayfa</title>
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
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img style="width:200px;height:506px;" src ="https://media.istockphoto.com/id/172210989/tr/foto%C4%9Fraf/two-hands-playing-acoustic-guitar.jpg?s=612x612&w=0&k=20&c=W3Z275Ave0GD_cKvtVepEDgWBv8sBLGjGyx_2X_gOPY=" class="d-block w-100 " alt="resim1">
          </div>
          <div class="carousel-item">
            <img style="width:200px;height:506px;" src="https://us.123rf.com/450wm/pakete/pakete2103/pakete210300005/pakete210300005.jpg?ver=6" class="d-block w-100" alt="resim2">
          </div>
          <div class="carousel-item">
            <img style="width:200px;height:506px;" src="https://st2.depositphotos.com/3562409/11347/i/950/depositphotos_113476568-stock-photo-ramadan-drum-and-drumstick-3d.jpg" class="d-block w-100" alt="resim3">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      <!-- Container start-->
      <div class="container mt-5">
        <div class="row"><!-- row start-->
            <div class="col-sm-6"><!-- about us start-->
                <img class="w-100 img-thumbnail" src="https://www.shutterstock.com/image-vector/music-notes-curves-swirls-vector-600w-1705493965.jpg" alt="">
            </div>
            <div class="col-sm-6">
                <h2>Hakkımızda</h2>
                <p>Bizler 2023 yilinda  muzigin hayatimizdaki yerini saglamlastirmak ve yaymak icin kurulmus bir sirketiz.Müzik enstrumalarini sizlere daha ucuz,saglam bir sekilde ulastirmak bizim  asli  gorevimizdir.Her sey muzik severler icin.  </p>
            </div><!-- about us end-->
        </div><!-- row end-->
  
        <div class="row mt-5"><!-- row start-->
             <div class="col-sm-4"><!-- products start-->
                <div class="card" style="width: 18rem;">
                    <img style="width:250px;height:180px;" src="https://www.shutterstock.com/image-photo/guitar-on-white-background-600w-531168481.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Gitar</h5>
                      <p class="card-text">Gitar calgi aletindeki urunlerimizi gormek icin lutfen incele butununa tiklayin.</p>
                      <a href="#" class="btn btn-primary">İncele</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img style="width:286px;height:180px;" src="https://www.shutterstock.com/image-photo/drums-clarion-on-white-background-600w-720120715.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Davul</h5>
                      <p class="card-text">Davul calgi aletindeki urunlerimizi gormek icin lutfen incele butununa tiklayin.</p>
                      <a href="#" class="btn btn-primary">İncele</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="width: 18rem;">
                    <img style="width:250px;height:180px;"  src="https://www.shutterstock.com/image-photo/beautiful-grand-piano-isolated-on-600w-1888645315.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Piyano</h5>
                      <p class="card-text">Piyano calgi aletindeki urunlerimizi gormek icin lutfen incele butununa tiklayin.</p>
                      <a href="#" class="btn btn-primary">İncele</a>
                    </div>
                </div>
            
               </div>
             <!-- Products end-->
        
        </div><!-- row end-->
        <!-- pictures start -->
        <div class="row mt-5 mb-5 ">
            <div class="col-sm"><img src="https://www.shutterstock.com/image-photo/pianist-playing-piece-on-grand-600w-1413111086.jpg" alt="" class="w-100 img-thumbnail"></div>
            <div class="col-sm"><img src="https://www.shutterstock.com/image-vector/vector-hand-drawn-set-middle-600w-1559094131.jpg" alt="" class="w-100 img-thumbnail"></div>
            <div class="col-sm"><img src="https://www.shutterstock.com/image-photo/wooden-retro-piano-green-leaves-600w-2018769551.jpg" alt="" class="w-100 img-thumbnail"></div>
            <div class="col-sm"><img src="https://www.shutterstock.com/image-photo/womans-hands-playing-acoustic-guitar-600w-441683599.jpg" alt="" class="w-100 img-thumbnail"></div>
            <div class="col-sm"><img src="https://www.shutterstock.com/image-photo/musician-playing-davul-black-white-600w-1368636560.jpg" alt="" class="w-100 img-thumbnail"></div>
        </div>
         <!-- pictures end -->
      </div><!-- Container end-->
           <!-- Footer start-->
           <div class="bg-dark text-light">
           <footer class="container py-5 ">
            <div class="row">
              <div class="col-12 col-md">
                <h2>Müzik Dükkanım</h2>
                <small class="d-block mb-3 text-muted">© 2020-2024</small>
              </div>
              <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Cool stuff</a></li>
                  <li><a class="text-muted" href="#">Random feature</a></li>
                  <li><a class="text-muted" href="#">Team feature</a></li>
                  <li><a class="text-muted" href="#">Stuff for developers</a></li>
                  <li><a class="text-muted" href="#">Another one</a></li>
                  <li><a class="text-muted" href="#">Last time</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Resource</a></li>
                  <li><a class="text-muted" href="#">Resource name</a></li>
                  <li><a class="text-muted" href="#">Another resource</a></li>
                  <li><a class="text-muted" href="#">Final resource</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>Resources</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Business</a></li>
                  <li><a class="text-muted" href="#">Education</a></li>
                  <li><a class="text-muted" href="#">Government</a></li>
                  <li><a class="text-muted" href="#">Gaming</a></li>
                </ul>
              </div>
              <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                  <li><a class="text-muted" href="#">Team</a></li>
                  <li><a class="text-muted" href="#">Locations</a></li>
                  <li><a class="text-muted" href="#">Privacy</a></li>
                  <li><a class="text-muted" href="#">Terms</a></li>
                </ul>
              </div>
            </div>
          </footer>
        </div>
          <!-- footer end-->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>