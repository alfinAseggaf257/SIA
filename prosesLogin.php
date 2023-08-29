	<script src="assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	<?php
	require 'connect.php';
	session_start();
	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$query_a = mysqli_query($koneksi, "SELECT*FROM admin WHERE username='$username' AND password='$password'");
		$query_b = mysqli_query($koneksi, "SELECT*FROM guru INNER JOIN mata_pelajaran ON guru.kd_mapel=mata_pelajaran.kd_mapel 
														WHERE username='$username' AND password='$password'");
		$query_c = mysqli_query($koneksi, "SELECT*FROM siswa 
													INNER JOIN data_siswakelas ON siswa.kd_siswa=data_siswakelas.kd_siswa 
													INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas 
													INNER JOIN nilai ON data_siswakelas.kd_dataSiswa=nilai.kd_dataSiswa 
													WHERE username='$username' AND password='$password'");

		if (mysqli_num_rows($query_a) > 0) {
			$query = $query_a;
			$result = mysqli_fetch_assoc($query);
			$_SESSION['kd'] = $result['kd_admin'];
			$_SESSION['nama'] = $result['nama_admin'];
			$_SESSION['username'] = $result['username'];
			$_SESSION['password'] = $result['password'];
			$_SESSION['level'] = $result['level'];
	?>
			<script>
				swal({
					title: 'Selamat Datang',
					text: " <?php echo $_SESSION['username']; ?>",
					text: " <?php echo $_SESSION['username']; ?> di SIAKAD SD N Baturan 1",
					icon: 'success',
				}).then(function(result) {
					if (true) { window.location = "admin/index.php";}
				})
			</script>
		<?php
		} else if (mysqli_num_rows($query_b) > 0) {
			$query = $query_b;
			$result = mysqli_fetch_assoc($query);
			$_SESSION['kd'] = $result['kd_guru'];
			$_SESSION['nama'] = $result['nama_guru'];
			$_SESSION['username'] = $result['username'];
			$_SESSION['nama_guru'] = $result['nama_guru'];
			$_SESSION['password'] = $result['password'];
			$_SESSION['pengajar'] = $result['nama_mapel'];
			$_SESSION['level'] = $result['level'];

		?>
			<script>
				swal({
					title: 'Selamat Datang',
					text: " <?php echo $_SESSION['nama_guru']; ?>",
					text: " <?php echo $_SESSION['nama_guru']; ?> di SIAKAD SD N Baturan 1",
					icon: 'success',
				}).then(function(result) {
					if (true) {window.location = "admin/index.php";}
				})
			</script>
		<?php
		} else if (mysqli_num_rows($query_c) > 0) {
			$query = $query_c;
			$result = mysqli_fetch_assoc($query);
			$_SESSION['kd'] = $result['kd_siswa'];
			$_SESSION['nama'] = $result['nama_siswa'];
			$_SESSION['username'] = $result['username'];
			$_SESSION['nis'] = $result['nis'];
			$_SESSION['nama_siswa'] = $result['nama_siswa'];
			$_SESSION['password'] = $result['password'];
			$_SESSION['level'] = $result['level'];
			$_SESSION['nama_kelas'] = $result['nama_kelas'];
			$_SESSION['semester'] = $result['semester'];
			$_SESSION['tahun_ajaran'] = $result['tahun_ajaran'];

		?>
			<script>
				swal({
					title: 'Selamat Datang',
					text: " <?php echo $_SESSION['nama_siswa']; ?>",
					text: " <?php echo $_SESSION['nama_siswa']; ?> di SIAKAD SD N Baturan 1",
					icon: 'success',
				}).then(function(result) {
					if (true) {
						window.location = "admin/index.php";
					}
				})
			</script>
		<?php
		} else {
		?>
			<script>
				swal({
					title: 'Username/Password tidak ditemukan!',
					text: "Silahkan input ulang",
					icon: 'error',
				}).then(function(result) {
					if (true) { window.location = "index.php";}
				})
			</script>
	<?php
		}
	}
	?>
</body>