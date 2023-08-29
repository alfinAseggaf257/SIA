<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	
<?php 	
require '../connect.php';
$kd_nilai=$_GET['kd_nilai'];
$hapus=mysqli_query($koneksi,"DELETE FROM nilai WHERE kd_nilai='$kd_nilai'");
	if ($hapus) {
	?>
		<script>
		swal({
		  title: 'Success',
		  text: "Data Berhasil dihapus",
		  icon: 'success',
		}).then(function (result) {
		  if (true) {
		    window.location = "?page=nilai";
		  }
		})
		</script>

		
	<?php
	}

?>

</body>