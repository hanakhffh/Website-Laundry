<?php
// Kode untuk koneksi ke database
include 'koneksi.php';

// Memeriksa apakah parameter No_Identitas telah diterima
if (isset($_GET['No_Identitas'])) {
    // Mendapatkan nilai No_Identitas dari parameter
    $No_Identitas = $_GET['No_Identitas'];

    // Query untuk mengambil data pelanggan berdasarkan No_Identitas
    $query = "SELECT * FROM pelanggan WHERE No_Identitas = '$No_Identitas'";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah data pelanggan ditemukan
    if (mysqli_num_rows($result) == 1) {
        // Mendapatkan data pelanggan
        $row = mysqli_fetch_assoc($result);

        // Memeriksa apakah form telah disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Mendapatkan nilai inputan form
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];

            // Query untuk mengubah data pelanggan
            $query_update = "UPDATE pelanggan SET Nama = '$nama', Alamat = '$alamat', No_Hp = '$no_hp' WHERE No_Identitas = '$No_Identitas'";
            $result_update = mysqli_query($conn, $query_update);

            // Memeriksa apakah query update berhasil
            if ($result_update) {
                // Redirect ke halaman data pelanggan
                header("Location: datacustomer.php");
                exit();
            } else {
                echo "Gagal mengubah data pelanggan. Silakan coba lagi.";
            }
        }
    } else {
        echo "Data pelanggan tidak ditemukan.";
    }

    // Menutup koneksi database
    mysqli_close($conn);
} else {
    echo "No_Identitas tidak ditemukan.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Customer</title>
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
                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
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
                    <h1 class="mt-4">Ubah Customer</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="datacustomer.php">Data Customer</a></li>
                        <li class="breadcrumb-item active">Ubah Customer</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="<?php echo $row['Nama']; ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat"
                                        name="alamat"><?php echo $row['Alamat']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No. HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        value="<?php echo $row['No_Hp']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="datacustomer.php" class="btn btn-secondary">Batal</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>