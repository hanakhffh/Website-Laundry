<!DOCTYPE html>
<html lang="en">

<head>
    <title>USA LAUNDRY</title>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top" style="background-color: rgb(55, 81, 126);">
        <div class="container d-flex align-items-center ">
            <h1 class="logo me-auto"><a href="customer.php">USA LAUNDRY</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li class="dropdown">
                        <a href="#"><span>Akun</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="index.html">Logout</a></li>
                    </li>
                </ul>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->
    <?php
$error_No_Identitas="";
$error_Nama = "";
$error_Alamat = "";
$error_No_Hp = "";
$error_Tgl_Terima="";
$error_Tgl_Ambil="";
$error_jenislayanan= "";
$error_ambil="";
$error_jemput="";

$No_Identitas="";
$Nama = "";
$Alamat = "";
$No_Hp = "";
$Tgl_Terima="";
$Tgl_Ambil="";
$jenislayanan= "";
$ambil="";
$jemput="";

function cek_input($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
    <div class="card">
        <div class="card-body">
            <form method="post" action="prosespemesanan.php">
                <br><br><br>

                <div class="form-group row">
                    <label for="No_Identitas" class="col-sm-2 col-form-label">No_Identitas</label>
                    <div class="col-sm-10">
                        <input type="text" name="No_Identitas" id="No_Identitas"
                            class="form-control <?php echo ($error_Nama !="" ? "is-invalid" : ""); ?>"
                            placeholder="No_Identitas" value="<?php echo $No_Identitas; ?>"> <span
                            class="warning"><?php echo $error_No_Identitas ?></span>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label for="Nama" class="col-sm-2 col-form-label">Nama Customer</label>
                    <div class="col-sm-10">
                        <input type="text" name="Nama" id="Nama"
                            class="form-control <?php echo ($error_Nama !="" ? "is-invalid" : ""); ?>"
                            placeholder="Masukan Nama Anda" value="<?php echo $Nama; ?>"> <span
                            class="warning"><?php echo $error_Nama ?></span>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label for="Alamat" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" name="Alamat" id="Alamat"
                            class="form-control <?php echo ($error_Alamat !="" ? "is-invalid" : ""); ?>"
                            placeholder="Masukan Alamat Lengkap Anda" value="<?php echo $Alamat; ?>"> <span
                            class="warning"><?php echo $error_Alamat ?></span>
                    </div>
                </div><br>
                <div class="form-group row">
                    <label for="No_Hp" class="col-sm-2 col-form-label">No Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" name="No_Hp" id="No_Hp"
                            class="form-control <?php echo ($error_No_Hp !="" ? "is-invalid" : ""); ?>"
                            placeholder="+62" value="<?php echo $No_Hp; ?>"> <span
                            class="warning"><?php echo $error_No_Hp ?></span>
                    </div>
                </div><br>

                <div class="form-group row">
                    <label for="Tgl_Terima" class="col-sm-2 col-form-label">Tanggal Cuci</label>
                    <div class="col-sm-10">
                        <td>
                            <input type="date" name="Tgl_Terima">
                        </td>
                    </div>
                </div>
                <br><br>

                <div class="form-group row">
                    <label for="jemput" class="col-sm-2 col-form-label">Apakah Perlu Dijemput </label>
                    <div class="col-sm-10">
                        <input type="radio" name="jemput" value="Ya">Ya</label>
                        <input type="radio" name="jemput" value="Tidak">Tidak</label>
                        <span class="warning"><?php echo $error_jemput; ?></span>
                    </div>
                </div>

                <br><br>

                <div class="form-group row">
                    <label for="Tgl_Ambil" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-10">
                        <td>
                            <input type="date" name="Tgl_Ambil">
                        </td>
                    </div>
                </div>
                <br><br>

                <div class="form-group row">
                    <label for="ambil" class="col-sm-2 col-form-label">Ambil Sendiri</label>
                    <div class="col-sm-10">
                        <input type="radio" name="ambil" value="Ya">Ya</label>
                        <input type="radio" name="ambil" value="Tidak">Tidak</label>
                        <span class="warning"><?php echo $error_ambil; ?></span>
                    </div>
                </div>

                <br><br>
                <div class="form-group row">
                    <label for="jenislayanan" class="col-sm-2 col-form-label "> Jenis Pemesanan </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="jenislayanan">
                            <option value=""></option>
                            <option value="Cuci Kering"> Cuci Kering </option>
                            <option value="Cuci Basah"> Cuci basah </option>
                            <option value="Cuci Seterika"> Cuci Seterika </option>
                            <option value="Dray Cleaning"> Dray Cleaning </option>
                        </select>
                        <span class="warning"><?php echo $error_jenislayanan; ?></span>
                    </div>
                </div><br>

                <br>
                <button type="submit" name="submit" class="btn btn-primary">Simpan Bukti</button>
            </form>
        </div>
    </div>
</body>
<!-- End #main -->
<br><br><br>
<footer id="footer">
    <div class="container footer-bottom clearfix">
        <div class="copyright">
            &copy; Copyright <strong><span>HAVIO</span></strong>. 2023
        </div>
    </div>
</footer>
<!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>

</html>