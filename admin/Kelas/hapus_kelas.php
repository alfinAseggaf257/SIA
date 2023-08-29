<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>	
<?php 	
require '../connect.php';
$kd_kelas=$_GET['kd_kelas'];
$hapus=mysqli_query($koneksi,"DELETE FROM kelas WHERE kd_kelas='$kd_kelas'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
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