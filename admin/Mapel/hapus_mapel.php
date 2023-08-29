<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	
<?php 	
require '../connect.php';
$kd_mapel=$_GET['kd_mapel'];
$hapus=mysqli_query($koneksi,"DELETE FROM mata_pelajaran WHERE kd_mapel='$kd_mapel'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=mapel";
		  }
		})
		</script>

		
	<?php
	}

?>

</body>