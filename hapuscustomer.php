<?php
// Kode untuk koneksi ke database
include 'koneksi.php';

// Mendapatkan No_Identitas dari parameter URL
$No_Identitas = $_GET['No_Identitas'];

// Query untuk menghapus data pelanggan berdasarkan No_Identitas
$query = "DELETE FROM pelanggan WHERE No_Identitas = '$No_Identitas'";
$result = mysqli_query($conn, $query);

// Menutup koneksi database
mysqli_close($conn);

// Mengalihkan kembali ke halaman datacustomer.php setelah berhasil menghapus data
header("Location: datacustomer.php");
exit();
?>