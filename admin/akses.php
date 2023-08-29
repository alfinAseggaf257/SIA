<script src="../assets/sweetalert/dist/sweetalert.min.js"></script>
<body>
	<?php 
	session_start();
	if (!isset($_SESSION['username'])) {
	?>
		 <script>
          swal({
            title: 'AKSES DILARANG',
            text: "Anda Harus Login!",
            icon: 'error',
          }).then(function (result) {1
            if (true) {
             document.location="../index.php"; 
            }
          })
        </script>

	<?php  exit; } ?>
</body>