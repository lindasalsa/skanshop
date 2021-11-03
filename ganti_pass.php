<?php
    //koneksi Database
    $server= "localhost";
    $user= "root";
    $pass= "";
    $database= "skanshop";

    $koneksi= mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));


//jika tombol simpan di klik
//print_r($_POST);exit
if(isset($_POST['bsimpan']))
{
    //pengujian apakah data akan diedit atau disimpan baru
    
    $lokasifoto='image/';
    $namafoto = "";
    if(isset($_FILES['tfoto']['name'])) {
      $namafoto=@$_FILES['tfoto']['name'];
      move_uploaded_file($_FILES['tfoto']['tmp_name'],$lokasifoto.$namafoto);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <style>
      body {height: 60vmax; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
      
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="registrasi.css">
    <title>Ganti Password</title>
  </head>
  <body>
      <p><H2 class="text-center">Pilih Kata Sandi Baru</H2></p>
      <hr>
      <h6 class="text-center">Kata sandi yang kuat adalah gabungan huruf dan tanda baca.
          <br> Panjang kata sandi setidaknya 6 karakter.</h6>
  <div class="container">
    <form>
  <div class="form-group">
  <label>Password Baru</label>
  <input type="text" name="" class="form-control">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="text" name="" class="form-control">
    </div>
  <div class="form-group">
  <div class="text-end mt-5">
  <a id="Login" type="login" class="btn btn-primary" href="login.html" role="button">Lanjutkan</a>
  <a id="id" type="login" class="btn btn-primary" href="login.html" role="button">Kembali</a>
  </div>
  </form>
  


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
</html>