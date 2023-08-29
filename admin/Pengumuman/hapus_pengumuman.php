<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	
<?php 	
require '../connect.php';
	$kd_pengumuman=$_GET['kd_pengumuman'];
	$hapus=mysqli_query($koneksi,"DELETE FROM pengumuman WHERE kd_pengumuman='$kd_pengumuman'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=pengumuman";
		  }
		})
		</script>

		
	<?php
	}

?>

</body>