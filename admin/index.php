<?php 
error_reporting(0);
include 'akses.php';
if(isset($_GET['page'])){
    $page = $_GET['page'];         
        switch ($page) {
            case 'siswa':
                $menusiswa='active';
                break;
            case 'tambah_siswa':
                $menusiswa='active';
                break; 
            case 'edit_siswa':
                $menusiswa='active';
                break;

            case 'guru':
                $menuguru='active';
                break;
            case 'tambah_guru':
                $menuguru='active';
                break; 
            case 'edit_guru':
                $menuguru='active';
                break;  

            case 'kelas':
                $menukelas='active';
                break;
            case 'tambah_kelas':
                $menukelas='active';
                break; 
            case 'edit_kelas':
                $menukelas='active';
                break; 

            case 'mapel':
                $menumapel='active';
                break;
            case 'tambah_mapel':
                $menumapel='active';
                break; 
            case 'edit_mapel':
                $menumapel='active';
                break; 

            case 'nilai':
                $menunilai='active';
                break;
            case 'tambah_nilai':
                $menunilai='active';
                break; 
            case 'edit_nilai':
                $menunilai='active';
                break;

            case 'siswa_kelas':
                $menusiswa_kelas='active';
                break;
            case 'tambah_siswa_kelas':
                $menusiswa_kelas='active';
                break; 
            case 'edit_siswa_kelas':
                $menusiswa_kelas='active';
                break; 

            case 'pengumuman':
                $menupengumuman='active';
                break;
            case 'tambah_pengumuman':
                $menupengumuman='active';
                break; 
            case 'edit_pengumuman':
                $menupengumuman='active';
                break;
            case 'detail_pengumuman':
                $menupengumuman='active';
                break;

            case 'pengguna':
                $menupengguna='active';
                break;
            case 'tambah_pengguna':
                $menupengguna='active';
                break;
            case 'edit_pengguna':
                $menupengguna='active';
                break;

            case 'laporan':
                $menulaporan='active';
                break;
            case 'laporan_siswakelas':
                $menulaporan='active';
                break;
            case 'laporan_datadirisiswa';
                    $menulaporan='active';
                break;
            case 'laporan_nilai':
                $menulaporan='active';
                break;
        }
    }
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../assets/bootstrap5/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/fontawesome/css/all.min.css"> 
    <link rel="stylesheet" href="../assets/dataTables/DataTables/css/dataTables.bootstrap5.min.css"> 
	<link rel="stylesheet" href="../assets/css/style.css">
    <link rel="shortcut icon" href="../assets/img/logo.png">
	<title>Sistem Informasi Akademik</title>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- SIDEBAR STARTS -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
                <div class="logo">
                  <img src="../assets/img/logo.png" alt="">
                  SIAKAD
                </div>
            </div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold ">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard
                </a>
                <?php if ($_SESSION['level']=="Admin" ): ?>
                <a href="?page=siswa" class="list-group-item list-group-item-action bg-transparent second-text  <?php echo $menusiswa; ?> fw-bold">
                    <i class="fas fa-user-graduate me-2"></i>Siswa 
                </a> 
                <a href="?page=guru" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menuguru; ?> fw-bold">
                    <i class="fas fa-user me-2"></i>Guru
                </a>
                <?php endif; ?>
                <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold sidebar-link" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                     <i class="fas fa-building me-2"></i>Kelas<span style="float:right" class="fa fa-chevron-down right-icon"></span>    
                </a>
                <div class="collapse" id="collapseExample">
                    <div>
                        <ul class="navbar-nav ps-3">
                            <li>
                                <a href="?page=kelas" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menukelas; ?> fw-bold">
                                    <i class="fas fa-list me-2"></i>Data Kelas
                                </a>
                            </li>
                            <?php if ($_SESSION['level']=="Admin" || $_SESSION['level'] =="Guru"  ): ?>
                            <li>
                                <a href="?page=siswa_kelas" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menusiswa_kelas; ?> fw-bold">
                                    <i class="fas fa-users me-2"></i>Siswa Kelas
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>  
                    </div>
                </div>
                <?php if ($_SESSION['level']=="Admin" || $_SESSION['level'] =="Guru" ): ?>
                <a href="?page=mapel" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menumapel; ?> fw-bold">
                    <i class="fas fa-chalkboard-user me-2"></i>Mata Pelajaran
                </a>
                <?php endif ?>
                <a href="?page=nilai" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menunilai; ?> fw-bold">
                    <i class="fas fa-book me-2"></i>Nilai                
                </a>
                <a href="?page=pengumuman" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menupengumuman; ?> fw-bold">
                    <i class="fas fa-bullhorn me-2"></i>Pengumuman
                </a>
                <?php if ($_SESSION['level'] == "Admin"): ?>
                <a href="?page=pengguna" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menupengguna;?> fw-bold">
                    <i class="fas fa-users-gear me-2"></i>Pengguna
                </a>
                <?php endif ?>
                <?php if ($_SESSION['level'] =="Admin" || $_SESSION['level'] =="Guru"): ?>
                    
                <a href="?page=laporan" class="list-group-item list-group-item-action bg-transparent second-text <?php echo $menulaporan; ?>  fw-bold">
                    <i class="fas fa-receipt me-2"></i>Laporan
                </a>
                <?php endif ?>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold ">
                    <i class="fas fa-power-off me-2"></i>Logout
                </a>
            </div>
        </div>
        <!-- SIDEBAR END -->
        <!-- navbar tengah -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4  "> <!-- bg-transparent -->
                <div class="d-flex align-items-center">
                    <i class="fas fa-bars primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-4 m-0">SIA SD N Baturan 1</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php if ($_SESSION['level']=="Admin") {?>
                                <i class="fas fa-user me-2" ></i><?php echo $_SESSION['username']; ?>
                            <?php }else if ( $_SESSION['level']=="Siswa") { ?>
                                <i class="fas fa-user me-2" ></i><?php echo $_SESSION['nama_siswa']; ?>
                            <?php }else if ( $_SESSION['level']=="Guru") { ?>
                                <i class="fas fa-user me-2" ></i><?php echo $_SESSION['nama_guru']; ?>
                            <?php } ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php if ($_SESSION['level']=="Admin") {?>
                                    <li><a class="dropdown-item" href="?page=profil_admin">Profile</a></li>
                                <?php }else if ( $_SESSION['level']=="Siswa") { ?>
                                    <li><a class="dropdown-item" href="?page=profil_siswa">Profile</a></li>
                                <?php }else if ( $_SESSION['level']=="Guru") { ?>
                                   <li><a class="dropdown-item" href="?page=profil_guru">Profile</a></li>
                                <?php } ?>
                                
                                <li><a data-bs-toggle="modal" data-bs-target="#exampleModal" class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav><br>
            <!-- tutup navbar tengah -->
            <?php 
                include '../connect.php';
                $data_siswa = mysqli_query($koneksi,"SELECT * FROM siswa");
                $data_guru = mysqli_query($koneksi,"SELECT * FROM guru");
                $data_kelas = mysqli_query($koneksi,"SELECT * FROM kelas");
                $data_pengumuman = mysqli_query($koneksi,"SELECT * FROM pengumuman");

                $jumlah_siswa = mysqli_num_rows($data_siswa);
                $jumlah_guru = mysqli_num_rows($data_guru);
                $jumlah_kelas = mysqli_num_rows($data_kelas);
                $jumlah_pengumuman = mysqli_num_rows($data_pengumuman);

            ?>

            <!-- bagian konten -->
            <?php 
                if (isset($_GET['page'])  > 0) {
                    $hal = str_replace(".", "/", $_GET['page']) . ".php";
                }else {
                    $hal = "Dasboard.php";
                }
                    if (file_exists($hal)) {
                    include($hal);
                } 
            ?>
            <?php 
                if(isset($_GET['page'])){
                    $page = $_GET['page'];         
                    switch ($page) {

                        case 'siswa':
                          include "Siswa/tampil_siswa.php";
                          break;
                        case 'tambah_siswa':
                          include "Siswa/tambah_siswa.php";
                          break;                          
                        case 'simpan_siswa':
                          include "Siswa/simpan_siswa.php";
                          break;        
                        case 'edit_siswa':
                          include "Siswa/edit_siswa.php";
                          break;  
                        case 'update_siswa':
                          include "Siswa/update_siswa.php";
                          break;
                        case 'hapus_siswa':
                          include "Siswa/hapus_siswa.php";
                          break;

                        case 'guru':
                          include "Guru/tampil_guru.php";
                          break;
                        case 'tambah_guru':
                          include "Guru/tambah_guru.php";
                          break;                          
                        case 'simpan_guru':
                          include "Guru/simpan_guru.php";
                          break;        
                        case 'edit_guru':
                          include "Guru/edit_guru.php";
                          break;  
                        case 'update_guru':
                          include "Guru/update_guru.php";
                          break;
                        case 'hapus_guru':
                          include "Guru/hapus_guru.php";
                          break;

                        case 'kelas':
                          include "Kelas/tampil_kelas.php";
                          break;
                        case 'tambah_kelas':
                          include "Kelas/tambah_kelas.php";
                          break;                          
                        case 'simpan_kelas':
                          include "Kelas/simpan_kelas.php";
                          break;        
                        case 'edit_kelas':
                          include "Kelas/edit_kelas.php";
                          break;  
                        case 'update_kelas':
                          include "Kelas/update_kelas.php";
                          break;
                        case 'hapus_kelas':
                          include "Kelas/hapus_kelas.php";
                          break;


                        case 'mapel':
                          include "Mapel/tampil_mapel.php";
                          break;
                        case 'tambah_mapel':
                          include "Mapel/tambah_mapel.php";
                          break;                          
                        case 'simpan_mapel':
                          include "Mapel/simpan_mapel.php";
                          break;        
                        case 'edit_mapel':
                          include "Mapel/edit_mapel.php";
                          break;  
                        case 'update_mapel':
                          include "Mapel/update_mapel.php";
                          break;
                        case 'hapus_mapel':
                          include "Mapel/hapus_mapel.php";
                          break;

                        case 'siswa_kelas':
                          include "Data_SiswaKelas/tampil_dataSiswa.php";
                          break;
                        case 'tambah_siswa_kelas':
                          include "Data_SiswaKelas/tambah_dataSiswa.php";
                          break;                          
                        case 'simpan_siswa_kelas':
                          include "Data_SiswaKelas/simpan_dataSiswa.php";
                          break;        
                        case 'edit_siswa_kelas':
                          include "Data_SiswaKelas/edit_dataSiswa.php";
                          break;  
                        case 'update_siswa_kelas':
                          include "Data_SiswaKelas/update_dataSiswa.php";
                          break;
                        case 'hapus_siswa_kelas':
                          include "Data_SiswaKelas/hapus_dataSiswa.php";
                          break;  

                        case 'nilai':
                          include "Nilai/tampil_nilai.php";
                          break;
                        case 'tambah_nilai':
                          include "Nilai/tambah_nilai.php";
                          break;                          
                        case 'simpan_nilai':
                          include "Nilai/simpan_nilai.php";
                          break;        
                        case 'edit_nilai':
                          include "Nilai/edit_nilai.php";
                          break;  
                        case 'update_nilai':
                          include "Nilai/update_nilai.php";
                          break;
                        case 'hapus_nilai':
                          include "Nilai/hapus_nilai.php";
                          break;  

                        case 'pengumuman':
                          include "Pengumuman/tampil_pengumuman.php";
                          break;
                        case 'tambah_pengumuman':
                          include "Pengumuman/tambah_pengumuman.php";
                          break;                          
                        case 'simpan_pengumuman':
                          include "Pengumuman/simpan_pengumuman.php";
                          break;        
                        case 'edit_pengumuman':
                          include "Pengumuman/edit_pengumuman.php";
                          break;  
                        case 'update_pengumuman':
                          include "Pengumuman/update_pengumuman.php";
                          break;
                        case 'hapus_pengumuman':
                          include "Pengumuman/hapus_pengumuman.php";
                          break; 
                        case 'detail_pengumuman':
                          include "Pengumuman/detail_pengumuman.php";
                          break; 

                        case 'pengguna':
                          include "Pengguna/tampil_pengguna.php";
                          break;
                        case 'tambah_pengguna':
                          include "Pengguna/tambah_pengguna.php";
                          break;                          
                        case 'simpan_pengguna':
                          include "Pengguna/simpan_pengguna.php";
                          break;        
                        case 'edit_pengguna':
                          include "Pengguna/edit_pengguna.php";
                          break;  
                        case 'update_pengguna':
                          include "Pengguna/update_pengguna.php";
                          break;
                        case 'hapus_pengguna':
                          include "Pengguna/hapus_pengguna.php";
                          break; 

                        case 'laporan':
                          include "Laporan/laporan.php";
                          break; 
                        case 'laporan_nilai':
                          include "Laporan/nilai.php";
                          break;
                        case 'laporan_siswakelas':
                          include "Laporan/Data_siswakelas.php";
                          break;
                        case 'laporan_datadirisiswa':
                          include "Laporan/Data_dirisiswa.php";
                          break;
                        case 'laporan_datadiriguru':
                          include "Laporan/Data_diriguru.php";
                          break;

                        case 'profil_admin':
                          include "Profil/admin.php";
                          break; 
                        case 'ubah_admin':
                          include "Profil/ubah_admin.php";
                          break; 
                        case 'profil_siswa':
                          include "Profil/siswa.php";
                          break; 
                        case 'ubah_siswa':
                          include "Profil/ubah_siswa.php";
                          break; 
                        case 'profil_guru':
                          include "Profil/guru.php";
                          break; 
                        case 'ubah_guru':
                          include "Profil/ubah_guru.php";
                          break;   
                    }
                }
            ?>
            <br>    
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">LOGOUT</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Apakah Anda Yakin?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a href="../logout.php" class="log btn btn-danger">YES</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tutupmodal -->
    </div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../assets/dataTables/DataTables/js/jquery.dataTables.min.js"></script>
<script src="../assets/dataTables/DataTables/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/ckeditor/ckeditor.js"></script>
<script src="../assets/bootstrap5/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
    jQuery(function($) {
    var path = window.location.href;  
        $('div.list-group a').each(function() {
            if (this.href === path) {
            $(this).addClass('active');
          
        }
        });
    });
    $(document).ready(function() {
        var table = $('#data-table').DataTable( {
            select: true,
            search: {
                caseInsensitive: false,
                regex: true
            }
        });
        $('#namaKelas').on('change', function() {
            var val = $.fn.dataTable.util.escapeRegex($(this).val());
            table.search(val + " ", true, false).draw();
        });
    });
    $('#hapus').on('show.bs.modal', function(e) {
        $(this).find('.btn-yes').prop('href', $(e.relatedTarget).data('href'));
    });
</script>
</body>
</html>