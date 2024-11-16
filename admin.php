<?php
session_start();
if (isset($_SESSION['xabar'])) {
    echo "<script>alert('" . $_SESSION['xabar'] . "');</script>";
    unset($_SESSION['xabar']);
}
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- <link rel="stylesheet" href="css/style1.css"> -->
    <style>
        /* Overall body styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            min-height: 100vh;
            background-color: #f4f4f9;
        }

        /* Admin panel container */
        .admin-panel {
            display: flex;
            width: 100%;
        }

        /* Sidebar styles */
        .sidebar {
            width: 250px;
            background-color: #ffffff;
            color: #2c3e50;
            padding-top: 20px;
            position: fixed;
            height: 100%;
            top: 0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Style for each menu button */
        .sidebar button {
            display: block;
            width: 100%;
            padding: 15px;
            text-align: center;
            background: none;
            color: #2c3e50;
            font-size: 18px;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
            margin: 5px 0;
            border-radius: 8px;
        }

        /* Hover effect for buttons */
        .sidebar button:hover {
            background-color: #34495e;
            color: #ecf0f1;
            transform: translateX(5px);
        }

        /* Content area styles */
        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px); /* Adjust content area to fit the sidebar */
        }

        /* Content section styles */
        .content-section {
            display: none;
        }

        /* Table styles */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            max-width: 100%;
            table-layout: fixed; /* To ensure tables are stretched properly */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
            word-wrap: break-word; /* Ensures text wraps if it's too long */
        }

        th {
            background-color: #f2f2f2;
        }

        /* Form styles */
        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input, textarea, button {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #2c3e50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #34495e;
        }

        /* Hover effect for table rows */
        tr:hover {
            background-color: #f9f9f9;
        }

        /* Styles for the "Accept" button in the table */
        .accept-button {
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 5px 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .accept-button:hover {
            background-color: #27ae60;
        }

    </style>
</head>
<body>

<div class="admin-panel">
    <!-- Sidebar -->
    <div class="sidebar">
        <button onclick="showSection('foydalanuvchilar')">Ro'yxatdan o'tgan foydalanuvchilar</button>
        <button onclick="showSection('buyurtmalar')">Buyurtmalar</button>
        <button onclick="showSection('yangiMebel')">Yangi Mebel Qo'shish</button>
    </div>

    <!-- Main content area -->
    <div class="content">

        <!-- Foydalanuvchilar ro'yxati -->
        <section id="foydalanuvchilar" class="content-section">
            <h2>Ro'yxatdan o'tgan foydalanuvchilar</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ism</th>
                        <th>Familiya</th>
                        <th>Email</th>
                        <th>Manzil</th>
                        <th>Telefon</th>
                        <th>Ro'yxatdan o'tish sanasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ma'lumotlar bazasiga ulanish
                    $link = new mysqli("localhost", "root", "", "Foydalanuvchi");
                    if ($link->connect_errno) {
                        echo "<tr><td colspan='7'>Ma'lumotlar bazasiga ulanishda xatolik: " . $link->connect_error . "</td></tr>";
                        exit;
                    }

                    $query = "SELECT id, ism, fam, pochta, manzil, tel, sanasi FROM axborot";
                    $result = $link->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['id'] . "</td>
                                    <td>" . $row['ism'] . "</td>
                                    <td>" . $row['fam'] . "</td>
                                    <td>" . $row['pochta'] . "</td>
                                    <td>" . $row['manzil'] . "</td>
                                    <td>" . $row['tel'] . "</td>
                                    <td>" . $row['sanasi'] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7'>Foydalanuvchilar yo'q</td></tr>";
                    }
                    $link->close();
                    ?>
                </tbody>
            </table>
        </section>

      <!-- Buyurtmalar ro'yxati -->
       
      <section id="buyurtmalar" class="content-section">
            <h2>Buyurtmalar</h2>
            <table>
                <thead>
                    <tr>
                        <th>Buyurtma_ID</th>
                        <th>User_ID</th>
                        <th>Mahsulot_nomi</th>
                        <th>Miqdori</th>
                        <th>Tulov_usuli</th>
                        <th>Karta raqami</th>
                        <th>User_Ismi</th>
                        <th>User_Familiyasi</th>
                        <th>User_Manzili </th>
                        <th>Buyurtma sanasi</th>
                        <th> Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Ma'lumotlar bazasiga ulanish
                    $link = new mysqli("localhost", "root", "", "Foydalanuvchi");
                    if ($link->connect_errno) {
                        echo "<tr><td colspan='9'>Ma'lumotlar bazasiga ulanishda xatolik: " . $link->connect_error . "</td></tr>";
                        exit;
                    }

                    $query = "SELECT order_id, user_id, product_name,
                    product_quantity,payment_method, card_number, user_name, user_surname, user_address, order_date FROM orders";
                    $result = $link->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['order_id'] . "</td>
                                    <td>" . $row['user_id'] . "</td>
                                    <td>" . $row['product_name'] . "</td>
                                    <td>" . $row['product_quantity'] . "</td>
                                    <td>" . $row['payment_method'] . "</td>
                                    <td>" . $row['card_number'] . "</td>
                                    <td>" . $row['user_name'] . "</td>
                                    <td>" . $row['user_surname'] . "</td>
                                    <td>" . $row['user_address'] . "</td>
                                    <td>" . $row['order_date'] . "</td>
                                    <td>
                                    <form action='accept_order.php' method='POST'>
                                        <input type='hidden' name='order_id' value='" . $row['order_id'] . "'>
                                        <button type='submit' class='accept-button'>Qabul qilish</button>
                                    </form>
                                     </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>Buyurtmalar mavjud emas</td></tr>";
                    }
                    $link->close();
                    ?>
                </tbody>
            </table>
        </section>

        <!-- Yangi Mebel Qo'shish Formasi -->
    <section id="yangiMebel" class="content-section">
    <h2>Yangi Mahsulot Qo'shish</h2>
    <form action="add_product.php" method="POST" id="newFurnitureForm" enctype="multipart/form-data">
        <label for="name">Mebel Nomi:</label>
        <input type="text" id="name" name="name" required>

        <label for="price">Narxi (so'm):</label>
        <input type="number" id="price" name="price" required>

        <label for="q">Miqdori:</label> <!-- 'quantity' nomi bilan moslashtirildi -->
        <input type="number" id="q" name="quantity" required>

        <label for="image">Rasm:</label>
        <input type="file" id="image" name="image" required>
        
        <button type="submit"> Qo'shish </button>
    </form>
</section>


    </div>
</div>

<script>
    function showSection(sectionId) {
        document.querySelectorAll('.content-section').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById(sectionId).style.display = 'block';
    }

    // document.getElementById("newFurnitureForm").addEventListener("submit", function(event) {
    //     event.preventDefault();
        
    //     let name = document.getElementById("name").value;
    //     let description = document.getElementById("description").value;
    //     let price = document.getElementById("price").value;
    //     let image = document.getElementById("image").files[0];
        
    //     alert("Yangi mebel qo'shildi: " + name);
    // });
</script>

</body>
</html>
