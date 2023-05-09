<?php


session_start();



if(isset($_SESSION['MusteriId'])){
    $_SESSION=array();//sessionu bosaltiyoruz.aldıgımız verileri temizliyoruz.
$_COOKIE=array();
    session_destroy();
  header("location:login.php");  
}
if(isset($_SESSION['SaticiId'])){
    $_SESSION=array();//sessionu bosaltiyoruz.aldıgımız verileri temizliyoruz.
$_COOKIE=array();
    session_destroy();
    header("location:saticilogin.php");  
  }