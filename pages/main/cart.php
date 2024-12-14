<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/cartstyle.css">
<title>WEaR Store | Giỏ hàng</title>
</head>
    <body>
<section class ="cart">
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
   <?php 
   if(isset($_SESSION['dangky'])){
    echo 'Xin chào:'.'<span style="color:red">'.$_SESSION['dangky'];
   }
   ?>
    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <table>
                    <tr>
                       
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá sản phẩm</th>
                        <th>Thành tiền</th> 
                        <th>Quản lý</th>
                    </tr>
                    <?php if(isset($_SESSION['cart'])){
                        $i=0;
                        $tongtien=0;
                        $tongsosanpham=0;
                        foreach ($_SESSION['cart'] as $cart_item){
                            $thanhtien= $cart_item['soluong']*$cart_item['giasp'];
                            $tongtien=$tongtien+$thanhtien;
                            $tongsosanpham=$tongsosanpham+$cart_item['soluong'];
                            $i++;
                        ?>
                    <tr>
                        
                        <td><?php echo $cart_item['tensanpham'];?></td>
                        <td><img src="admincp/modules/quanlysp/upload/<?php echo $cart_item['hinhanh'];?>" width="150px"></td>
                        <td>
                            <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-plus"></i></a>
                            <?php echo $cart_item['soluong'];?>
                            <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>"><i class="fa-solid fa-minus"></i></a>
                        </td>
                        <td><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ';?></td>
                        <td><?php echo number_format($thanhtien,0,',','.').'vnđ';  ?></td>
                        <td><a href ="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?> ">Xóa</a></td>
                    </tr>                
                    <?php }

                    }else{
                    ?>
                    <tr>
                        <td colspan="6"><p>Hiện tại không có đơn hàng nào</p></td>
                        
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>      
            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan ="2">Tổng tiền giỏ hàng</th>
                    </tr>
                    <tr>
                        <td>Tổng sản phẩm</td>
                        <td><?php echo isset($tongsosanpham) ? $tongsosanpham : "0vnđ"; ?></td>
                    </tr>
                    <tr>
                        <td>Tổng tiền hàng</td>
                        <td><?php echo isset($tongtien) ? number_format($tongtien, 0, ',', '.') . 'vnđ' : '0vnđ'; ?>
                    </td>
                    </tr>
                    <tr>
                        <td>Tạm tính</td>
                        <td><p style ="color:black; font-weight: bold;"><?php echo isset($tongtien) ? number_format($tongtien, 0, ',', '.') . 'vnđ' : '0vnđ'; ?>
                        </p></td>
                    </tr>
                </table>
                <div class="cart-content-right-singin">
                    <?php
                        if(isset($_SESSION['dangky'])){
                        ?><p> <a href ="index.php?quanly=thanhtoan">ĐẶT HÀNG</a></p>
<?php
                        }else{
                            ?>
                            <p><a href ="index.php?quanly=dangky">Đăng ký</a> để mua hàng và tích điểm thành viên</p>
                      <?php  }
                    ?>
                </div>
            </div>  
        </div>
    </div>
</section>
</html>