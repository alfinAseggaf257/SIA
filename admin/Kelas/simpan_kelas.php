<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
  <?php 
  require"../connect.php";
  $kd_kelas	  = $_POST['kd_kelas'];
  $nama_kelas	  = $_POST['nama_kelas'];
  $tahun_ajaran	= $_POST['tahun_ajaran'];
  $kd_guru	        = $_POST['kd_guru'];

  $query = mysqli_query($koneksi,"INSERT INTO  kelas(kd_kelas, nama_kelas, tahun_ajaran, kd_guru)
   					   VALUES('$kd_kelas','$nama_kelas','$tahun_ajaran','$kd_guru')");
    if ($query){
   	?>
   	<script>
      swal({
        title: 'Success',
        text: "Data Berhasil ditambahkan",
        icon: 'success',
      }).then(function (result) {
        if (true) {
          window.location = "?page=kelas";
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
              window.location = "?page=kelas";
          }
      })
      </script>
   <?php 
   }	
   ?>
</body>