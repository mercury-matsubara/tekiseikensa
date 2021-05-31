<?php

  session_start();

  //データベース接続関数
  function connectDb(){
    $db_ini_array = parse_ini_file("db.ini", true);

    $host = $db_ini_array["database"]["host"];
    $user = $db_ini_array["database"]["user"];
    $password = $db_ini_array["database"]["userpass"];
    $database = $db_ini_array["database"]["database"];

    return new PDO("mysql:dbname=$database;host=$host;charset=utf8",$user,$password);
  }
  
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
  
  function sessionInit(){
    unset($_SESSION["answer"]);
    $_SESSION["answer"]["answer1"] = NULL;
    $_SESSION["answer"]["answer2"] = NULL;
    $_SESSION["answer"]["answer3"] = NULL;
    $_SESSION["answer"]["answer4"] = NULL;
    $_SESSION["answer"]["answer5"] = NULL;
    $_SESSION["answer"]["answer6"] = NULL;
    $_SESSION["answer"]["answer7"] = NULL;
    $_SESSION["answer"]["answer8"] = NULL;
    $_SESSION["answer"]["answer9"]  = NULL;
    $_SESSION["answer"]["answer10"] = NULL;
    $_SESSION["answer"]["answer11"] = NULL;
    $_SESSION["answer"]["answer12"] = NULL;
    $_SESSION["answer"]["answer13"] = NULL;
    $_SESSION["answer"]["answer14"] = NULL;
    $_SESSION["answer"]["answer15"] = NULL;
    $_SESSION["answer"]["answer16"] = NULL;
    $_SESSION["answer"]["answer17"] = NULL;
    $_SESSION["answer"]["answer18"] = NULL;
    $_SESSION["answer"]["answer19"] = NULL;
    $_SESSION["answer"]["answer20"] = NULL;
  }
  
  /*
  * 認証情報確認部
  */
  if(!isset($_SESSION["userId"])){
    redirectLogin();
  }
  else if($_SESSION["testSection"] != 3){
    redirectTestPage($_SESSION["testSection"]);
  }
  else{
    sessionInit();
  }

?>
<html>
<head>
<title>試験入力例 - 適性検査 | MercurySoft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="test_page_style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
  <div class="main">
    <div class="header">
      <img src="./img/mercury_soft_logo&mark_basic_02.png" >
      <hr class="primary">
    </div>
    <div class="contents">
      <h3>これより第３部を開始します。</h3>
      <div class="workPlace">
	<p>まずは、例題です。</p>
	<div class="testPlace">
	  <br>
	  各問に対して、答えの選択肢が４つあります。
	  <br>
	  問題を解いて、正しい答えを１つ選んでください。
	  <br><br>
	  <table width="100%" cellpadding="10px">
	      <tr>
		<td class="number" width="5%"></td>	
		<td class="questionSpacing" align="right" width="40%"></td>
		<td class="" width="10%"></td>
		<td class="" width="10%"></td>
		<td class="" width="10%"></td>
		<td class="" width="10%"></td>
		<td width="5%">回答欄</td>
	      </tr>
	    <tr>
	      <td width="5%">例題１</td>	
	      <td width="40%" class="">
		  1,200円の定価の品物を２割引で買った。<br>1,000円札を出したら、おつりはいくらか。
	      </td>
	      <td class="" width="10%">
		    1: 960円
		</td>
		<td class="" width="10%">
		    2: 240円
		</td>
		<td class="" width="10%">
		    3: 40円
		</td>
		<td class="" width="10%">
		    4: なし
		</td>
	      <td class="answer" width="10%">
		<select class="resultSelect">
		  <option value="" hidden>1</option>
		</select>
	      </td>
	      </tr>
	    <tr>
		<td colspan="5">
		  <br><br>この問題の結果は 960円となり、答えは 1 になります。
		</td>
	    </tr>
	  </table>
	  <br><br>
	</div>
      </div>
      <div class="descButtonText">
	<h4>計算用紙を準備してください。</h4>
	<h4>電卓等の自動計算機は使用禁止です。</h4>
	<p>それでは、第３部の本題に入ります。　問題数は２０問、制限時間は１３分です。</p>
	<p>「次へ」ボタンを押して、本題を始めてください。</p>
      </div>
      <div class="transitionButton">
	<input type='button' onclick="location.href='./third_test.php'" name='next' class="button" value = '次へ' >
      </div>
    </div>
  </div>
  <script src="blockBack.js"></script>
</body>


</html>
