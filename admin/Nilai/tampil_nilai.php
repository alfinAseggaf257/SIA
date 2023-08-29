<div class="container-fluid px-4">
    <h3>Nilai</h3>
    <!-- KONTEN TENGAH -->
    <div class="col-lg-12">
        <div class="card rounded">
            <div class="card-header ">
                List Data Nilai

            </div>
            <div class="card-body">
                <?php if ($_SESSION['level']=="Siswa") : ?>
                <table>
                    <?php if ($_SESSION['semester'] == null) { ?>
                    <p>Nilai anda belum diinputkan.. Silahkan hubungi guru yang bersangkutan</p>
                    <?php } ?>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td width="2%"></td>
                        <td><b><?= $_SESSION['nama_siswa'];?></b></td>
                    </tr>
                    <tr>
                        <td>Kelas<b></td>
                        <td>:</td>
                        <td></td>
                        <td><b><?= $_SESSION['nama_kelas']; ?></b></td>
                    </tr>
                    <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td></td>
                        <td><b><?= $_SESSION['semester']; ?></td>
                    </tr>
                    <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td></td>
                        <td><b><?= $_SESSION['tahun_ajaran']; ?></td>
                    </tr>
                </table>
                <br>
                <?php endif ?>
                <?php if ($_SESSION['level']=="Admin" || $_SESSION['level']=="Guru" ): ?>
                <a href="?page=tambah_nilai" class="btn btn-primary" style="color: #fff; text-decoration: none; float:left;">   <i class="fa fa-plus"></i> Tambah</a>
                <div class="card-title mb-4">
                    <br>
                </div>
                <?php endif ?>
                <div class="table-responsive">
                    <div class="overflow-auto">
                        <table class="table table-striped table-bordered table-hover display nowrap" id="data-table" width="100%" >
                            <thead>
                                <tr style="vertical-align: middle; text-align: center;">
                                    <th rowspan="2" class="text-center">No</th>
                                    <?php if ($_SESSION['level']=="Admin" || $_SESSION['level']=="Guru" ): ?>
                                    <th rowspan="2">Nama Siswa</th>
                                    <th rowspan="2">Kelas</th>
                                    <th rowspan="2">Semester</th>
                                    <th rowspan="2">Tahun Ajaran</th>
                                    <?php endif ?>
                                    <th rowspan="2">Mapel</th>
                                    <th rowspan="2">Pengajar</th>
                                    <th colspan="7" style="text-align: center;">Nilai</th>
                                    
                                    <th rowspan="2">KKM</th>
                                    <th rowspan="2">Rata-rata Nilai</th>
                                    <th rowspan="2">Keterangan</th>
                                    <?php if ($_SESSION['level']=="Admin" || $_SESSION['level']=="Guru" ): ?>
                                    <th rowspan="2" width="70">Aksi</th>    
                                    <?php endif ?>
                                    
                                </tr>
                                <tr>    
                                    <th>T1</th>
                                    <th>T2</th>
                                    <th>T3</th>
                                    <th>T4</th>
                                    <th>T5</th>
                                    <th>UTS</th>
                                    <th>UAS</th>

                                </tr>   
                            </thead>
                            <tbody>
                               <?php 
                               require'../connect.php';
                               $no=1;

                               $tampildata=$_SESSION['pengajar'];
                               $nama=$_SESSION['nama_guru'];
                               $tampilsiswa=$_SESSION['nama_siswa'];
                               if ($_SESSION['level']=="Admin") {
                                   $tampil="";
                               }else if($_SESSION['level']=="Guru"){
                                    $tampil="WHERE nama_mapel='$tampildata' ";
                                    $plus="AND nama_guru='$nama'";
                               }else if($_SESSION['level']=="Siswa"){
                                    $tampil="WHERE nama_siswa='$tampilsiswa'";
                                    $plus=" ";
                                }
                               $query=mysqli_query($koneksi, "SELECT * FROM nilai 
                                INNER JOIN data_siswakelas ON nilai.kd_dataSiswa=data_siswakelas.kd_dataSiswa 
                                INNER JOIN kelas ON data_siswakelas.kd_kelas=kelas.kd_kelas
                                INNER JOIN siswa ON data_siswakelas.kd_siswa=siswa.kd_siswa 
                                INNER JOIN guru ON nilai.kd_guru=guru.kd_guru 
                                INNER JOIN mata_pelajaran ON mata_pelajaran.kd_mapel=guru.kd_mapel 
                                $tampil $plus ORDER BY kd_nilai DESC 
                                ")or die(mysqli_error($koneksi));
                               while($data=mysqli_fetch_array($query)): 

                                   ?>
                                   <tr>
                                    <td class="text-center"><?= $no++; ?></td>
                                    <?php if ($_SESSION['level']=="Admin" || $_SESSION['level']=="Guru" ): ?>
                                    <td><?= $data['nama_siswa']; ?></td>
                                    <td><?= $data['nama_kelas']; ?></td>
                                    <td><?= $data['semester']; ?></td>
                                    <td><?= $data['tahun_ajaran']; ?></td>
                                      <?php endif ?>
                                    <td><?= $data['nama_mapel']; ?></td>
                                    <td><?= $data['nama_guru']; ?></td>
                                    <td><?= $data['nilai_tugas1']; ?></td>
                                    <td><?= $data['nilai_tugas2']; ?></td>
                                    <td><?= $data['nilai_tugas3']; ?></td>
                                    <td><?= $data['nilai_tugas4']; ?></td>
                                    <td><?= $data['nilai_tugas5']; ?></td>
                                    <td><?= $data['nilai_uts']; ?></td>
                                    <td><?= $data['nilai_uas']; ?></td>
                                    <td><?= $data['kkm']; ?></td>
                                    <td><?= round($data['total_nilai'],2); ?></td>
                                    <?php 
                                    $nilai=round($data['total_nilai'],2);

                                    if ($nilai < $data['kkm']) {
                                        $keterangan="Remidial";
                                    }elseif ($nilai >= $data['kkm']){
                                        $keterangan="Lulus";
                                    }
                                    ?>
                                   <td <?php if ($keterangan=="Remidial"): ?>
                                    class="text-danger";
                                    <?php endif ?>><?= $keterangan; ?></td>
                                    <?php if ($_SESSION['level']=="Admin" || $_SESSION['level']=="Guru" ): ?>
                                    <td style="text-align:center">
                                        <a href="?page=edit_nilai&kd_nilai=<?php echo $data['kd_nilai']; ?>" class="link"><img name="pencil" src="../assets/img/action/edit.png"></a>

                                        <a href="#hapus" data-href="index.php?page=hapus_nilai&kd_nilai=<?php echo $data['kd_nilai']; ?>" data-bs-toggle="modal" data-target="#hapus"  class="link "><img name="delete" src="../assets/img/action/delete.png"></a>

                                    </td>
                                    <?php endif ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tutup KONTEN TENGAH -->
<!-- Modal -->
<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                
                
                Apakah Anda Yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                <a name="hapus_kd_nilai" class="btn btn-danger btn-yes">YES</a>
            </div>
        </div>
    </div>
</div>
<!-- tutupmodal -->


