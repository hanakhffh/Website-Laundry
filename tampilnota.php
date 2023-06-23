<html>

<head>
    <title>Nota Laundry</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
</head>

<body>
    </div>
    <div class="card-header bg-dark text-white">
        Nota Laundry
    </div>
    <div class="card-body">
        <form method="post" action="logout.php">
            <div class="form-group row">
                <table class="table table-bordered table-sm">
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No.Hp</th>
                        <th>Tanggal Cuci</th>
                        <th>Jemput Baju</th>
                        <th>Tanggal Selesai</th>
                        <th>Ambil Baju</th>
                        <th>Jenis Layanan</th>
                    </tr>
                    <?php
                    include 'koneksi.php';
                    $datapribadi = mysqli_query($conn, "SELECT * FROM detail");
                    foreach ($datapribadi as $row) {
           

                echo "<tr>
                    <td>" . $row['Nama'] . "</td>
                    <td>" . $row['Alamat'] . "</td>
                    <td>" . $row['No_Hp'] . "</td>
                    <td>" . $row['Tgl_Ambil'] . "</td>
                    <td>" . $row['jemput'] . "</td>
                    <td>" . $row['Tgl_Terima'] . "</td>
                    <td>" . $row['ambil'] . "</td>
                    <td>" . $row['jenislayanan'] . "</td>
                <tr>";
                      
                    }
                    ?>
                </table>
            </div>
            <br>
        </form>
    </div>
    </div>
    <form action="customer.php" method="POST">
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="kembali" name="kembali" class="btn btn-primary">back</button>
            </div>
        </div>
    </form>
    <form action="report.php" method="POST">
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="cetak" name="catak" class="btn btn-primary">Cetak Nota</button>
            </div>
        </div>
    </form>


</body>

</html>