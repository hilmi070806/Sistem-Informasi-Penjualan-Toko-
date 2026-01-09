<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Detail Transaksi</h2>

    <!-- FORM -->
    <form method="post">
        <label>Transaksi</label>
        <select name="transaksi">
            <?php
            $t = mysqli_query($conn, "SELECT * FROM transaksi");
            while ($d = mysqli_fetch_assoc($t)) {
                echo "<option value='$d[id_transaksi]'>Transaksi $d[id_transaksi]</option>";
            }
            ?>
        </select>

        <label>Produk</label>
        <select name="produk">
            <?php
            $p = mysqli_query($conn, "SELECT * FROM produk");
            while ($d = mysqli_fetch_assoc($p)) {
                echo "<option value='$d[id_produk]'>$d[nama_produk]</option>";
            }
            ?>
        </select>

        <label>Jumlah</label>
        <input type="number" name="jumlah" required>

        <button name="simpan">Tambah</button>
    </form>

    <?php
    if (isset($_POST['simpan'])) {
        $produk = mysqli_fetch_assoc(mysqli_query(
            $conn, "SELECT harga FROM produk WHERE id_produk='$_POST[produk]'"
        ));

        $subtotal = $produk['harga'] * $_POST['jumlah'];

        mysqli_query($conn,
            "INSERT INTO detail_transaksi VALUES(
            '', '$_POST[transaksi]', '$_POST[produk]', '$_POST[jumlah]', '$subtotal')"
        );
    }
    ?>

    <!-- TABEL -->
    <table>
        <tr>
            <th>Transaksi</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Subtotal</th>
        </tr>

        <?php
        $q = mysqli_query($conn,
        "SELECT detail_transaksi.*, produk.nama_produk
         FROM detail_transaksi
         JOIN produk ON detail_transaksi.id_produk = produk.id_produk");

        while ($d = mysqli_fetch_assoc($q)) {
        ?>
        <tr>
            <td><?= $d['id_transaksi']; ?></td>
            <td><?= $d['nama_produk']; ?></td>
            <td><?= $d['jumlah']; ?></td>
            <td>Rp <?= number_format($d['subtotal']); ?></td>
        </tr>
        <?php } ?>
    </table>

    <br>
    <a href="index.php">Kembali ke Menu</a>
</div>

</body>
</html>
