<?php 
    if (isset($_POST['submit_order'])) {
        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            $id_khachhang = $_SESSION['id_khachhang'];
            $code_order = rand(0, 9999);
            // Thêm đơn hàng vào bảng `tbl_cart`
            $insert_cart = "INSERT INTO tbl_cart(id_khachhang, code_cart, cart_status) VALUES ('".$id_khachhang."','".$code_order."', 1)";
            $cart_query = mysqli_query($mysqli, $insert_cart);
            if ($cart_query) {  
                foreach ($_SESSION['cart'] as $key => $value) {
                    $id_sanpham = $value['id'];
                    $soluong = $value['soluong'];
                    $insert_order_details = "INSERT INTO tbl_cart_details(id_sanpham, code_cart, soluongmua) VALUES ('".$id_sanpham."', '".$code_order."', '".$soluong."')";
                mysqli_query($mysqli, $insert_order_details);
                }
                // Xóa giỏ hàng sau khi đặt hàng thành công
                unset($_SESSION['cart']);
                echo "<script>alert('Đặt hàng thành công! Cảm ơn bạn đã mua sắm.');</script>";
            } else {
                echo "<script>alert('Đã xảy ra lỗi khi đặt hàng. Vui lòng thử lại sau.');</script>";
            }
        } else {
            echo "<script>alert('Giỏ hàng hiện đang trống.');</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
    <title>Thanh Toán</title>
    <link rel="stylesheet" href="style/paymentstyle.css">
</head>
<body>
<main>
    <div class="container">
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class ="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class ="fas fa-money-check-alt"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <form method="POST" action="">
            <div class="checkout">
                <div class="left">
                    <div class="section">
                        <h3>Thông tin người nhận</h3>
                        <div class="address-inputs">
                            <input type="text" name="receiver_name" placeholder="Họ và tên người nhận" required />
                            <input type="text" name="receiver_phone" placeholder="Số điện thoại" required />
                        </div>
                    </div>

                    <div class="section">
                        <h3>Địa chỉ giao hàng</h3>
                        <div class="address-inputs">
                            <input type="text" name="address" placeholder="Địa chỉ (số nhà, tên đường)" required />
                            <input type="text" name="ward" placeholder="Phường/Xã" required />
                        </div>
                        <div class="address-inputs">
                            <input type="text" name="district" placeholder="Quận/Huyện" required />
                            <input type="text" name="city" placeholder="Tỉnh/Thành phố" required />
                        </div>
                    </div>

                    <div class="section">
                        <h3>Phương thức giao hàng</h3>
                        <label>
                            <input type="radio" name="shipping" value="standard" checked />
                            Giao hàng tiêu chuẩn (3-6 ngày)
                        </label>
                    </div>

                    <div class="section">
                        <h3>Phương thức thanh toán</h3>
                        <div class="payment-methods">
                            <label>
                                <input type="radio" name="payment_method" value="COD" checked />
                                Thanh toán khi nhận hàng
                            </label>
                            <label>
                                <input type="radio" name="payment_method" value="bank_transfer" />
                                Thanh toán chuyển khoản
                            </label>
                        </div>
                    </div>

                    <div class="section">
                        <h3>Voucher và Coupon</h3>
                        <input type="text" placeholder="Nhập mã giảm giá (nếu có)" />
                        <button type="button">Áp dụng</button>
                    </div>
                    <button type="submit" name="submit_order">Hoàn tất</button>
                </div>
                <div class="right">
                    <h3>Đơn hàng</h3>
                    <?php 
                    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        $tongtien = 0;
                        foreach ($_SESSION['cart'] as $item) {
                            $thanhtien = $item['soluong'] * $item['giasp'];
                            $tongtien += $thanhtien;
                            echo "<div class='order-item'>
                                <img src='admincp/modules/quanlysp/upload/{$item['hinhanh']}' alt='Hình ảnh sản phẩm'>
                                <div>
                                    <p>{$item['tensanpham']}</p>
                                    <p>Mã SP: {$item['masp']}</p>
                                    <p>" . number_format($item['giasp'], 0, ',', '.') . "đ x {$item['soluong']}</p>
                                </div>
                            </div>";
                        }
                        echo "<hr />
                            <div class='summary'>
                                <p>Tổng giá trị đơn hàng: <span>" . number_format($tongtien, 0, ',', '.') . "đ</span></p>
                                <p>Phí vận chuyển: <span>0đ</span></p>
                                <p>Giảm giá: <span>0đ</span></p>
                                <h3>Thành tiền: <span>" . number_format($tongtien, 0, ',', '.') . "đ</span></h3>
                            </div>";
                    } else {
                        echo "<p>Hiện tại không có sản phẩm nào trong giỏ hàng.</p>";
                    }
                    ?>
                </div>
            </div>
        </form>
        </div>
</main>
</body>
</html>


