<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$query = mysqli_query($conn, "select * from detail");
$html = '<center><h3>Nota Pembelian</h3></center><hr/><br><br><br><br>';
$html .= '<table border="1" width="100%">
<tr>
    <th>No_Identitas</th>
    <th>Nama</th>
    <th>Alamat</th>
    <th>No_Hp</th>
    <th>Tgl_Terima</th>
    <th>Tgl_Ambil</th>
    <th>jenislayanan</th>
    <th>ambil</th>
    <th>jemput</th>

</tr>';
$no = 1;

while($row = mysqli_fetch_array($query))
{
   $html .= "<tr>
    <td>".$no."</td>
    <td>".$row['Nama']."</td>
    <td>".$row['Alamat']."</td>
    <td>".$row['No_Hp']."</td>
    <td>".$row['Tgl_Terima']."</td>
    <td>".$row['Tgl_Ambil']."</td>
    <td>".$row['jenislayanan']."</td>
    <td>".$row['ambil']."</td>
    <td>".$row['jemput']."</td>
   </tr>";
   $no++;
}

$html .= "</table></html>";
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream('probrist.pdf');
?>