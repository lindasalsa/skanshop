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
        if($_GET['hal'] == "edit")
        {
            //Data akan di edit
                //data akan disimpan baru
                $edit = mysqli_query($koneksi, "UPDATE user set
                `nama`='".$_POST['tnama']."',
                `email`='".$_POST['temail']."',
                `password`= '".$_POST['tpassword']."',
                `cpassword`='".$_POST['cpassword']."'
                WHERE id='".$_GET['id']."'
                ");
                
                if($edit) //jika edit sukses
                    {
                    echo "<script>
                            alert('edit data sukses!');
                            document.location='regestrasi.php';
                    </script>";
                    } else {
                    echo "<script>
                        alert('edit data GAGAL!!');
                        document.location='regestrasi.php';
                </script>";

                }
        } else {
            $simpan = mysqli_query($koneksi, "INSERT INTO user (`nama`,`email`,`password`,`cpassword`)
                                          VALUES ('$_POST[tnama]',
                                                 '$_POST[temail]',
                                                 '$_POST[tpassword]',
                                                 '$_POST[tcpassword]')
                                         ");

                                         
                    if($simpan)//Jika simpan suksess
                    {
                        echo "<script>
                                alert('Simpan data suksess!');
                                document.location='regestrasi.php';
                            </script>";
                    }
                    else
                    {
                        echo "<script>
                                alert('Simpan data GAGAL!!');
                                document.location='regestrasi.php';
                            </script>";
                    }
                }       

}

    //Pengujian jika tombol edit / hapus diklik
    if(isset($_GET['hal']))
    {
        //Pengujian jika data edit
        if($_GET['hal'] == "edit")
        {
            //Tampilkan data yang diedit
            $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id = '$_GET[id]' ");
            $data = mysqli_fetch_array($tampil);
            if($data)
            {
                //Jika data ditemukan, maka data ditampung ke dalam variabel
                $vnama = $data['nama'];
                $vemail = $data['email'];
                $vpassword = $data['password'];
                $vcpassword = $data['cpassword'];
            }
        } else if ($_GET['hal'] == "hapus")
        {
            //Persiapan hapus data
            $hapus = mysqli_query($koneksi, "DELETE FROM user WHERE id = '$_GET[id]' ");
            if($hapus){
                echo "<script>
                    alert('Hapus Data Suksess!!');
                    document.location='regestrasi.php';
                </script>";
            }
        }
    }


?>

<!doctype html>
<html>
  <head>
  <style>
      body { height: 150vh; background: linear-gradient(180deg, #6AC9C9 0%, #43E7FE 100%);}
    </style>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>skanshop</title>
    <link rel="stylesheet" type="text/css" href="registrasi1.css">
  </head>
  <body>
    <!-- awal card form -->
    
  <div class="text-center"><img src="user 1.png" alt=""></div>
  <div class="container">
  <h2 class="text-center">Registrasi</h2>
        <div class="">
            <form id="input-registrasi" method="post" action="">
                <label>Nama</label>
                <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" >
                <label>Email</label>
                <input type="text" name="temail" value="<?=@$vemail?>" class="form-control">
                <label>Password</label>
                <input type="password" name="tpassword" value="<?=@$vpassword?>" class="form-control" >
                <label>Confirm Password</label>
                <input type="cpassword" name="tcpassword" value="<?=@$vcpassword?>" class="form-control" >

                 <!-- <button id="Login" a href="" class="btn btn-primary">Login</button> -->
                 <div class="text-center">
                <button id="login" type="submit" class="btn btn-primary" name="bsimpan" >SUBMIT</button>
                 </div>

</form>
    </div>
    </div>
  </body>
  </div>
   <div class="text-center mt-5">Saya menyetujui Kebijakan Privasi dan Syarat & Ketentuan yang berlaku</div>
   <div class="text-center">
   <a href="index.php">Back to Login</a>
   </div>
</html>