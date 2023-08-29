<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	
<?php 	
require '../connect.php';
$kd_dataSiswa=$_GET['kd_dataSiswa'];
$hapus=mysqli_query($koneksi,"DELETE FROM data_siswakelas WHERE kd_dataSiswa='$kd_dataSiswa'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=siswa_kelas";
		  }
		})
		</script>

		
	<?php
	}

?>

</body>