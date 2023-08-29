            <div class="container-fluid px-4">
                <h3>Dasboard</h3>
                <div class="row g-3 my-2"> 
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2"><?= $jumlah_siswa; ?></h3>
                                <p class="fs-5">Siswa</p>
                            </div>
                            <i class="fas fa-user-graduate fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                        </div>
                    </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $jumlah_guru; ?></h3>
                            <p class="fs-5">Guru</p>
                        </div>
                        <i class="fas fa-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $jumlah_kelas; ?></h3>
                            <p class="fs-5">Kelas</p>
                        </div>
                        <i class="fas fa-building fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                        <div>
                            <h3 class="fs-2"><?= $jumlah_pengumuman; ?></h3>
                            <p class="fs-5">Pengumuman</p>
                        </div>
                        <i class="fas fa-bullhorn fs-1 primary-text border rounded-full secondary-bg p-3"></i>
                    </div>
                </div>
            </div>

            <!-- KONTEN TENGAH -->
            <div class="col-lg-12">
                <div class="card rounded">
                    <div class="card-body">
                        <h3>Informasi Terbaru</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Detail</th>

                                    </tr>
                                </thead>
                                <?php 
                                require'../connect.php';
                                $no=1;
                                $query=mysqli_query($koneksi, "SELECT * FROM pengumuman ORDER BY kd_pengumuman DESC ")or die(mysqli_error());
                                while($data=mysqli_fetch_array($query)): 

                                    ?>
                                <tbody>
                                    <tr>
                                       <th scope="row"><?= $no++; ?></th>
                                       <td><?= $data['judul']; ?></td>
                                       <td><?= $data['tanggal']; ?></td>
                                       <td>
                                           <a href="?page=detail_pengumuman&kd_pengumuman=<?php echo $data['kd_pengumuman']; ?>" style="text-decoration: none;"><i class="fa-solid fa-eye"></i> Lihat</a>
                                       </td>
                                     
                                    </tr>
                                </tbody>
                                <?php endwhile; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tutup KONTEN TENGAH -->