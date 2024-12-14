<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://kit.fontawesome.com/f5a295cf83.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="style/mainstyle.css">
<title>Trang chủ | WEaR Store </title>
</head>
<body>
<!--------------------HEADER-------------------->
        <?php 
            session_start();
            include("admincp/config/config.php");
            include("pages/header.php");
            include("pages/main.php");
            include("pages/footer.php");
?>

</body>
<script>
    //Roll thì cái header đổi màu//
    const header = document.querySelector("header")
    window.addEventListener("scroll",function(){
        x = window.pageYOffset //tọa độ chiều dọc//
        if(x>0){
            header.classList.add("sticky")
        }
        else{
            header.classList.remove("sticky")
        }
    })
    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotItem = document.querySelectorAll(".dot")
    let imgNumber = imgPosition.length
    let index = 0
    //console.log(imgPosition)
   
    //Căn ảnh theo chiều ngang để chạy slide
    imgPosition.forEach(function(image,index){
        image.style.left = index*100 + "%"
        dotItem[index].addEventListener("click",function(){
        Slider(index)
        })  
    })
   
    //Ảnh sẽ tự động trượt sang sau 5s//
    function imgSlide (){
        index ++;
        if(index >= imgNumber) {index = 0}
        Slider(index)
    }


    function Slider(index) {
        imgContainer.style.left = "-" + index*100 + "%"
        const dotActive = document.querySelector('.active')
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
    setInterval(imgSlide,5000)
</script>
</html>















    