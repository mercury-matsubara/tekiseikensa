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
    $_SESSION["testSection"] = 1;
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
    $_SESSION["answer"]["answer31"] = NULL;
    $_SESSION["answer"]["answer32"] = NULL;
    $_SESSION["answer"]["answer33"] = NULL;
    $_SESSION["answer"]["answer34"] = NULL;
    $_SESSION["answer"]["answer35"] = NULL;
    $_SESSION["answer"]["answer36"] = NULL;
    $_SESSION["answer"]["answer37"] = NULL;
    $_SESSION["answer"]["answer38"] = NULL;
    $_SESSION["answer"]["answer39"] = NULL;
    $_SESSION["answer"]["answer40"] = NULL;
  }
  
  /*
  * 認証情報確認部
  */
  if(!isset($_SESSION["userId"])){
    redirectLogin();
  }
  else if(isset($_SESSION["testSection"])){
    if($_SESSION["testSection"] != 1){
      redirectTestPage($_SESSION["testSection"]);
    }
  }
  else{
    sessionInit();
  }

  if(isset($_POST['back']))
  {
      $_SESSION['exampleback'] = 1;
      echo '<script type="text/javascript">';
      echo "<!--\n";
      echo 'location.href = "manual.php"';
      echo '// -->';
      echo '</script>';
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
      <h3>これより第１部を開始します。</h3>
      <div class="workPlace">
	<p>まずは、例題です。</p>
	<div class="testPlace">
	  <br>
	  いくつかの文字が一定の規則に従って並んでいます。
	  <br>
	  その規則を見つけ出し、次にくるべき文字を選んで、配列を完成させてください。
	  <br><br>
	  <table width="100%" cellpadding="10px">
	    <tr>
	      <td width="10%"></td>	
	      <td width="20%" class="questionSpacing" align="right">回答番号→</td>
	      <td width="20%" class="resultSpacing">12345</td>
	      <td width="5%" >回答欄</td>
	      <td width="30%" ></td>
	    </tr>
	    <tr>
	      <td width="10%">例題１</td>	
	      <td width="20%" class="questionSpacing">abababab</td>
	      <td width="20%" class="resultSpacing">abcde</td>
	      <td width="5%">
		<select class="resultSelect">
		  <option value="" hidden>1</option>
		</select>
	      </td>
	      <td width="30%">この問題では配列が abababab という順になっています。<br>従って、次にくる文字は a となり、答えは 1 になります。</td>
	    </tr>
	    <tr>
	      <td width="10%">例題2</td>	
	      <td width="20%" class="questionSpacing">aabbccdd</td>
	      <td width="20%" class="resultSpacing">abcde</td>
	      <td width="5%">
		<select class="resultSelect">
		  <option value="" hidden>5</option>
		</select>
	      </td>
	      <td width="30%">この問題では配列が aabbccdd という順になっています。<br>従って、次にくる文字は e となり、答えは 5 になります。</td>
	    </tr>
	    <tr>
	      <td width="10%">例題3</td>	
	      <td width="20%" class="questionSpacing">cadaeafa</td>
	      <td width="20%" class="resultSpacing">defgh</td>
	      <td width="5%">
		<select class="resultSelect">
		  <option value="" hidden>4</option>
		</select>
	      </td>
	      <td width="30%">この問題では配列が cadaeafa という順になっています。<br>従って、次にくる文字は g となり、答えは 4 になります。</td>
	    </tr>
	    <tr>
	      <td width="10%">例題4</td>	
	      <td width="20%" class="questionSpacing">axbyaxbyaxb</td>
	      <td width="20%" class="resultSpacing">abcxy</td>
	      <td width="5%">
		<select class="resultSelect">
		  <option value="" hidden>5</option>
		</select>
	      </td>
	      <td width="30%">この問題では配列が axbyaxbyaxb という順になっていま<br>従って、次にくる文字は y となり、答えは 5 になります。</td>
	    </tr>
	  </table>
	</div>
      </div>
      <form action="first_test_example.php" method="post">
      <div class="transitionButton">
	<input type='submit' name='back' class="button" value = '戻る' >
	<input type='button' onclick="location.href='./first_test.php'" name='next' class="button" value = '次へ' >
      </div>
      </form>
    </div>
  </div>
  <script src="blockBack.js"></script>
</body>


</html>
