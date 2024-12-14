
<!DOCTYPE html> <html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>ADMINCP</title>
<link rel="stylesheet" type="text/css" href="css/styleadmin.css">
</head>
<body>
<h3 class="title_admin">WELCOME TO ADMINCP</h3>
<div class="wrapper">   
<?php
    include("config/config.php");
    include("modules/header.php");
    include("modules/menu.php");
    include("modules/main.php");
    include("modules/footer.php");
?>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/full/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'tomtat' );
    CKEDITOR.replace( 'noidung' );
</script>
</body> 
</html>
