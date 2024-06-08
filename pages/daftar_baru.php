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
                <a href=" data_siswa.php" class="dropdown-item">Data Siswa</a>
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
            <a href="index.php" class="nav-item nav-link"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Log Out</a>
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
          <form class="needs-validation" action="proses/proses_tambah.php" method="post">
            <div class="row">
              <div class="col-md-12 mb-3">
                <label for="firstName">Nama</label>
                <input type="text" class="form-control" name="nama" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Username</label>
                <input type="text" class="form-control" name="username" id="lastName" placeholder="" value="" required="">
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
          <div class="page-header">
            <h3 class="page-title"> Material design icons </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Icons</a></li>
                <li class="breadcrumb-item active" aria-current="page">Material design icons</li>
              </ol>
            </nav>
          </div>

          <?php
          // Ambil nomor pendaftaran tertinggi dari tabel data_siswa
          $sql = "SELECT MAX(no_pendaftaran) AS max_registration_number FROM data_siswa";
          $result = $koneksi->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_registration_number = $row["max_registration_number"];

            // Jika tidak ada nomor pendaftaran sebelumnya, mulai dari BYR001
            if ($last_registration_number === null) {
              $new_registration_number = "BYR001";
            } else {
              // Ubah nomor pendaftaran terakhir ke nomor pendaftaran baru
              $last_number = intval(substr($last_registration_number, 3));
              $next_number = $last_number + 1;
              $new_registration_number = "BYR" . sprintf("%03d", $next_number);
            }
          } else {
            // Penanganan kesalahan jika query tidak berhasil
            echo "Error: " . $koneksi->error;
          }

          // Gunakan $new_registration_number sesuai kebutuhan di sini



          ?>
          <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="col-md-12 order-md-1">
                    <h4 class="mb-3">Biodata Siswa</h4>


                    <form class="needs-validation" action="proses/pos_tambah_baru.php" method="post">
                      <div class="row">
                        <div class="col-md-2 mb-3">
                          <label for="firstName">No Pendaftaran</label>
                          <input type="text" class="form-control " name="no_pendaftar" id="no_pen" placeholder="" value="<?php echo $new_registration_number; ?>" required="" readonly style="color: black;">

                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>

                        </div>

                        <div class="col-md-5 mb-3">
                          <label for="lastName">Nama Lengkap</label>
                          <input type="text" class="form-control text-black " name="nama_siswa" id="lastName" placeholder="" value="" required="">
                          <input type="hidden" name="tanggal" placeholder="" value="<?php echo date('d-m-Y'); ?>" required="">
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>
                        <div class="col-md-5 mb-3">
                          <label for="firstName">Tempat,Tanggal Lahir</label>
                          <input type="text" class="form-control text-black" name="ttl" id="firstName" placeholder="" value="" required="">
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                      </div>
                      <?php
                      $query = "SELECT * FROM tbl_gel ORDER BY id ASC";
                      $result = mysqli_query($koneksi, $query);
                      
                      if (!$result){
                        die("query error:" . mysqli_error($koneksi));
                      }
                      ?>

                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="gelombang">Gelombang</label>
                          <select class="custom-select d-block w-100" name="gelombang" id="gelombang" required="">
                          <option value="">Pilih...</option>
                          <?php

                          while ($row = mysqli_fetch_assoc($result)){
                            echo '<option value="' . $row['gelombang'] . '">' . $row['gelombang'] . '</option>';

                          }
                          ?>
                        </select>
                        <div class="invalid-feedback">
                          silahkan pilih gelombang
                        </div>
                        </div>
                      </div>

                      <div class="row">

                        <div class="col-md-6 mb-3">
                          <label class="" for="">Jenis Kelamin</label>
                          <div class="form-inline">
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenis" id="inlineRadio1" value="Laki-Laki">
                              <label class="custom-label text-white" for="inlineRadio1">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="jenis" id="inlineRadio2" value="Perempuan">
                              <label class="custom-label text-white" for="inlineRadio2">Perempuan</label>
                            </div>
                          </div>
                        </div>

                      </div>

                  </div>
                  <h4 class="col-md-6 mb-3">Agama</h4>

                  <div class="d-block col-md-6 mb-3">
                    <div class="row">
                      <div class="col-4">
                        <div class="cuform-control text-white custom-radio">
                          <input id="credit" name="agama" type="radio" class="cuform-control text-white-input" checked="" required="" value="Islam">
                          <label class="cuform-control text-white-label" for="credit">Islam</label>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="cuform-control text-white custom-radio">
                          <input id="debit" name="agama" type="radio" class="cuform-control text-white-input" required="" value="Kristen">
                          <label class="cuform-control text-white-label" for="debit">Kristen</label>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="cuform-control text-white custom-radio">
                          <input id="paypal" name="agama" type="radio" class="cuform-control text-white-input" required="" value="Katolik">
                          <label class="cuform-control text-white-label" for="paypal">Katolik</label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-4">
                        <div class="cuform-control text-white custom-radio">
                          <input id="paypal" name="agama" type="radio" class="cuform-control text-white-input" required="" value="Hindu">
                          <label class="cuform-control text-white-label" for="paypal">Hindu</label>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="cuform-control text-white custom-radio">
                          <input id="paypal" name="agama" type="radio" class="cuform-control text-white-input" required="" value="Buddha">
                          <label class="cuform-control text-white-label" for="paypal">Buddha</label>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="cuform-control text-white custom-radio">
                          <input id="paypal" name="agama" type="radio" class="cuform-control text-white-input" required="" value="Konghuchu">
                          <label class="cuform-control text-white-label" for="paypal">Konghuchu</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="firstName">No Telepon Siswa</label>
                      <input type="text" class="form-control text-black" name="no_telpSiswa" id="firstName" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <label for="firstName">Asal Sekolah </label>
                      <input type="text" class="form-control text-black" name="asal" id="firstName" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>

                  </div>


                  <div class="mb-3 col-md-14">
                    <label for="address">Alamat Sekolah</label>
                    <textarea class="form-control text-black" id="address" name="alamat_sekolah" placeholder="1234 Main St" required="" cols="30" rows="10"></textarea>
                    <div class="invalid-feedback">
                      Please enter your shipping address.
                    </div>
                  </div>

                  <div class="col-md-14 mb-3">
                    <label for="country">Pilih Jurusan</label>
                    <select class="custom-select d-block w-100" name="jurusan" id="country" required="">
                      <option value="">Pilih...</option>
                      <option>REKAYASA PERANGKAT LUNAK</option>
                      <option>AKUTANSI KEUANGAN DAN LEMBAGA</option>
                      <option>MANANJEMEN PERKANTORAN</option>
                      <option>DESAIN KOMUNIKASI VISUAL</option>
                      <option>PEMASARAN</option>
                    </select>
                    <div class="invalid-feedback">
                      Please select a valid country.
                    </div>
                  </div>

                  <h4 class="mb-3">Biodata Orang Tua</h4>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="cc-name">Nama Orang Tua</label>
                      <input type="text" class="form-control text-black" id="cc-name" name="nama_ortu" placeholder="">
                      <small class="text-muted">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>


                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="address">Alamat Orang Tua</label>
                      <textarea class="form-control text-black" id="address" name="alamat_ortu" placeholder="1234 Main St" cols="50" rows="7"></textarea>
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <label for="cc-name">No Telepon</label>
                          <input type="text" class="form-control text-black" name="no_telpOrtu" id="cc-name" placeholder="">
                          <div class="invalid-feedback">
                            Name on card is required
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="cc-name">Pekerjaan</label>
                          <input type="text" class="form-control text-black" name="pekerjaan_ortu" id="cc-name" placeholder="">
                          <div class="invalid-feedback">
                            Name on card is required
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <h4 class="mb-3">Biodata Wali</h4>

                  <div class="row">
                    <div class="col-md-6 mb-3">
                      <label for="cc-name">Nama Wali</label>
                      <input type="text" class="form-control text-black" id="cc-name" name="nama_wali" placeholder="">
                      <small class="text-muted">Full name as displayed on card</small>
                      <div class="invalid-feedback">
                        Name on card is required
                      </div>
                    </div>


                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label for="address">Alamat Wali</label>
                      <textarea class="form-control text-black" id="address" name="alamat_wali" placeholder="1234 Main St" cols="50" rows="7"></textarea>
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-12 mb-3">
                          <label for="cc-name">No Telepon</label>
                          <input type="text" class="form-control text-black" name="no_telpWali" id="cc-name" placeholder="">
                          <div class="invalid-feedback">
                            Name on card is required
                          </div>
                        </div>
                        <div class="col-md-12 mb-3">
                          <label for="cc-name">Pekerjaan</label>
                          <input type="text" class="form-control text-black" name="pekerjaan_wali" id="cc-name" placeholder="">
                          <div class="invalid-feedback">
                            Name on card is required
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <button class="btn btn-primary btn-lg btn-block" type="submit">Simpan Data</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- TUTUP NAVBAR ISI -->


          <!-- partial:../../partials/_footer.html -->

          <!-- FOOTER -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © suci</span>
            </div>
          </footer>
          <!-- TUTUP FOOTER -->


          <!-- partial -->
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