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
                <a href="button.html" class="dropdown-item">Registrasi</a>
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
        <h3 class="page-title"> Registrasi </h3>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
          Tambah Admin/Petugas
        </button>



      </div>


      <div class="row">
        <div class="col-lg-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                  <thead style="background-color:red;color:white">
                    <tr align="center">
                      <th> No </th>
                      <th> Nama </th>
                      <th> Username </th>
                      <th> Password </th>
                      <th> Sebagai </th>
                      <th> Action </th>

                    </tr>
                  </thead>
                  <?php
                  $query = "SELECT * FROM user ORDER BY id ASC";
                  $result = mysqli_query($koneksi, $query);
                  if (!$result) {
                    die("query error: " . mysqli_error($koneksi) . "-" . mysqli_error($koneksi));
                  }

                  $no = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    $edit_modal_id = "editModal" . $row['id']; // ID modal yang unik
                  ?>
                    <tbody style="background-color:black;">
                      <td style="text-align: center;"><?php echo $no; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['username']; ?></td>
                      <td><?php echo $row['password']; ?></td>
                      <td><?php echo $row['level']; ?></td>
                      <td style="text-align: center;">
                        <button type="button" class="btn btn-warning mdi mdi-tooltip-edit" data-toggle="modal" data-target="#<?php echo $edit_modal_id; ?>"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAUJJREFUWEftlE1OAkEQRh8cxZ13YMNhXKkJYkwEYtSNuCCBBSt2nsSVV3DrUSBF6GQyoadquqcmM5He9s/3+nVVD+jYGHSMh38H9AIMgXfrS3gamgDrE8gTsLJAeQEVYQKHCcoD6Br4jdhYAB9VpjyAJO8W2EaCR8BPDKpJoDHwXQg6B7UE5m0YkuKVurkvmbkBdieADfCgFXYThqR7HgtBEirhYdwBV8BUg5H5XKBgppxVNmVhOa7JAYrBhPAkqFQgDUagyk9nspQC5AaT8mTSts/KVZPMhDPrGHKHqWOoFRgrUGswFiALzAz4NLWQYVFVDb0Br8oZjcJohvZtw+QANW7G0vYxQ24wKYZcYTQgKeri+AO+DI2StaTOT50VZN18AdJM9cqQ9jFql9Xmz8qoMnQB0v4hTbnLfK+K2sWAdugBrOs0JatKuQEAAAAASUVORK5CYII=" /> </button>
                        <a title="hapus" class="btn btn-danger mdi mdi-delete" style="font-size: 20px;" href="proses/proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAdlJREFUWEftl7lKxUAUhr9ro42dIoi+jLYunY2dC+ICauWC+4KCKwjaqI0voKKFheJTCGopomIpiIWg90hyGYZMkjuZxIBOl0xm/o9/zjlzUiBno5AzHnIPJIBTwCBQl7J7L8AOsKzq6A5tAqMpg+jbLwIz/ksd6BWoyRjoCag3AX0pMGnHV6CWLvoP5J1IyZgkDjUDl4Z4awKuImLR6ZHNAbPAdkBWbgEj3vxCCJQzoDbgRBFaBSa85xVgXJlrAc4NUM6AZP9doF8RmgcqgGnl3R4wkIVDvsYB0GUQjIKRZU4dkg0lIY6ATg3qEOiOUVxTAdoPcEmAejQHgvicAok7QTC+cByXnALp8fOrQd0OHBvSXkrAmDLXCpxlkfbiiLQMYYVRiqd8ZxpOj0xEcnV1xMjqyE+cOxSpmOXlmhQmdqV+jtncS7BK0PqjAdgAOixIQ1tY/bY27e8DVXm3u9zwlRYwsiS0yZcKPAkMA7UhAgJ0A6wDjZYgj17ZkD1Ko5xG3m/KZPFb8YiqNZA7oA+4tgT8WWYLpGq+A0vAWvEn8zMJjAugU2Co2G48JAXx19s6JAC9wIUrEFsg6Z0lvaV5/3ANU+6RScN+D9ymAWLjUJocVmn/N4G+AeE+biWgYObKAAAAAElFTkSuQmCC" /></a>&nbsp;
                      </td>
                    </tbody>






                    <style>
                      .modal-content {
                        background-color: #000000;
                        /* Ubah warna latar belakang menjadi hitam */
                        color: #ffffff;
                        /* Ubah warna teks menjadi putih */
                      }

                      .form-control {
                        background-color: #ffffff;
                        /* Ubah warna latar belakang input form */
                        color: #000000;
                        /* Ubah warna teks input form */
                      }

                      .form-check-input:checked {
                        background-color: #ffffff;
                        /* Ubah warna latar belakang radio button ketika dipilih */
                      }

                      .form-check-input:checked+.custom-label {
                        color: #000000;
                        /* Ubah warna teks label radio button ketika dipilih */
                      }

                      .card {
                        background-color: black;
                        /* Ubah warna latar belakang card menjadi hitam */
                        color: white;
                        /* Ubah warna teks pada card menjadi putih */
                      }
                    </style>





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
                            <form class="needs-validation" action="proses/proses_edit.php" method="post">
                              <div class="row">
                                <div class="col-md-12 mb-3">
                                  <label for="firstName">Nama</label>
                                  <input type="text" class="form-control" name="nama" id="firstName" placeholder="" value="<?php echo $row['nama']; ?>" required="">
                                  <div class="invalid-feedback">
                                    Valid first name is required.
                                  </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="lastName">Username</label>
                                  <input type="text" class="form-control" name="username" id="lastName" placeholder="" value="<?php echo $row['username']; ?>" required="">
                                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
                                  <div class="invalid-feedback">
                                    Valid last name is required.
                                  </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label for="lastName">Password</label>
                                  <input type="text" class="form-control" name="password" id="lastName" placeholder="" value="<?php echo $row['password']; ?>" required="">
                                  <div class="invalid-feedback">
                                    Valid last name is required.
                                  </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                  <label class="" for="">Sebagai</label>
                                  <div class="form-inline">
                                    <div class="form-check form-check-inline">
                                      <input class="form-check-input" type="radio" name="sebagai" id="inlineRadio1" value="Admin">
                                      <label class="custom-label text-white" for="inlineRadio1">Admin</label>
                                    </div>
                                    <div class="form-check form-check-inline">
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