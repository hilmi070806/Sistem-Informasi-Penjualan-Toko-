<?php include 'koneksi.php'; ?>
<link rel="stylesheet" href="style.css">
<h2>Transaksi</h2>



<form method="post">
    Pelanggan:
    <select name="pelanggan">
        <?php
        $p = mysqli_query($conn, "SELECT * FROM pelanggan");
        while ($d = mysqli_fetch_assoc($p)) {
            echo "<option value='$d[id_pelanggan]'>$d[nama_pelanggan]</option>";
        }
        ?>
    </select>

    <button name="simpan">Buat Transaksi</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn,
        "INSERT INTO transaksi VALUES(
        '', '$_POST[pelanggan]', CURDATE())"
    );
}
?>

<table border="1">
<tr>
    <th>ID</th><th>Pelanggan</th><th>Tanggal</th>
</tr>

<?php
$q = mysqli_query($conn,
"SELECT transaksi.*, pelanggan.nama_pelanggan
 FROM transaksi
 JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan");

while ($d = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $d['id_transaksi']; ?></td>
    <td><?= $d['nama_pelanggan']; ?></td>
    <td><?= $d['tanggal']; ?></td>
</tr>
<?php } ?>
</table>
<a href="index.php">Kembali ke Menu</a>