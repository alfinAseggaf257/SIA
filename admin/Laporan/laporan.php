<div class="container-fluid px-4">
  <h3>Laporan</h3>
  <!-- KONTEN TENGAH -->
  <div class="col-lg-12">
    <div class="card rounded">
      <div class="card-header ">
        List Data Laporan
      </div>
      <div class="card-body">
        <h3>Data Laporan</h3>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Laporan</th>
                <th scope="col">Link</th>
              </tr>
            </thead>
            <?php 
            $no=1;
            ?>
            <tbody>
              <?php if ($_SESSION['level'] == "Admin"){ ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Diri Siswa</td>
                  <td>
                    <a href="?page=laporan_datadirisiswa">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Diri Guru</td>
                  <td>
                    <a href="?page=laporan_datadiriguru">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Kelas</td>
                  <td>
                    <a href="Laporan/fpdf/laporan_kelas.php" target="_blank">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Siswa Kelas </td>
                  <td>
                    <a href="?page=laporan_siswakelas" >Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Mata Pelajaran</td>
                  <td>
                    <a href="Laporan/fpdf/Laporan_mapel.php" target="_blank">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Nilai</td>
                  <td>
                    <a href="?page=laporan_nilai">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Pengguna</td>
                  <td>
                    <a href="Laporan/fpdf/Laporan_pengguna.php" target="_blank">Klik disini</a>
                  </td>
                </tr>
              <?php }else if($_SESSION['level']=="Guru"){?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Kelas</td>
                  <td>
                    <a href="Laporan/fpdf/laporan_kelas.php" target="_blank">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Siswa Kelas </td>
                  <td>
                    <a href="?page=laporan_siswakelas" >Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Mata Pelajaran</td>
                  <td>
                    <a href="Laporan/fpdf/Laporan_mapel.php" target="_blank">Klik disini</a>
                  </td>
                </tr>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td>Data Nilai</td>
                  <td>
                    <a href="?page=laporan_nilai">Klik disini</a>
                  </td>
                </tr>
              <?php }else if($_SESSION['level']=="Siswa"){?>
              <?php }?>
            </tbody>

          </table>
        </div>
      </div>
      <br><br>
    </div>
  </div>
</div>
</div>
<!-- tutup KONTEN TENGAH -->
