<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$nomi = $_POST['name'];
$narxi = $_POST['price'];
$miqdori = $_POST['quantity']; 

$link = new mysqli("localhost", "root", "", "Foydalanuvchi");

if ($link->connect_errno) { 
    $_SESSION['xabar'] = "MB ga bog'lanib bo'lmadi. Sabab: " . $link->connect_error;  
    header("Location: admin.php");
    exit;  
}

// Oxirgi IDni olish
$oxirgi = $link->query("SELECT id FROM Mahsulot ORDER BY id DESC LIMIT 1"); 
$satr  = $oxirgi->fetch_row();
$yangi_id = isset($satr[0]) ? $satr[0] + 1 : 1; // Agar ID yo'q bo'lsa, 1-dan boshlanadi

// Faylni yuklash
if ($_FILES['image']['error'] == 0) {
    $name = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $file_info = pathinfo($name);
    $file_extension = $file_info['extension'];

    $new_name = $yangi_id . "_prod." . $file_extension; // Fayl nomi yangi id bilan
    $yul = "image_products/" . $new_name;
    move_uploaded_file($tmp, $yul);
} else {
    $_SESSION['xabar'] = "Fayl yuklanmadi. Xatolik kodi: " . $_FILES['image']['error'];
    header("Location: admin.php");
    exit;
}

if (isset($nomi) && isset($narxi) && isset($miqdori)) {
    // Ma'lumotlarni bazaga kiritish
    $surov = $link->query("INSERT INTO Mahsulot (nomi, narxi, rasmi, miqdori) 
    VALUES('$nomi', '$narxi', '$new_name', '$miqdori')");

    if ($surov) {
        $_SESSION['xabar'] = "Mahsulot qo'shildi.";
    } else {
        $_SESSION['xabar'] = "Xatolik yuz berdi. Xatolik kodi: " . $link->errno . ". Sababi: " . $link->error;
    }
} else {   
    $_SESSION['xabar'] = "Ma'lumotlar to'liq emas";
}

header("Location: admin.php");
$link->close();
exit;
?>
