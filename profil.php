<?php
 //koneksi Database
 $server= "localhost";
 $user= "root";
 $pass= "";
 $database= "skanshop";

 $koneksi= mysqli_connect($server, $user, $pass, $database)or die(mysqli_error($koneksi));

 session_start();
 if(empty($_SESSION['user'])) {
   header("location:index.php?status=gagal");
 } else {
   $user = $_SESSION['user'];
 }
 
 //jika tombol simpan di klik
//print_r($_POST);exit
if(isset($_POST['bsimpan']))
{
    //pengujian apakah data akan diedit atau disimpan baru
       $vid=$user['id'];
       $lokasifoto='image/';
       $namafoto="";
       if(isset($_FILES['tfoto']['name'])){
         $namafoto=@$_FILES['tfoto']['name'];
         move_uploaded_file($_FILES['tfoto']['tmp_name'],$lokasifoto.$namafoto);
       }
        
            //Data akan di edit
                //data akan disimpan baru
                $edit = mysqli_query($koneksi, "UPDATE user set
                `foto`='".$namafoto."',
                `nama`='".$_POST['tnama']."',
                 `jenis_kelamin`='".$_POST['tjenis_kelamin']."',
                 `tanggal_lahir`='".$_POST['tanggal_lahir']."',
                 `alamat`='".$_POST['talamat']."',
                `email`='".$_POST['temail']."',
                `wa`= '".$_POST['twa']."',
                `fb`='".$_POST['tfb']."',
                `ig`='".$_POST['tig']."'
                WHERE id='".$vid."'
                ");
                
                if($edit) //jika edit sukses
                    {
                    header("location:profil.php");
                    exit;
                    } else {
                     echo "gagal";
                    exit;

                }
        
     

}

   
            $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$user[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //Jika data ditemukan, maka data ditampung ke dalam variabel
                $vfoto = $data['foto'];
                $vnama = $data['nama'];
                $vjenis_kelamin = $data['jenis_kelamin'];
                $vtanggallahir = $data['tanggal_lahir'];
                $valamat = $data['alamat'];
                $vemail = $data['email'];
                $vnama = $data['nama'];
                $vwa = $data['wa'];
                $vfb = $data['fb'];
                $vig = $data['ig'];
                
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="profil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Profil</title>
    <style>
    .container{
        width: 360px;
      }
    </style>
  </head>
  <body>
    
  <div class="container">
  <div class="d-flex justify-content-start">
      <a><i class="bi bi-arrow-left"></i></a>
    </div>
    <div class="text-center"><img width="100" src="<?php if(is_file("image/".$vfoto)) { echo "image/".$vfoto; } else { ?>user 1.png<?php } ?>" alt=""></div>
      <div class="text-center mt-3">Ubah</div>
  <div class="container">
    <form method="post" enctype="multipart/form-data">
    <div class="form-floating mb-3">
        <input type="file" name="tfoto">
        <label for="floatingInput"></label>
      </div>
      <div class="form-floating mb-3">
        <input type="Nama:" name="tnama" value="<?=@$vnama?>" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Nama:</label>
      </div>
      <div class="form-floating mb-3">
  <select name="tjenis_kelamin" value="<?=@$vjenis_kelamin?>" class="form-select" id="floatingSelect" aria-label="Floating label select example">
  <option <?php if(isset($vjenis_kelamin) && $vjenis_kelamin== "") {echo"selected";} ?> value="">Pilih</option>
  <option <?php if(isset($vjenis_kelamin) && $vjenis_kelamin== "laki-laki"){echo"selected";} ?> value="laki-laki">Laki-Laki</option>
  <option <?php if(isset($vjenis_kelamin) && $vjenis_kelamin== "perempuan"){echo"selected";} ?> value="perempuan">Perempuan</option>
  </select>
  <label for="floatingSelect">Jenis Kelamin</label>
</div>
      <div class="form-floating mt-3">
        <input type="date"  name="tanggal_lahir" value="<?=@$vtanggallahir?>" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Tanggal Lahir:</label>
      </div>
      <div class="form-floating mt-3">
        <textarea type="text" name="talamat"  class="form-control" placeholder="Input Nama anda disini" required><?=@$valamat?></textarea>
        <label for="floatingTextarea">Alamat</label>
      </div>
      <div class="form-floating mt-3">
        <input type="email" name="temail" value="<?=@$vemail?>" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email:</label>
        </div>
          <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1">whatsaap</span>
            <input type="phone" name="twa" value="<?=@$vwa?>" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
          </div>
          <div class="input-group mt-3">
          <span class="input-group-text" id="basic-addon1">facebook</span>
          <input type="url"  name="tfb" value="<?=@$vfb?>" class="form-control" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mt-3">
        <span class="input-group-text" id="basic-addon1">instagram</span>
        <input type="url" name="tig" value="<?=@$vig?>" class="form-control"  aria-label="Username" aria-describedby="basic-addon1">
      </div>
        <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
        <div class="text-right">
        <a id="" class="btn btn-primary mt-3" href="" role="button">Ganti Password</a>
        <button name="bsimpan" class="btn btn-primary mt-3"  role="button">Simpan</button>
      </div>
      
  </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
  <script>
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>