<?php 
include 'koneksi.php';

$No_Identitas= $_POST['No_Identitas'];
$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$No_Hp = $_POST['No_Hp'];
$Tgl_Terima = $_POST['Tgl_Terima'];
$Tgl_Ambil = $_POST['Tgl_Ambil'];
$jenislayanan =$_POST['jenislayanan'];
$ambil=$_POST['ambil'];
$jemput=$_POST['jemput'];

// Menyimpan ke database
$sql = mysqli_query($conn, "INSERT INTO detail (No_Identitas, Nama, Alamat, No_Hp, Tgl_Terima, Tgl_Ambil, jenislayanan, ambil, jemput) 
VALUES ('$No_Identitas','$Nama', '$Alamat', '$No_Hp','$Tgl_Terima','$Tgl_Ambil', '$jenislayanan', '$ambil', '$jemput')");
$sql = mysqli_query($conn, "INSERT INTO pelanggan (No_Identitas, Nama, Alamat, No_Hp) 
VALUES ('$No_Identitas','$Nama', '$Alamat', '$No_Hp')");
      if ($sql) {
          // pesan jika data tersimpan
          echo "<script>alert('Lihat Data Anda?'); window.location.href='tampilnota.php'</script>"; 
        } else {
          // pesan jika data gagal disimpan
            echo "alert('Data customer Gagal Ditambahkan!!');";
        }
?>