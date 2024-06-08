<html>
    <title>Cetak | Kwintasi</title>
    <link rel="shortcut icon" href="assets/images/logo.png" />
    <body>
    <div id="printable" class="container">
<table border="0" cellpadding="0" cellspacing="0" width="485" class="border" style="overflow-x:auto;">

  <thead>
  <tr>
    <td colspan="6" width="485" id="caption">SMK MADYA DEPOK</td>
  </tr>
  
  <?php
include 'koneksi.php';

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$id = $_GET['id']; 

$sql = "SELECT * FROM data_bayar WHERE id = $id";

// 3. Eksekusi Query
$result = mysqli_query($koneksi, $sql);

// 4. Ambil Data
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // 5. Tampilkan Data dalam Kode HTML
?>
<tr>
    <td colspan="2">Nama Siswa</td>
    <td class="left kop"><?php echo $row["nama_siswa"]; ?></td>
    <td></td>
    <td>Tanggal</td>
    <td class="left kop"><?php echo $row['tanggal']; ?></td>
</tr>
<tr>
    <td colspan="2">No Pendaftaran</td>
    <td class="left kop"><?php echo $row['no_pendaftaran']; ?></td>
    <td></td>
    <td>Perihal</td>
    <td class="left kop">Pelunasan Pendaftaran</td>
</tr>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>
</thead>

<tbody>
    <tr>
        <th>No</th>
        <th>Nama Siswa</th>
        <th>Jumlah Bayar</th>
        <th>Total</th>
        <th colspan="2">KETERANGAN</th>
    </tr>
    <tr>
        <td align="right">1</td>
        <td><?php echo $row["nama_siswa"]; ?></td>
        <td align="right">Rp.<?php echo $row['bayar']; ?></td>
        <td>Rp.<?php echo $row['jumlah']; ?></td>
        <td colspan="2"><?php echo $row['keterangan']; ?></td>
    </tr>
    <tr>

        <th colspan="3"> Sisa pembayaran</th>
        <td colspan="3">Rp.<?php echo $row['sisa']; ?></td>
        <td colspan="2"></td>
    </tr>
<?php
} else {
    echo " hasil";
}

// Tutup koneksi
mysqli_close($koneksi);
?>

  </tfoot>
</table>
</div>
<style>
    table {
	max-width: 100%;
	max-height: 100%;
}
body {
	padding: 5px;
	position: relative;
	width: 100%;
	height: 100%;
}
table th,
table td {
	padding: .625em;
  text-align: center;
}
table .kop:before {
	content: ': ';
}
.left {
	text-align: left;
}
table #caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table.border {
  width: 100%;
  border-collapse: collapse
}

table.border tbody th, table.border tbody td {
  border: thin solid #000;
  padding: 2px
}
.ttd td, .ttd th {
	padding-bottom: 4em;
}
</style>
<script>
    
    window.onload = function() {
      window.print(); 
    };
  </script>

    </body>
</html>