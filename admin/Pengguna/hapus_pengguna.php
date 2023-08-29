<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	<?php 	
	require '../connect.php';
	$kd_admin=$_GET['kd_admin'];
	$hapus=mysqli_query($koneksi,"DELETE FROM admin WHERE kd_admin='$kd_admin'");
	if ($hapus) {
		?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=pengguna";
		  }
		})
		</script>
		<?php
	}
	?>
</body>