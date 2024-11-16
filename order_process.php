<?php
session_start();

// Database connection
$link = new mysqli("localhost", "root", "", "Foydalanuvchi");
if ($link->connect_errno) {
    die("Database connection failed: " . $link->connect_error);
}

// Retrieve session data
$user_id = $_SESSION['id'];
$user_name = $_SESSION['ism'];
$user_surname = $_SESSION['fam'];
$user_address = $_SESSION['manzil'];

// Retrieve form data
$product_name = $_POST['product_name'];
$product_quantity = $_POST['quantity'];
$payment_method = $_POST['payment_method'];
$card_number = isset($_POST['card_number']) ? $_POST['card_number'] : null;

// Prepare the SQL query to insert the order
$stmt = $link->prepare("INSERT INTO orders (user_id, product_name, product_quantity, payment_method, card_number, user_name, user_surname, user_address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isisssss", $user_id, $product_name, $product_quantity, $payment_method, $card_number, $user_name, $user_surname, $user_address);

// Shopping cart sonini yangilash
$link->query("UPDATE users SET cart_count = cart_count + 1 WHERE id = $user_id");

if ($stmt->execute()) {
    echo "<script>alert('Buyurtma muvaffaqqiyatli amalga oshirildi'); window.location.href = 'index.php';</script>";
} else {
    echo "<script>alert('Xatolik yuz berdi. Buyurtma amalga oshmadi.'); window.location.href = 'buyurtma.php';</script>";
}

$stmt->close();
$link->close();
?>
