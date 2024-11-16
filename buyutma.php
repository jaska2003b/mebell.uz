<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Foydalanuvchi session ma'lumotlarini tekshirish
if (!isset($_SESSION['id']) || !isset($_SESSION['ism']) || !isset($_SESSION['fam']) || !isset($_SESSION['manzil'])) {
    echo "<p>Foydalanuvchi tizimga kirgan emas.</p>";
    exit; // Session mavjud bo'lmasa, sahifa to'xtaydi
}

// Ma'lumotlar bazasiga ulanish
$link = new mysqli("localhost", "root", "", "Foydalanuvchi");

if ($link->connect_errno) {
    echo "Ma'lumotlar bazasiga ulanishda xatolik: " . $link->connect_error;
    exit;
}

// Mahsulot ID sini olish
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Mahsulot ID to'g'ri uzatilganini tekshirish
if ($product_id === 0) {
    echo "<p>Noto'g'ri mahsulot ID uzatildi.</p>";
    exit;
}

// Mahsulot tafsilotlarini olish
$product_query = $link->query("SELECT nomi, narxi, rasmi, miqdori FROM Mahsulot WHERE id = $product_id");
$product = $product_query->fetch_assoc();

// Mahsulot mavjudligini tekshirish
if (!$product) {
    echo "<p>Mahsulot topilmadi.</p>";
    exit;
}

// Foydalanuvchi session ma'lumotlarini olish
$user_id = $_SESSION['id'];
$user_name = $_SESSION['ism'];
$user_surname = $_SESSION['fam'];
$user_address = $_SESSION['manzil'];
?>

<style>
    /* Styling for the form */
    #buyurtmaFormasi {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(0, 0, 0, 0.5);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }
    .form-content {
        background-color: #fff;
        padding: 30px;
        border-radius: 8px;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    .btn-primary {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px;
        width: 100%;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }
    .btn-primary:hover {
        background-color: #218838;
    }
    .product-details {
        text-align: center;
        margin-bottom: 20px;
    }
    .product-details img {
        max-width: 100px;
        margin-bottom: 10px;
    }
    .product-details p {
        margin: 5px 0;
        font-size: 14px;
        color: #666;
    }
</style>

<div id="buyurtmaFormasi" class="form-qatlam">
    <div class="form-content">
        <h2>Mahsulot Buyurtmasi</h2>
        
        <!-- Mahsulot tafsilotlari -->
        <div class="product-details">
            <img src="image_products/<?php echo $product['rasmi']; ?>" alt="Mahsulot rasmi">
            <p><strong>Mahsulot:</strong> <?php echo htmlspecialchars($product['nomi']); ?></p>
            <p><strong>Narxi:</strong> <?php echo number_format($product['narxi'], 0, ',', ' '); ?> so'm</p>
            <p><strong>Miqdori:</strong> <?php echo $product['miqdori']; ?></p>
        </div>
        
        <form action="order_process.php" method="POST">
            <!-- Foydalanuvchi va mahsulot ma'lumotlarini yashirin shaklda yuborish -->
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <input type="hidden" name="ism" value="<?php echo htmlspecialchars($user_name); ?>">
            <input type="hidden" name="fam" value="<?php echo htmlspecialchars($user_surname); ?>">
            <input type="hidden" name="manzil" value="<?php echo htmlspecialchars($user_address); ?>">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['nomi']); ?>">
            <input type="hidden" name="product_price" value="<?php echo $product['narxi']; ?>">

            <!-- Miqdor tanlash -->
            <div class="form-group">
                <label for="quantity">Miqdori:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
            </div>

            <!-- To'lov usuli -->
            <div class="form-group">
                <label for="payment_method">To'lov usuli:</label>
                <select name="payment_method" id="payment_method" class="form-control" required onchange="toggleCardInput()">
                    <option value="">Tanlang</option>
                    <option value="card">Karta orqali</option>
                    <option value="cash">Olinganda to'lanadi</option>
                </select>
            </div>

            <!-- Karta raqami (faqat "card" tanlanganda ko'rsatiladi) -->
            <div id="cardNumberContainer" class="form-group" style="display: none;">
                <label for="card_number">Karta raqami:</label>
                <input type="text" name="card_number" id="card_number" class="form-control" pattern="[0-9]{16}" placeholder="16 xonali karta raqami">
            </div>

            <!-- Buyurtmani tasdiqlash tugmasi -->
            <div class="form-group">
                <button type="submit" class="btn-primary">Buyurtma berish</button>
            </div>
        </form>
    </div>
</div>

<script>
    function toggleCardInput() {
        var paymentMethod = document.getElementById("payment_method").value;
        var cardContainer = document.getElementById("cardNumberContainer");
        cardContainer.style.display = (paymentMethod === "card") ? "block" : "none";
    }
</script>

<?php
$link->close();
?>
