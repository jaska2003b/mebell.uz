<?php
session_start();

$ism = $_POST['ism'];
$fam = $_POST['fam'];
$pochta = $_POST['pochta'];
$parol = $_POST['parol'];
$manzil = $_POST['manzil'];
$tel = $_POST['tel'];

$link = new mysqli("localhost", "root", "", "Foydalanuvchi");

if ($link->connect_errno) { 
    echo "MB ga bog'lanib bo'lmadi. Sabab:".$link->connect_errno;  
    exit;  
}

// Oxirgi IDni olish (Oxirgi IDni olishning o'rniga maxsus ID yaratish kerak bo'lsa, shu yerni o'zgartirishingiz mumkin)
$oxirgi = $link->query("SELECT id FROM axborot ORDER BY id DESC LIMIT 1"); 
$satr  = $oxirgi->fetch_row();

// Faylni yuklash
if ($_FILES['fayl']['error']) {
    echo "Fayl yuklanmadi. Xatolik kodi:". $_FILES['fayl']['error']; 
} else {
    $name = $_FILES['fayl']['name'];
    $tmp = $_FILES['fayl']['tmp_name'];
    $file_info = pathinfo($name);
    $file_extension = $file_info['extension'];

    $new_name = (1 + $satr[0]) . "_f_new." . $file_extension;
    $yul = "upload/" . $new_name;
    move_uploaded_file($tmp, $yul);
}

if (isset($ism) && isset($fam) && isset($pochta) && isset($parol) && isset($manzil) && isset($tel)) {
    // Ma'lumotlarni bazaga kiritish
    $surov = $link->query("INSERT INTO axborot (ism, fam, pochta, parol, manzil, tel, fayl, sanasi) 
    VALUES('$ism', '$fam', '$pochta', '$parol', '$manzil', '$tel', '$new_name', NOW())");

    if ($surov) {
        // Foydalanuvchi ID sini olish va sessiyada saqlash
        $user_id = $link->insert_id;  // Avvalgi kiritilgan yozuvning ID sini olish

        // Sessiya ma'lumotlarini yangilash
        $_SESSION['id'] = $user_id;  // Foydalanuvchi ID sini sessiyada saqlash
        $_SESSION['ism'] = $ism;
        $_SESSION['fam'] = $fam;
        $_SESSION['pochta'] = $pochta;
        $_SESSION['parol'] = $parol;
        $_SESSION['manzil'] = $manzil;
        $_SESSION['tel'] = $tel;
        $_SESSION['fayl'] = $new_name;

        // Boshqa ma'lumotlar ham yangilanadi

        // Qayta yo'naltirish
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Xatolik yuz berdi. Xatolik kodi: ".$link->errno.". Sababi: ".$link->error."');</script>";
    }
} else {   
    echo "<script>alert('Ma\'lumotlar to\'liq emas');</script>";
}
?>
