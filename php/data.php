<!DOCTYPE html>
<html>
    <head>
        <title>Registrasi</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../assets/img/professional-portfolio.png">
        <link rel="stylesheet" href="../assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <h1>Daftar Peserta</h1>
        <div class="main-block">
            <div style="overflow-x:auto;">
                    <?php
                    include_once 'database.php';

                    if(isset($_POST['submit'])){
                      $nama           = $_POST['nama'];
                      $tanggal_lahir  = $_POST['ttl'];
                      $alamat         = $_POST['alamat'];
                      $jenis_kelamin  = $_POST['jenis_kelamin'];
                      $jurusan        = $_POST['jurusan'];
                      
                      $foto           = '';
                      $target_dir     = "../assets/img/uploads/";
                      $file_name      = $_FILES["ft"]["name"];
                      $target_file    = $target_dir . $file_name;
  
                      if($file_name){
                          $uploaded = move_uploaded_file($_FILES["ft"]["tmp_name"], $target_file);
                          if($uploaded){
                              $foto = $file_name;
                          }
                      }
  
                      $sql = "INSERT INTO mahasiswa (nama, tanggal_lahir, alamat, jenis_kelamin, jurusan, foto) 
                              VALUES ('$nama', '$tanggal_lahir', '$alamat', '$jenis_kelamin', '$jurusan', '$foto')";
  
                      if(mysqli_query($conn, $sql)){
                          echo "Created Successfully!!";
                      } else{
                          echo "Data can't created";
                      }
  
                      mysqli_close($conn);
                    }
                    
                    if(isset($_GET['id'])){
                      mysqli_query($conn, "delete from mahasiswa where id='$_GET[id]'");
                      
                      echo "Deleted Success!";
                      echo "<meta http-equev=refresh content=2;URL='data.php'>";
                    }

                    ?>
              <table>
                <tr>
                  <th>No.</th>
                  <th>Nama</th>
                  <th>Tanggal lahir</th>
                  <th>Alamat</th>
                  <th>Jenis Kelamin</th>
                  <th>Jurusan</th>
                  <th>Foto</th>
                  <th>Aksi</th>
                </tr>
                  <?php
                    include "database.php";

                    $no=1;
                    $data= mysqli_query($conn, "select * from mahasiswa");
                    while ($tampil = mysqli_fetch_array($data)){
                      echo "
                      <tr>
                        <th>$no</th>
                        <th>$tampil[nama]</th>
                        <th>$tampil[tanggal_lahir]</th>
                        <th>$tampil[alamat]</th>
                        <th>$tampil[jenis_kelamin]</th>
                        <th>$tampil[jurusan]</th>
                        <th>$tampil[foto]</th>
                        <th>
                          <a href='?id=$tampil[id]'> Delete </a>
                        </th>
                      </tr>";
                      $no++;
                    }
                  ?>
              </table>
            </div>
            <a href="form.php">Tambah Data</a>
        </div>
    </body>
</html>