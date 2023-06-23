<?php
// Memeriksa apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengecek apakah parameter id ada pada data yang dikirim
    if (isset($_POST['No_Identitas'])) {
        $No_Identitas = $_POST['No_Identitas'];

        // Kode untuk koneksi ke database
        include 'koneksi.php';

        // Mengambil data dari form
        $Nama = $_POST['Nama'];
        $Alamat = $_POST['Alamat'];
        $No_Hp = $_POST['No_Hp'];
        $Tgl_Terima = $_POST['Tgl_Terima'];
        $Tgl_Ambil = $_POST['Tgl_Ambil'];
        $jenislayanan = $_POST['jenislayanan'];

        // Query untuk memperbarui data pada tabel cuci
        $query = "UPDATE detail SET Nama = '$Nama', Alamat = '$Alamat', No_Hp = '$No_Hp', Tgl_Terima = '$Tgl_Terima', Tgl_Ambil = '$Tgl_Ambil', jenislayanan = '$jenislayanan' WHERE No_Identitas = $No_Identitas";
        $result = mysqli_query($conn, $query);

        // Menutup koneksi database
        mysqli_close($conn);

        // Redirect ke halaman datacuci.php setelah berhasil memperbarui data
        header('Location: dashboard.php');
        exit();
    }
}
?>