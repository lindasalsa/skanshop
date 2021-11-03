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
       
            //Data akan di edit
                //data akan disimpan baru
                $simpan = mysqli_query($koneksi, "INSERT INTO produk (`foto`,`nama_produk`,`harga_produk`,`kategori`,`deskripsi`)
                                          VALUES ('$namafoto',
                                                 '$_POST[tnama_produk]',
                                                 '$_POST[tharga_produk]',
                                                 '$_POST[tkategori]',
                                                 '$_POST[tdeskripsi]')
                                         ");

                                         
                    if($simpan)//Jika simpan suksess
                    {
                        echo "<script>
                                alert('Simpan data suksess!');
                                document.location='deskripsi.php';
                            </script>";
                    }
                    else
                    {
                        echo "<script>
                                alert('Simpan data GAGAL!!');
                                document.location='deskripsi.php';
                            </script>";
                    }
        } 
        if(isset($_GET['id']))
        {
            //Pengujian jika data edit
            if($_GET['id'] == "")
            {
                $tampil = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = '$_GET[id]' ");
                $data = mysqli_fetch_array($tampil);
                if($data)
                {
                    //Jika data ditemukan, maka data ditampung ke dalam variabel
                    $vfoto = $data['foto'];
                    $vnamaproduk = $data['nama_produk'];
                    $vhargaproduk = $data['harga_produk'];
                    $vkategori = $data['kategori'];
                  $vdeskripsi = $data['deskripsi'];    
                }
              }
            }
     


?>
<!doctype html>
<html>
  <head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>posting deskripsi</title>
    <link rel="stylesheet" type="text/css" href="registrasi.css">
  </head>
  <style>
      body { height: 150vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
    </style>
  <body>
    <!-- awal card form -->

    <div class="container">
        <h2 class="text-center">Postingan</h2>
        <form method="post" enctype="multipart/form-data">
    <div class="text-center"><img  src="<?php if(is_file("image/".$vfoto)) { echo "image/".$vfoto; } else { ?>user 1.png<?php } ?>" alt=""></div>
      <div class="form-floating mb-3">
        <input type="file" name="tfoto">
        <label for="floatingInput"></label>
      </div>
        <div class="form-floating mt-3">
        <input type="text" name="tnama_produk" value="<?=@$vnama_produk?>" class="form-control" id="floatingInput" placeholder="Nama Produk">
        <label for="floatingInput">Nama Produk</label>
        </div>
<div class="form-floating mt-3">
        <input type="text" name="tharga_produk" value="<?=@$vharga_produk?>" class="form-control" class="form-control "  placeholder="Harga">
        <label for="floatingInput">Harga</label>
      </div>
      <div class="form-floating mt-3">
      <select name="tkategori" class="form-select" id="floatingSelect" aria-label="Floating label select example">
        <option <?php if(isset($vkategori) && $vkategori == "") { echo "selected"; } ?> value="">Pilih</option>
        <option <?php if(isset($vkategori) && $vkategori == "Makanan") { echo "selected"; } ?> value="Makanan">Makanan</option>
        <option <?php if(isset($vkategori) && $vkategori == "Fashion") { echo "selected"; } ?> value="Fashion">Fashion</option>
        <option <?php if(isset($vkategori) && $vkategori == "jasa") { echo "selected"; } ?> value="jasa">Jasa</option>
        <option <?php if(isset($vkategori) && $vkategori == "elektronik") { echo "selected"; } ?> value="elektronik">Elektronik</option>
      </select>
      <label for="floatingSelect">Kategori Produk</label>
      </div>
      <div class="card-body"></div>
  <div class="text-ligh mt-2">Deskripsi Item</div>
    <div class="form-floating">
        <input type="text" name="tdeskripsi" value="<?=@$vdeskripsi?>" class="form-control "  placeholder="Keterangan">
        <label for="floatingInput">Keterangan</label>
      </div>
      <div class="d-flex justify-content-around">
        <div class="text-center mt-5">
            <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
            <button id="login" name="bsimpan" type="submit" class="btn btn-primary mt-3" role="button">posting</button>
          </div>
        </div>
      
      </div>
  </div>

</form>
    </div>
    </div>

    <!-- akhir card form -->
  </body>
</html>