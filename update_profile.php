<?php
session_start();

// Foydalanuvchi ID sini olish
if (!isset($_SESSION['id'])) {
    die("Foydalanuvchi tizimga kirgan emas.");
}

// Ma'lumotlarni yangilash
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Formadan olingan ma'lumotlar
    $ism = $_POST['ism'];
    $fam = $_POST['fam'];
    $pochta = $_POST['pochta'];
    $manzil = $_POST['manzil'];
    $tel = $_POST['tel'];
    $parol = $_POST['parol'];
     // Parol tekshirish
    $parol = isset($_POST['parol']) && !empty($_POST['parol']) ? $_POST['parol'] : $_SESSION['parol'];
     
    $user_id = $_SESSION['id'];

    // Ma'lumotlar bazasiga ulanish
    $link = new mysqli("localhost", "root", "", "Foydalanuvchi");
    if ($link->connect_errno) {
        die("Xatolik: " . $link->connect_error);
    }

    // Fayl yuklanganmi, tekshiramiz
    if ($_FILES['fayl']['error'] == 0) {
        // Avvalgi fayl nomini olish
        $result = $link->query("SELECT fayl FROM axborot WHERE id = $user_id");
        $old_file = $result->fetch_assoc()['fayl'];

        // Eski faylni o'chirish
        if ($old_file && file_exists("upload/" . $old_file)) {
            unlink("upload/" . $old_file);
        }

        // Oxirgi ID ni olish va yangi fayl nomini yaratish
        $oxirgi = $link->query("SELECT id FROM axborot ORDER BY id DESC LIMIT 1");
        $satr = $oxirgi->fetch_row();
        $file_name = $_FILES['fayl']['name'];
        $file_info = pathinfo($file_name);
        $file_extension = $file_info['extension'];
        $new_name = (1 + $satr[0]) . "_f_new." . $file_extension;
        
        // Yangi faylni yuklash va saqlash
        $tmp_name = $_FILES['fayl']['tmp_name'];
        move_uploaded_file($tmp_name, "upload/" . $new_name);
    } else {
        // Fayl yuklanmagan bo'lsa, avvalgi fayl nomini saqlaymiz
        $new_name = $_SESSION['fayl'];
    }

    // Ma'lumotlarni yangilash so'rovi
    $query = "UPDATE axborot SET ism = ?, fam = ?, pochta = ?, parol = ?, manzil = ?, tel = ?, fayl = ? WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param("sssssssi", $ism, $fam, $pochta, $parol, $manzil, $tel, $new_name, $user_id);

    if ($stmt->execute()) {
        // Sessiyada yangi ma'lumotlarni yangilash
        $_SESSION['ism'] = $ism;
        $_SESSION['fam'] = $fam;
        $_SESSION['pochta'] = $pochta;
        $_SESSION['parol'] = $parol;
        $_SESSION['manzil'] = $manzil;
        $_SESSION['tel'] = $tel;
        $_SESSION['fayl'] = $new_name;

        // Ma'lumotlar yangilandi
        echo "<script>alert('Profil muvaffaqqiyatli yangilandi'); window.location.href = 'index.php';</script>";
    } else {
        echo "Xatolik yuz berdi: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>
