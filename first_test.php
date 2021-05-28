<?php
  session_start();
  
  //ログイン画面にリダイレクトさせる関数
  function redirectLogin(){
    echo '<script type="text/javascript">';
    echo "<!--\n";
    echo 'location.href = "login.php"';
    echo '// -->';
    echo '</script>';
  }
  
  function redirectTestPage($page){
    if($page === 1){
      echo '<script type="text/javascript">';
      echo "<!--\n";
      echo 'location.href = "first_test_example.php"';
      echo '// -->';
      echo '</script>';
    }
    else if($page === 2){
      echo '<script type="text/javascript">';
      echo "<!--\n";
      echo 'location.href = "second_test_example.php"';
      echo '// -->';
      echo '</script>';
    }
    else if($page === 3){
      echo '<script type="text/javascript">';
      echo "<!--\n";
      echo 'location.href = "third_test_example.php"';
      echo '// -->';
      echo '</script>';
    }
  }
  
  /*
  * 認証情報確認部
  */
  if(!isset($_SESSION["userId"])){
    redirectLogin();
  }
  if($_SESSION["testSection"] != 1){
    redirectTestPage($_SESSION["testSection"]);
  }
?>
<html>
<head>
<link rel="shortcut icon" href="./img/favicon.ico">
<title>第一部 - 適性検査 | MercurySoft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="test_page_style.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
  window.onload = function(){
    // 画面開いたら一番最初に走る処理
    getTestData("test_data_ajax.php?page=");
    timerStart(600);//10分で設定
    //timerStart(9999);//デバッグ用
  };
</script>
</head>
<body>
<div id="app">
  <div class="main">
    <div class="header">
      <img src="./img/mercury_soft_logo&mark_basic_02.png" >
      <hr class="primary">
    </div>
    <div class="contents">
      <div class="timer" id="timer">
	[残り時間]
      </div>
      <div id="testDataAjax">
      </div>
    </div>
  </div>
  <script src="test_page_app.js"></script>
  <script src="blockBack.js"></script>
</div>
</body>
</html>


