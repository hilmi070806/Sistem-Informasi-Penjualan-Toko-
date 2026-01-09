<?php include 'koneksi.php'; ?>

<link rel="stylesheet" href="style.css">


<h2>Data Pelanggan</h2>

<form method="post">
    Nama: <input type="text" name="nama" required>
    Alamat: <input type="text" name="alamat" required>
    No HP: <input type="text" name="hp" required>
    <button name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn,
        "INSERT INTO pelanggan VALUES(
        '', '$_POST[nama]', '$_POST[alamat]', '$_POST[hp]')"
    );
}
?>

<table border="1">
<tr>
    <th>Nama</th><th>Alamat</th><th>No HP</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM pelanggan");
while ($d = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $d['nama_pelanggan']; ?></td>
    <td><?= $d['alamat']; ?></td>
    <td><?= $d['no_hp']; ?></td>
</tr>
<?php } ?>
</table>
<a href="index.php">Kembali ke Menu</a>
