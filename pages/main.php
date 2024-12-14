<div id="main">
<div class="maincontent">
<?php
if(isset($_GET['quanly'])){
$tam = $_GET['quanly'];
}else{
$tam ='';
}
if($tam=='danhmucsanpham'){ 
    include("main/category.php");
}
elseif($tam=='giohang'){
 include("main/cart.php");
}
elseif($tam=='tintuc'){
    include("main/news.php");
}
elseif($tam=='sanpham'){
    include("main/product.php");
}
elseif($tam=='dangky'){
    include("main/dangky.php");
}
elseif($tam=='thanhtoan'){
    include("main/payment.php");
}
elseif($tam=='dangnhap'){
    include("main/dangnhap.php");
}
elseif($tam=='tintucfull'){
    include("main/fullnews.php");
}
elseif($tam=='timkiem'){
    include("main/timkiem.php");
}
else{
    include("pages/slider.php");
}
?> 
</div>
</div>