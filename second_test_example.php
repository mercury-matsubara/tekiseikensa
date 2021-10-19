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
    $_SESSION["testSection"] = 2;
    $_SESSION["testIndex"] = 1;
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
    $_SESSION["answer"]["answer21"] = NULL;
    $_SESSION["answer"]["answer22"] = NULL;
    $_SESSION["answer"]["answer23"] = NULL;
    $_SESSION["answer"]["answer24"] = NULL;
    $_SESSION["answer"]["answer25"] = NULL;
    $_SESSION["answer"]["answer26"] = NULL;
    $_SESSION["answer"]["answer27"] = NULL;
    $_SESSION["answer"]["answer28"] = NULL;
    $_SESSION["answer"]["answer29"] = NULL;
    $_SESSION["answer"]["answer30"] = NULL;
  }
  
  /*
  * 認証情報確認部
  */
  if(!isset($_SESSION["userId"])){
    redirectLogin();
  }
  else if(isset($_SESSION["testSection"])){
    if($_SESSION["testSection"] != 2){
      redirectTestPage($_SESSION["testSection"]);
    }
    else
    {
        sessionInit();
    }
  }
  else{
    sessionInit();
  }

?>
<html>
<head>
<link rel="shortcut icon" href="./img/favicon.ico">
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
      <h3>これより第２部を開始します。</h3>
      <div class="workPlace">
	<p>まずは、例題です。</p>
	<div class="testPlace">
	  <br>
	  各問の左側にある４つの図は一定の規則に従って並んでいます。
	  <br>
	  その規則を見つけ出し、次にくるべき図を右側の５つの図から選んでください。
	  <br><br>
	  <table cellpadding="5px">
	    <tr>
	      <td width="5%"></td>	
	      <td width="40%" class="questionSpacing" align="right">回答番号→</td>
	      <td width="40%" class="resultSpacing">
		<img width="60" src="img/second_test_images/図A.png">
		<img width="60" src="img/second_test_images/図B.png">
		<img width="60" src="img/second_test_images/図C.png">
		<img width="60" src="img/second_test_images/図D.png">
		<img width="60" src="img/second_test_images/図E.png">
	      </td>
	      <td width="10%" >回答欄</td>
	    </tr>
	    <tr>
	      <td width="5%">例題1</td>	
	      <td width="40%" class="questionSpacing">
		<img width="60" src="img/second_test_images/image2.png">
		<img width="60" src="img/second_test_images/image1.png">
		<img width="60" src="img/second_test_images/image4.png">
		<img width="60" src="img/second_test_images/image3.png">
	      </td>
	      <td width="40%" class="resultSpacing">
		  <img width="60" src="img/second_test_images/image1.png">
		  <img width="60" src="img/second_test_images/image2.png">
		  <img width="60" src="img/second_test_images/image4.png">
		  <img width="60" src="img/second_test_images/image3.png">
		  <img width="60" src="img/second_test_images/image5.png">
	      </td>
	      <td width="10%">
		<select class="resultSelect">
		  <option value="" hidden>B</option>
		</select>
	      </td>
	    </tr>
	    <tr>
		<td colspan="5">
		  この問題では斜線のある四角が時計回りに順次動いています。右上・右下・左下・左上という順序です。<br>従って、次はまた右上となり、答えは B になります。
		</td>
	    </tr>
	    <tr><td><br></td></tr>
	    <tr>
	      <td width="5%"></td>	
	      <td width="40%" class="questionSpacing" align="right">回答番号→</td>
	      <td width="40%" class="resultSpacing">
		<img width="60" src="img/second_test_images/図A.png">
		<img width="60" src="img/second_test_images/図B.png">
		<img width="60" src="img/second_test_images/図C.png">
		<img width="60" src="img/second_test_images/図D.png">
		<img width="60" src="img/second_test_images/図E.png">
	      </td>
	      <td width="10%" >回答欄</td>
	    </tr>
	    <tr>
	      <td width="5%">例題2</td>	
	      <td width="40%" class="questionSpacing">
		  <img width="60" src="img/second_test_images/image7.png">
		  <img width="60" src="img/second_test_images/image8.png">
		  <img width="60" src="img/second_test_images/image9.png">
		  <img width="60" src="img/second_test_images/image10.png">
	      </td>
	      <td width="40%" class="resultSpacing">
		  <img width="60" src="img/second_test_images/image7.png">
		  <img width="60" src="img/second_test_images/image8.png">
		  <img width="60" src="img/second_test_images/image9.png">
		  <img width="60" src="img/second_test_images/image11.png">
		  <img width="60" src="img/second_test_images/image6.png">
	      </td>
	      <td width="10%">
		<select class="resultSelect">
		  <option value="" hidden>E</option>
		</select>
	      </td>
	    </tr>
	    <tr>
		<td colspan="5">
		    この問題では縦線が１本ずつ増え、かつ、次第に長くなっています。<br>従って、次は5本線で最も長い線が増えたものとなり、答えは E になります。
		</td>
	    </tr>
	    
	  </table>
	</div>
      </div>
      <div class="descButtonText">
	<p>それでは、第２部の本題に入ります。　問題数は３０問、制限時間は１５分です。</p>
	<p>「次へ」ボタンを押して、本題を始めてください。</p>
      </div>
      <div class="transitionButton">
	<input type='button' onclick="location.href='./second_test.php'" name='next' class="button" value = '次へ' >
      </div>
    </div>
  </div>
  <script src="blockBack.js"></script>
</body>


</html>
