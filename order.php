<?php
include 'koneksi.php';

// Mendapatkan daftar menu dari database
$sql = "SELECT MenuId, MenuAdi, Fiyat FROM menu";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Siparis Formu</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .form-container {
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
            background-color: #f9f9f9;
        }
        .form-container h1 {
            text-align: center;
        }
        .form-container label {
            display: block;
            margin-top: 10px;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Yemek Siparis Formu</h1>
        <form id="orderForm" method="POST" action="">
            <label for="menu">Menu:</label>
            <select id="menu" name="menuId" required>
                <option value="">Menu Seçin</option>
                <?php
                if ($result->num_rows > 0) {
                    // Menampilkan pilihan menu dalam dropdown
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['MenuId'] . "' data-price='" . $row['Fiyat'] . "'>" . $row['MenuAdi'] . "</option>";
                    }
                }
                ?>
            </select>

            <label for="quantity">Siparis Toplam (adet):</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <label for="totalPrice">Toplam Fiyat:</label>
            <input type="text" id="totalPrice" name="totalPrice" readonly>

            <button type="submit" name="submit">Siparis</button>
        </form>
    </div>

    <script>
        // JavaScript untuk menghitung total harga
        document.getElementById('orderForm').addEventListener('input', function() {
            var menu = document.getElementById('menu');
            var price = menu.options[menu.selectedIndex].getAttribute('data-price');
            var quantity = document.getElementById('quantity').value;
            var totalPrice = price * quantity;

            document.getElementById('totalPrice').value = totalPrice;
        });
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $menuId = $_POST['menuId'];
        $quantity = $_POST['quantity'];
        $totalPrice = $_POST['totalPrice'];

        // Proses penyimpanan pesanan ke database (opsional)
        $sql = "INSERT INTO siparisdetail (MenuId, toplam, fiyat) VALUES ('$menuId', '$quantity', '$totalPrice')";
        if ($conn->query($sql) === TRUE) {
            echo "başarılı.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
