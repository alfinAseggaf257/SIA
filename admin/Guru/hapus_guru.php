<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	
<?php 	
require '../connect.php';


	$kd_guru=$_GET['kd_guru'];
	$hapus=mysqli_query($koneksi,"DELETE FROM guru WHERE kd_guru='$kd_guru'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=guru";
		  }
		})
		</script>

		
	<?php
	}

?>
</body>