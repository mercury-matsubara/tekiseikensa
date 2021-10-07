

<!--
 現在使っていません。
-->


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
  
  function sessionInit(){
    $_SESSION["testSection"] = 1;
    $_SESSION["testIndex"] = 1;
    $_SESSION["answer"]["answer1"] = 0;
    $_SESSION["answer"]["answer2"] = 0;
    $_SESSION["answer"]["answer3"] = 0;
    $_SESSION["answer"]["answer4"] = 0;
    $_SESSION["answer"]["answer5"] = 0;
    $_SESSION["answer"]["answer6"] = 0;
    $_SESSION["answer"]["answer7"] = 0;
    $_SESSION["answer"]["answer8"] = 0;
    $_SESSION["answer"]["answer9"]  = 0;
    $_SESSION["answer"]["answer10"] = 0;
    $_SESSION["answer"]["answer11"] = 0;
    $_SESSION["answer"]["answer12"] = 0;
    $_SESSION["answer"]["answer13"] = 0;
    $_SESSION["answer"]["answer14"] = 0;
    $_SESSION["answer"]["answer15"] = 0;
    $_SESSION["answer"]["answer16"] = 0;
    $_SESSION["answer"]["answer17"] = 0;
    $_SESSION["answer"]["answer18"] = 0;
    $_SESSION["answer"]["answer19"] = 0;
    $_SESSION["answer"]["answer20"] = 0;
    $_SESSION["answer"]["answer21"] = 0;
    $_SESSION["answer"]["answer22"] = 0;
    $_SESSION["answer"]["answer23"] = 0;
    $_SESSION["answer"]["answer24"] = 0;
    $_SESSION["answer"]["answer25"] = 0;
    $_SESSION["answer"]["answer26"] = 0;
    $_SESSION["answer"]["answer27"] = 0;
    $_SESSION["answer"]["answer28"] = 0;
    $_SESSION["answer"]["answer29"] = 0;
    $_SESSION["answer"]["answer30"] = 0;
    $_SESSION["answer"]["answer31"] = 0;
    $_SESSION["answer"]["answer32"] = 0;
    $_SESSION["answer"]["answer33"] = 0;
    $_SESSION["answer"]["answer34"] = 0;
    $_SESSION["answer"]["answer35"] = 0;
    $_SESSION["answer"]["answer36"] = 0;
    $_SESSION["answer"]["answer37"] = 0;
    $_SESSION["answer"]["answer38"] = 0;
    $_SESSION["answer"]["answer39"] = 0;
    $_SESSION["answer"]["answer40"] = 0;
  }
  
  //受検状態変更関数
  function statChange(){
    try{
      $con = connectDb();
      $stmt = $con->prepare("UPDATE user SET 
	test_day = :testDay,
	stat = 1
	WHERE ID = :ID;");

      $stmt->bindValue(":ID", $_SESSION["userId"], PDO::PARAM_STR);  
      $stmt->bindValue(":testDay", date("Y/m/d"), PDO::PARAM_STR);

      $stmt->execute();
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    } 
  } 
  
  /*
  * 認証情報確認部
  */
  if(!isset($_SESSION["userId"])){
    redirectLogin();
  }
  
  sessionInit();
  statChange();
?>
<html>
<head>]
<link rel="shortcut icon" href="./img/favicon.ico">
<title>試験入力例 - 適性検査 | MercurySoft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
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
	  いくつかの文字が一定の規則に従って並んでいます。
	  <br>
	  その規則を見つけ出し、次にくるべき文字を選んで、配列を完成させてください。
	  <br><br>
	  <table width="100%" cellpadding="10px">
	    <tr>
	      <td width="10%"></td>	
	      <td width="20%" class="questionSpacing" align="right">回答番号→</td>
	      <td width="20%" class="resultSpacing">12345</td>
	      <td width="10%" >回答欄</td>
	      <td width="30%" ></td>
	    </tr>
	    <tr>
	      <td width="10%">例題１</td>	
	      <td width="20%" class="questionSpacing">abababab</td>
	      <td width="20%" class="resultSpacing">abcde</td>
	      <td width="10%">
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
	      <td width="10%">
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
	      <td width="10%">
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
	      <td width="10%">
		<select class="resultSelect">
		  <option value="" hidden>5</option>
		</select>
	      </td>
	      <td width="30%">この問題では配列が axbyaxbyaxb という順になっていま<br>従って、次にくる文字は y となり、答えは 5 になります。</td>
	    </tr>
	  </table>
	</div>
      </div>
      <div class="transitionButton">
	<input type='button' onclick="location.href='./first_test.php'" name='next' class="button" value = '次へ' >
      </div>
    </div>
  </div>
  <script src="blockBack.js"></script>
  
</body>


</html>
