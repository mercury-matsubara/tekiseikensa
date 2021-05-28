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
  
  /*
  * 認証情報確認部
  */
  if(!isset($_SESSION["userId"])){
    redirectLogin();
  }
  
  session_destroy();
?>
<html>
<head>
<link rel="shortcut icon" href="./img/favicon.ico">
<title>終了画面 - 適性検査 | MercurySoft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
  <div id="app">
    <div class="main">
      <div class="header">
	<img src="./img/mercury_soft_logo&mark_basic_02.png" >
	<hr class="primary">
      </div>
      <div class="contents">
	<h2>これで一次適性検査は終了です。</h2>
	<h2>お疲れさまでした。</h2>
	<br><br>
	<p>「終了」ボタンを押してください。</p>
	<div class="transitionButton">
	  <input type='button' v-on:click="closeButtonClicked" name='end' class="button" value = '終了' >
	</div>
      </div>
    </div>
  </div>
  <script src="blockBack.js"></script>
</body>
</html>

<script>
  new Vue({
    el: '#app',
    methods:{
      closeButtonClicked: function(){
	location.href = "init.php";
      }
    }
  });
</script>