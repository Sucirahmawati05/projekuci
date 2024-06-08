<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Dashboard | Admin</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="../img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <div class="container-fluid position-relative d-flex p-0">
    <!-- Spinner Start -->

    <!-- Spinner End -->


    <!-- Sidebar Start -->
    <?php
    include '../koneksi.php';
    session_start();
    $id = $_SESSION['id'];

    $query = "SELECT * FROM user where id='$id'";
    $result = mysqli_query($koneksi, $query);

    if (!$result) {
      die("Query Error : " . mysqli_error($koneksi) . "-" . mysqli_error($koneksi));
    }
    $no = 1;

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <div class="sidebar pe-4 pb-3">
        <nav class="navbar bg-secondary navbar-dark">
          <a href="admin.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"></i>Dashboard</h3>
          </a>
          <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
              <img class="rounded-circle" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
              <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
              <h6 class="mb-0"><?php echo $row['nama'] ?></h6>
              <span><?php echo $row['level'] ?></span>
            </div>
          </div>
          <div class="navbar-nav w-100">
            <a href="admin.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Data Master</a>
              <div class="dropdown-menu bg-transparent border-0">
                <a href="registrasi.php" class="dropdown-item">Registrasi</a>
                <a href="input_gelombang.php" class="dropdown-item">Input Gelombang</a>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="widget.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-th me-2"></i>Pendaftaran</a>
              <div class="dropdown-menu bg-transparent border-0">
                <a href="daftar_baru.php" class="dropdown-item">Daftar Baru</a>
                <a href="data_siswa.php" class="dropdown-item">Data Siswa</a>
                <a href="data_kaos.php" class="dropdown-item">Data kaos</a>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="form.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa-solid fa-receipt me-2"></i>Pembayaran</a>
              <div class="dropdown-menu bg-transparent border-0">
                <a href="transaksi.php" class="dropdown-item">Transaksi</a>
                <a href="data_pembayaran.php" class="dropdown-item">Data Pembayaran</a>
              </div>
            </div>
            <a href="logout.php" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log Out</a>
          </div>
      </div>
  </div>
  </nav>
  </div>
  <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="needs-validation" action="proses/pros_edit_baru.php" method="post">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">No Pendaftaran</label>
                <input type="text" class="form-control" name="no_pendaftaran" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">tanggal</label>
                <input type="text" class="form-control" name=" tanggal" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Password</label>
                <input type="text" class="form-control" name="password" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label class="" for="">Sebagai</label>
                <div class="form-inline">
                  <div class="form-check form-check-inline mr-3"> <!-- Tambahkan margin kanan -->
                    <input class="form-check-input" type="radio" name="sebagai" id="inlineRadio1" value="Admin">
                    <label class="custom-label text-white" for="inlineRadio1">Admin</label>
                  </div>
                  <div class="form-check form-check-inline"> <!-- Tambahkan margin kiri dan kanan -->
                    <input class="form-check-input" type="radio" name="sebagai" id="inlineRadio2" value="Petugas">
                    <label class="custom-label text-white" for="inlineRadio2">Petugas</label>
                  </div>
                </div>
              </div>


            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Sidebar End -->


  <!-- Content Start -->
  <div class="content">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
      <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
      </a>
      <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
      </a>
      <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-dark border-0" type="search" placeholder="Search">
      </form>
      <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-envelope me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Pesan</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">
              <div class="d-flex align-items-center">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="ms-2">
                  <h6 class="fw-normal mb-0">Lia Mengirimkan pesan</h6>
                  <small>15 menit yang lalu</small>
                </div>
              </div>
            </a>


            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item text-center">See all message</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-bell me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Notifikasi</span>
          </a>
          <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">
              <h6 class="fw-normal mb-0">Profile updated</h6>
              <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
              <h6 class="fw-normal mb-0">New user added</h6>
              <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
              <h6 class="fw-normal mb-0">Password changed</h6>
              <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item text-center">See all notifications</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img class="rounded-circle me-lg-2" src="../img/user.jpg" alt="" style="width: 40px; height: 40px;">
            <span class="d-none d-lg-inline-flex"><?php echo $row['nama'] ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">My Profile</a>
            <a href="#" class="dropdown-item">Settings</a>
            <a href="logout.php" class="dropdown-item">Log Out</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- Navbar End -->
  <?php
    }
  ?>
   <div class="main-panel">
          <div class="content-wrapper">
           


            <div class="row">
              <div class="col-lg-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                        <thead style="background-color:red;">
                          <tr align="center">
                            <th> No Pendaftaran </th>
                            <th> Tanggal </th>
                            <th> Nama </th>
                            <th> Asal Sekolah </th>
                            <th> Jurusan </th>
                            <th> Action </th>

                          </tr>
                        </thead>
                        <?php
                        $query = "SELECT * FROM data_siswa ORDER BY id ASC";
                        $result = mysqli_query($koneksi, $query);
                        if (!$result) {
                          die("query error: " . mysqli_error($koneksi) . "-" . mysqli_error($koneksi));
                        }

                        $no = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                          $edit_modal_id = "editModal" . $row['id']; // ID modal yang unik
                        ?>
                          <tbody style="background-color:white;">
                            <td style="text-align: center;"><?php echo $row['no_pendaftaran']; ?></td>
                            <td><?php echo $row['tanggal']; ?></td>
                            <td><?php echo $row['nama_siswa']; ?></td>
                            <td><?php echo $row['asal_sekolah']; ?></td>
                            <td><?php echo $row['jurusan']; ?></td>
                            <td style="text-align: center;">
                              <button type="button" class="btn btn-warning mdi mdi-tooltip-edit" data-toggle="modal"  data-target="#<?php echo $edit_modal_id; ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAWdJREFUSEvFlLlKRDEUhr9pLOwEcQoFwUJRcasVt9Z3EsX38QnGfXkDC/cFRRQLtXCpND+cyJ0xud7ccZg0uWSG7zv5c5IKLR6VFvNpRtABLAGdwDrwHiq2rKAL2AQmDXoJzAM3jZIyAsG3gAngHngFhux7CnjISlIF3cCGi2QcOAMWgQ+gZmurDr5SVtDjYtgGhg1wbrF8mnQMWAOWywiqFovgj8AzMAjcAm/2rXVJNP+MIhEJfggMAHfucGeBFxfPLjBiJL9+kXrIjfBp4BrIdpHgfv1Xp+btoNeq9JVn4XvAqMnmbA7e2ZhA8AOg32KJwbWuHURHSCDozn/AZQ0JrgyuWbdTmav/dXPVJaeugIW/KvdbCgm+7Mc+gwiu/lfmJ9ZFdbc1NSIvkFzwfXsKjt1d0IEWhsci8oJsYYLPAE+pz3teRJ51ZGeRDI/tILXI3P8XeSqaEhaJKFVQx2yLILXi9p7BNyiKUBlj03X8AAAAAElFTkSuQmCC"/></button>
                              <a title="hapus" class="btn btn-danger mdi mdi-delete" style="font-size: 20px;" href="proses/prod_hapus_siswa.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAXFJREFUSEvF1c9KFmEUx/GP5iUkBoKWCXYLSaFegZvoBgSRtorgHdhKXISLQHDTJbj1L7gXxD+UFgiaeQlBzYFnYBjfsXGcl57dzDPP73vO75znTI8ur54u6ysDprGMVw3Bx1jAZn6+DLjEYEPx/Ng5XlYB/qSNptbdOV8W+m+ARWzgZ8owbHyPlZKdjTL4gE/4jrdJcA/PMZvV7HMB0gjwDNsYwwV6MYwTTOH6sYA4P5CJ7SRIPB9l0EnctmFRaDzFfgFwijdtAYrRRx1ihf9xqcKivPDxvlEN5jKL1vAt2RJCYdcIZrDeRg3m8QVXhTZ9h9W2alB3ejSyqK54rRr8yDwd6qAYBY22vEl7cTe2KqZuNMKLqmEX4/pjoR2LrLMEeZLERzsEcoil+8Z1Jzv6sZuijU7qSzc5sprAr/s8rDuWw5KYP3nUXzH+L/EA1wXEtwE5SNG+Ls2gyiQeAshv8G/En6/Weiiglmjxo64D/gLYDU4ZPubtFQAAAABJRU5ErkJggg=="/></a>&nbsp;
                            </td>
                          </tbody>

                          <!-- Modal -->
                          <!-- Modal -->
                        <div class="modal fade" id="<?php echo $edit_modal_id; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Modal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form class="needs-validation" action="proses/pros_edit_baru.php" method="post">
                                  <div class="row">
                                    <div class="col-md-6 mb-3">
                                      <label for="firstName">No Pendaftaran</label>
                                      <input type="text" class="form-control" name="no_pendaftaran" id="firstName" placeholder="" value="<?php echo $row['no_pendaftaran']; ?>" required="" readonly>
                                      <div class="invalid-feedback">
                                        Valid first name is required.
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="lastName">Tanggal</label>
                                      <input type="text" class="form-control" name="tanggal" id="lastName" placeholder="" value="<?php echo $row['tanggal']; ?>" required="" readonly>
                                      <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                      <div class="invalid-feedback">
                                        Valid last name is required.
                                      </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                      <label for="lastName">Nama Siswa</label>
                                      <input type="text" class="form-control" name="nama_siswa" id="lastName" placeholder="" value="<?php echo $row['nama_siswa']; ?>" required="">
                                      <div class="invalid-feedback">
                                        Valid last name is required.
                                      </div>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                      <label for="lastName">Asal Sekolah</label>
                                      <input type="text" class="form-control" name="asal_sekolah" id="lastName" placeholder="" value="<?php echo $row['asal_sekolah']; ?>" required="">
                                      <div class="invalid-feedback">
                            Please select a valid country.
                                             </div>
                                    </div>

                                      <div class="col-md-12 mb-3">
                                      <label for="country">Jurusan</label>
                                      <select class="custom-select d-block w-100" name="jurusan" id="country" required="">
                                        <option value="">Pilih...</option>
                                        <option <?php if ($row['jurusan'] == 'REKAYASA PERANGKAT LUNAK') echo 'selected'; ?>>REKAYASA PERANGKAT LUNAK</option>
                                        <option <?php if ($row['jurusan'] == 'AKUTANSI KEUANGAN DAN LEMBAGA') echo 'selected'; ?>>AKUTANSI KEUANGAN DAN LEMBAGA</option>
                                        <option <?php if ($row['jurusan'] == 'MANANJEMEN PERKANTORAN') echo 'selected'; ?>>MANANJEMEN PERKANTORAN</option>
                                        <option <?php if ($row['jurusan'] == 'DESAIN KOMUNIKASI VISUAL') echo 'selected'; ?>>DESAIN KOMUNIKASI VISUAL</option>
                                        <option <?php if ($row['jurusan'] == 'PEMASARAN') echo 'selected'; ?>>PEMASARAN</option>
                                        </select>
                                        <div class="invalid-feedback">
                            Please select a valid country.
                                             </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <!-- Modal -->
  

                        <?php
                          $no++;
                        }
                        ?>



                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            
          <!-- TUTUP NAVBAR ISI -->



          <!-- partial:../../partials/_footer.html -->

          <!-- FOOTER -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©suci</span>
            </div>
          </footer>
          <!-- TUTUP FOOTER -->


          <!-- partial -->
        </div>
      </div>


  </div>


  <!-- Sale & Revenue Start -->

  <!-- Sale & Revenue End -->


  <!-- Sales Chart Start -->

  <!-- Sales Chart End -->


  <!-- Recent Sales Start -->

  <!-- Recent Sales End -->


  <!-- Widgets Start -->

  <!-- Widgets End -->


  <!-- Footer Start -->
  <!-- Content End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <script src="../lib/chart/chart.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/tempusdominus/js/moment.min.js"></script>
  <script src="../lib/tempusdominus/js/moment-timezone.min.js"></script>
  <script src="../lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

  <!-- Template Javascript -->
  <script src="../js/main.js"></script>
  <script>
    $(document).ready(function() {
      $('#myModal').modal();
    });
  </script>

</body>

</html>