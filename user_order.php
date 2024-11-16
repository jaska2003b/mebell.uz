<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ma'lumotlar bazasiga ulanish
$link = new mysqli("localhost", "root", "", "Foydalanuvchi");

if ($link->connect_errno) {
    echo "Ma'lumotlar bazasiga ulanishda xatolik: " . $link->connect_error;
    exit;
}

// Foydalanuvchi session ma'lumotlarini tekshirish
if (!isset($_SESSION['id'])) {
    echo "<p>Foydalanuvchi tizimga kirgan emas.</p>";
    exit;
}

// Foydalanuvchi ID sini olish
$user_id = $_SESSION['id'];

// Buyurtmalarni bekor qilish
if (isset($_POST['cancel_order'])) {
    $order_id = intval($_POST['cancel_order']);
    
    // orders jadvalidan buyurtmani o'chirish (agar order_id ustuni mavjud bo'lsa)
    $delete_query = "DELETE FROM orders WHERE order_id = $order_id";
    
    if ($link->query($delete_query) === TRUE) {
        // Sahifani qayta yuklashdan oldin hech qanday chiqish yo'q
        header("Location: user_order.php");
        exit;
    } else {
        echo "<p>Buyurtma bekor qilinishida xatolik yuz berdi: " . $link->error . "</p>";
    }
}

// Buyurtmalarni olish
$query = "SELECT * FROM orders WHERE user_id = $user_id";
$result = $link->query($query);

// Shopping cart sonini yangilash
$cart_count_query = $link->query("SELECT COUNT(*) AS cart_count FROM orders WHERE user_id = $user_id");
$cart_count = $cart_count_query->fetch_assoc();
$cart_count = $cart_count['cart_count'];

?>

<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buyurtmalar</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .cart { color: #000; }
    </style>
</head>
<body style="background-color: #d0f3f7">

<h2 align="center">Foydalanuvchi Buyurtmalari</h2>

<p align="center"><strong>Shopping Cart:</strong> <a href="cart.php" class="cart">Savatda <?php echo $cart_count; ?> ta mahsulot</a></p>

<table>
    <thead>
        <tr>
            <th>Mahsulot nomi</th>
            <th>Miqdori</th>
            <th>To'lov usuli</th>
            <th>Karta raqami</th>
            <th>Foydalanuvchi ismi</th>
            <th>Foydalanuvchi familiyasi</th>
            <th>Manzil</th>
            <th>Sana</th>
            <th>Amal</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($order = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['product_name']); ?></td>
                    <td><?php echo $order['product_quantity']; ?></td>
                    <td><?php echo htmlspecialchars($order['payment_method']); ?></td>
                    <td><?php echo htmlspecialchars($order['card_number']); ?></td>
                    <td><?php echo htmlspecialchars($order['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($order['user_surname']); ?></td>
                    <td><?php echo htmlspecialchars($order['user_address']); ?></td>
                    <td><?php echo $order['order_date']; ?></td>
                    <td>
                        <!-- Buyurtmani bekor qilish tugmasi -->
                        <form method="POST" action="user_order.php" style="display:inline;">
                            <input type="hidden" name="cancel_order" value="<?php echo $order['order_id']; ?>">
                            <button type="submit" onclick="return confirm('Buyurtmani bekor qilishni xohlaysizmi?')">Bekor qilish</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">Sizda buyurtmalar mavjud emas.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<br>
<button onclick="window.location.href='index.php'" style="
    background-color: #4CAF50;
    color: white;
    padding: 10px 780px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    text-transform: uppercase;
    transition: background-color 0.3s ease;
">
    Bosh sahifa
</button>

</body>
</html>

<?php
$link->close();
?>
