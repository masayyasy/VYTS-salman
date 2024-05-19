<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Detail Pesanan</title>
</head>
<body>
    <h2>Tambah Detail Pesanan</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Mengambil data dari formulir
        $SiparisId = $_POST['SiparisId'];
        $MenuId = $_POST['MenuId'];
        $Toplam = $_POST['Toplam'];
        $Fiyat = $_POST['Fiyat'];

        // Menyimpan data ke dalam database
        $sql = "INSERT INTO detail_pesanan (SiparisId , MenuId , Toplam, Fiyat)
                VALUES ('$SiparisId', '$MenuId', '$Toplam', '$Fiyat')";

        if ($conn->query($sql) === TRUE) {
            echo "Detail pesanan berhasil ditambahkan!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
        ID Pesanan: <input type="text" name="id_pesanan" required><br>
        ID Menu: <input type="text" name="id_menu" required><br>
        Jumlah: <input type="number" name="jumlah" required><br>
        Harga: <input type="number" step="0.01" name="harga" required><br>
        <input type="submit" value="Tambah">
    </form>
</body>
</html>
