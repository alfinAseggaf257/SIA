<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
<?php 	
	require '../connect.php';
	$kd_siswa=$_GET['kd_siswa'];
	$hapus=mysqli_query($koneksi,"DELETE FROM siswa WHERE kd_siswa='$kd_siswa'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=siswa";
		  }
		})
		</script>	
	<?php
	}
?>
</body>