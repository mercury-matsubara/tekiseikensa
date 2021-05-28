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
      if($_SESSION['exampleback'] != 1)
      {
          echo '<script type="text/javascript">';
          echo "<!--\n";
          echo 'location.href = "first_test_example.php"';
          echo '// -->';
          echo '</script>';
      }
      else
      {
          $_SESSION['exampleback'] = 0;
      }
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
  elseif(isset($_SESSION["testSection"])){
    redirectTestPage($_SESSION["testSection"]);
  }
?>
<html>
<head>
<link rel="shortcut icon" href="./img/favicon.ico">
<title>試験説明 - 適性検査 | MercurySoft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="main">
    <div class="header">
      <img src="./img/mercury_soft_logo&mark_basic_02.png" >
      <hr class="primary">
    </div>
    <div class="contents">
      <h3>適性検査について説明します。</h3>
      <div class="workPlace">
	<p>筆記具・メモ用紙（計算用紙）を準備してください。　※提出の必要はありません。</p>
	<p>適性検査は３部構成になっています。</p>
	<p>各部ごとに制限時間を設けてあります。制限時間を超えると回答入力ができなくなります。</p>
	<p>　第１部　10分 （40問）</p>
	<p>　第２部　15分 （30問）</p>
	<p>　第３部　13分 （20問）</p>
	<p></p>
	<p>各部とも、例題を用意してあります。</p>
	<p>まずは例題を実施して、問題の主旨を理解してください。</p>
	<p>その後、本題へ進んでください。</p>
	<p></p>
	<p>電卓等の計算機器は使用禁止です。</p>
	<p></p>
	<p>検査開始後は検査終了までブラウザを閉じないでください。</p>
	<p></p>
	<p>よろしければ、「次へ」ボタンを押してください。</p>
      </div>
      <div class="transitionButton">
	<!--<input type='button' onclick="location.href='./confirm_info.php'" name='back' class="button" value = '戻る' >-->
	<input type='button' onclick="location.href='./first_test_example.php'" name='next' class="button" value = '次へ' >
      </div>
    </div>
  </div>
</body>


</html>
