<?php

session_start();
if(empty($_SESSION['user'])) {
  header("location: index.php?status=gagal");
}else{
  $user = $_SESSION['user'];
}

?>

<!doctype html>
<html lang="en">
  <head>
    <style>
      body {height: 200vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
      
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="php.css">
    <title>home</title>
  </head>
  <body>
    <div class="container">
        <h2 class="text-center">SkanShop</h2>
        <p>Selamat Datang, <b><?php echo $user['nama']; ?></b></p>
        <p class="text-end"><a href="logout.php">Logout</a></p>
  </div>
  
  <!-- As a heading -->
    <div class="container">
        <form class="d-flex">
        <h5><input class="form-control me-5" type="search" placeholder="Search" aria-label="Search"></h5>
        <button class="btn btn-outline-width" type="submit"> <i class="bi bi-search"> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button></h6>
      </form>
    </div>
    <div class="container">
  <div class="card m-2">
    <h6 class="text-center">Kategori</h6>
    <div class="card-body">
      <div class="row">
        <div class="col-6 text-center">
          <a href="makanan.html"><img src="burger.png" width="56" height="51">
          <p style="font-size: 10px;">Makanan</p></a>
        </div>
        <div class="col-6 text-center">
          <a href="fashion.html"><img src="fashion.png"width="56" height="51">
          <p style="font-size: 10px;">Fashion</p></a>
        </div>
        <div class="col-6 text-center">
          <a href="fashion.html"><img src="elektronik.png"width="56" height="51">
          <p style="font-size: 10px;">Elektronik</p></a>
        </div>
        <div class="col-6 text-center">
          <a href="produk-jasa.html"><img src="jasa 1.png"width="56" height="51">
          <p style="font-size: 10px;">Jasa</p></a>
        </div>
      </div>
    </div>
  </div></div>
  <!-- As a heading -->
  <div class="container">
    <h6 class="text-ligh">List Produk</h6>
    <div class="card-body">
      <div class="row">
        <div class="col-4 text-center">
          <a href="produk1.html"><img src="hotdog 2.png" width="50">
          <p style="font-size: 8px;">Nama Barang</p></a>
        </div>
        <div class="col-4 text-center">
          <a href="produk.html"><img src="fashion 2.png" width="50">
          <p style="font-size: 8px;">Nama Barang</p></a>
        </div>
        <div class="col-4 text-center">
          <a href=""><img src="cake 2.png" width="50">
          <p style="font-size: 8px;">Nama Barang</p></a>
        </div>
        <div class="col-4 text-center">
          <a href=""><img src="snack.png" width="50">
          <p style="font-size: 8px;">Nama Barang</p></a>
        </div>
        <div class="col-4 text-center">
          <a href=""><img src="popcorn 1.png" width="50">
          <p style="font-size: 8px;">Nama Barang</p></a>
        </div>
        <div class="col-4 text-center">
          <a href=""><img src="diet (1).png" width="50">
          <p style="font-size: 8px;">Nama Barang</p></a>
        </div>
      </div>
      </div>
      </div>
      <div id="kandang" class="container">
      <div id="tombol-bawah" class="d-flex justify-content-around">
      <a href="home-page.html" class="btn btn" role="button"> <i class="bi bi-house-door-fill"></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></a>
      <a href="posting.html" class="btn btn" role="button"> <i class="bi bi-cart4"></i> <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
      <a href="profil.php" class="btn btn" role="button"><i class="bi bi-person-circle"></i><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"></i></button>
      </div>
      </div>
    </div>
  
  </div>
  </body>
</html>