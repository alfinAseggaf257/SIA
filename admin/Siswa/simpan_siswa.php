<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
  <body>
    <?php 
    require"../connect.php";
    require"function.php";
    $kd_siswa   = $_POST['kd_siswa'];
    $nis        = $_POST['nis'];
    $nama_siswa = $_POST['nama_siswa'];
    $jenkel			= $_POST['jenkel'];
    $agama	    = $_POST['agama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir= $_POST['tanggal_lahir'];
    $alamat     = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $angkatan   = $_POST['angkatan'];
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    $level      = $_POST['level'];
    $foto = uploadSiswa();
    if (!$foto) {
      return false;
    }
    $cek_nis=mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis' ")or die(mysqli_error($koneksi));

    if (mysqli_num_rows($cek_nis)>0){
      ?>
      <script>
        swal({
          title: 'Data NIS sudah ada !',
          text: "Silahkan input ulang",
          icon: 'error',
        }).then(function (result) {
          if (true) {
            window.location = "?page=tambah_siswa";
          }
        })
      </script>
      <?php  
    }else{
      $cek_username=mysqli_query($koneksi, "SELECT * FROM siswa WHERE username='$username'  ")or die(mysqli_error($koneksi));
      if (mysqli_num_rows($cek_username)>0){
        ?>
        <script>
          swal({
            title: 'Username Telah digunakan!',
            text: "Silahkan gunakan username lain",
            icon: 'error',
          }).then(function (result) {1
            if (true) {
              window.location = "?page=tambah_siswa";
            }
          })
        </script>

        <?php  
      }else{
        $query = mysqli_query($koneksi, "INSERT INTO siswa(kd_siswa,nis,nama_siswa, jenkel, agama, tempat_lahir, tanggal_lahir, alamat, no_telp, angkatan, username, password, level, foto)
          VALUES('$kd_siswa','$nis','$nama_siswa','$jenkel','$agama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telp','$angkatan','$username','$password','$level','$foto')");
        if ($query) {
          ?>
          <script>
            swal({
              title: 'Success',
              text: "Data Berhasil ditambahkan",
              icon: 'success',
            }).then(function (result) {
              if (true) {
                window.location = "?page=siswa";
              }
            })
          </script>
          <?php 
        }else{
          ?>  
          <script>
            swal({
              title: 'Data Gagal disimpan!',
              text: "Terjadi kesalahan proses penyimpanan",
              icon: 'error',
            }).then(function (result) {
              if (true) {
                window.location = "?page=siswa";
              }
            })
          </script>

          <?php 
        }
      } 
    }
    ?>
  </body>