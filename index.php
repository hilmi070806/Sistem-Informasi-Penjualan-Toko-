<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Menu Utama</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #dbeafe, #f0f9ff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #ffffff;
            width: 90%;
            max-width: 900px;
            padding: 45px 50px;
            border-radius: 18px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.12);
            text-align: center;
        }

        h2 {
            font-size: 28px;
            color: #1f2937;
            margin-bottom: 12px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 16px;
            color: #4b5563;
            margin-bottom: 35px;
            line-height: 1.6;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 22px;
        }

        .card {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: #ffffff;
            padding: 28px 20px;
            border-radius: 16px;
            font-size: 17px;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.35);
        }

        .card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 18px 35px rgba(30, 64, 175, 0.45);
        }

        .card a {
            color: #ffffff;
            text-decoration: none;
            display: block;
            width: 100%;
            height: 100%;
        }

        .card a:hover {
            text-decoration: none;
        }

        @media (max-width: 600px) {
            .container {
                padding: 30px 25px;
            }

            h2 {
                font-size: 22px;
            }

            .card {
                padding: 22px 15px;
                font-size: 15px;
            }
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Sistem Informasi Penjualan Toko</h2>

    <p class="subtitle">
        Aplikasi pengelolaan data pelanggan, produk, dan transaksi penjualan
    </p>

    <div class="menu">

        <div class="card">
            <a href="pelanggan.php">Data Pelanggan</a>
        </div>

        <div class="card">
            <a href="produk.php">Data Produk</a>
        </div>

        <div class="card">
            <a href="transaksi.php">Transaksi</a>
        </div>

        <div class="card">
            <a href="detail_transaksi.php">Detail Transaksi</a>
        </div>

    </div>
</div>

</body>
</html>
