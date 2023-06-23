<?php
// Mengecek apakah parameter id ada pada URL
if (isset($_GET['No_Identitas'])) {
    $No_Identitas = $_GET['No_Identitas'];

    // Kode untuk koneksi ke database
    include 'koneksi.php';

    // Mengambil data dari tabel cuci berdasarkan id
    $query = "SELECT * FROM detail WHERE No_Identitas = $No_Identitas";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Menutup koneksi database
    mysqli_close($conn);
} else {
    // Jika parameter id tidak ada, redirect ke halaman data detail
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Cuci</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.8.0/dist/css/bootstrap.min.css"
        crossorigin="anonymous">
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.8.0/dist/js/bootstrap.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php">Laundry App</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i
                class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Addons</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                            Chart
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="chartslayanan.php">Jenis Layanan</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">HAVIO 2023</div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Ubah Data Cuci</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="datacuci.php">Data Cuci</a></li>
                        <li class="breadcrumb-item active">Ubah</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST" action="update.php">
                                <input type="hidden" name="No_Identitas" value="<?php echo $row['No_Identitas']; ?>">
                                <div class="mb-3">
                                    <label for="Nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="Nama" name="Nama"
                                        value="<?php echo $row['Nama']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="Alamat" name="Alamat"
                                        value="<?php echo $row['Alamat']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="No_Hp" class="form-label">Nomor HP</label>
                                    <input type="text" class="form-control" id="No_Hp" name="No_Hp"
                                        value="<?php echo $row['No_Hp']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Tgl_Terima" class="form-label">Tanggal Terima</label>
                                    <input type="date" class="form-control" id="Tgl_Terima" name="Tgl_Terima"
                                        value="<?php echo $row['Tgl_Terima']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Tgl_Ambil" class="form-label">Tanggal Ambil</label>
                                    <input type="date" class="form-control" id="Tgl_Ambil" name="Tgl_Ambil"
                                        value="<?php echo $row['Tgl_Ambil']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="jenislayanan" class="form-label">Jenis Layanan</label>
                                    <input type="text" class="form-control" id="jenislayanan" name="jenislayanan"
                                        value="<?php echo $row['jenislayanan']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="dashboard.php" class="btn btn-primary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>