<?php
session_start();
session_destroy();
?>

<html>
<head>
<link rel="shortcut icon" href="./img/favicon.ico">
<title>初期化</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
    
<script>
window.onload = function(){
  sessionStorage.removeItem('time');
  location.href = './login.php';
}
</script>
</body>
</html>
