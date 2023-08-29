<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
  <body>
    <?php 
    require"../connect.php";
    require"function.php";
    $kd_guru    = $_POST['kd_guru'];
    $nip        = $_POST['nip'];
    $nama_guru  = $_POST['nama_guru'];
    $jenkel     = $_POST['jenkel'];
    $agama      = $_POST['agama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir= $_POST['tanggal_lahir'];
    $alamat     = $_POST['alamat'];
    $no_telp    = $_POST['no_telp'];
    $kd_mapel   = $_POST['kd_mapel'];
    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    $level      = $_POST['level'];
    $foto = uploadGuru();
    if (!$foto) {
      return false;
    }
    
    $cek_nip=mysqli_query($koneksi, "SELECT * FROM guru WHERE nip='$nip' ")or die(mysql_error());
    if (mysqli_num_rows($cek_nip)>0){
      ?>
      <script>
        swal({
          title: 'Data nip sudah ada !',
          text: "Silahkan input ulang",
          icon: 'error',
        }).then(function (result) {
          if (true) {
            window.location = "?page=tambah_guru";
          }
        })
      </script>
      <?php  
    }else{
      $cek_username=mysqli_query($koneksi, "SELECT * FROM guru WHERE username='$username'  ")or die(mysqli_error($koneksi));
      if (mysqli_num_rows($cek_username)>0){
        ?>
        <script>
          swal({
            title: 'Username Telah digunakan!',
            text: "Silahkan gunakan username lain",
            icon: 'error',
          }).then(function (result) {
            if (true) {
              window.location = "?page=tambah_guru";
            }
          })
        </script>
        <?php  
      }else{
        $query = mysqli_query($koneksi, "INSERT INTO guru(kd_guru,nip,nama_guru, jenkel, agama, tempat_lahir, tanggal_lahir, alamat, no_telp, kd_mapel, username, password, level, foto)
          VALUES('$kd_guru','$nip','$nama_guru','$jenkel','$agama','$tempat_lahir','$tanggal_lahir','$alamat','$no_telp','$kd_mapel','$username','$password','$level','$foto')");
        if ($query) {
          ?>
          <script>
            swal({
              title: 'Success',
              text: "Data Berhasil ditambahkan",
              icon: 'success',
            }).then(function (result) {
              if (true) {
                window.location = "?page=guru";
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
                window.location = "?page=guru";
              }
            })
          </script>
        <?php } 
      }
    }
    ?>
  </body>