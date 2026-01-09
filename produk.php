<?php include 'koneksi.php'; ?>
<link rel="stylesheet" href="style.css">
<h2>Data Produk</h2>


<form method="post">
    Nama Produk: <input type="text" name="nama" required>
    Harga: <input type="number" name="harga" required>
    Stok: <input type="number" name="stok" required>
    <button name="simpan">Simpan</button>
</form>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($conn,
        "INSERT INTO produk VALUES(
        '', '$_POST[nama]', '$_POST[harga]', '$_POST[stok]')"
    );
}
?>

<table border="1">
<tr>
    <th>Produk</th><th>Harga</th><th>Stok</th>
</tr>

<?php
$q = mysqli_query($conn, "SELECT * FROM produk");
while ($d = mysqli_fetch_assoc($q)) {
?>
<tr>
    <td><?= $d['nama_produk']; ?></td>
    <td><?= $d['harga']; ?></td>
    <td><?= $d['stok']; ?></td>
</tr>
<?php } ?>
</table>
<a href="index.php">Kembali ke Menu</a>
