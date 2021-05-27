<?php
session_start();
session_destroy();
?>

<html>
<head>
<title>初期化</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
    
<script>
window.onload = function(){
  localStorage.removeItem('time');
  location.href = './login.php';
}
</script>
</body>
</html>
