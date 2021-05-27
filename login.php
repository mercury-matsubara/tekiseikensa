<?php
session_start();

define("SUCSSESS", 1);
define("STAT_ERROR", 2);
define("LOGIN_ERROR", 3);

//データベース接続関数
function connectDb(){
  $db_ini_array = parse_ini_file("db.ini", true);

  $host = $db_ini_array["database"]["host"];
  $user = $db_ini_array["database"]["user"];
  $password = $db_ini_array["database"]["userpass"];
  $database = $db_ini_array["database"]["database"];

  return new PDO("mysql:dbname=$database;host=$host;charset=utf8",$user,$password);
}

function login($userId, $userPass){
  try{
    $con = connectDb();  

    /*
     * ユーザー情報の問い合わせ
     */
    $Loginsql = "select * from user where  ID = '".$userId."' AND password = '".$userPass."' ; ";
    $stmt = $con->prepare("select * from user where  ID = :userId AND password = :userPass ; ");
    
    $stmt->bindValue(":userId", $userId, PDO::PARAM_STR);  
    $stmt->bindValue(":userPass", $userPass, PDO::PARAM_STR);
    
    $stmt->execute();

    $log_result = false;																								
    $rownums = 0;	

    $result = $con->query($Loginsql);																					// クエリ発行
    $rownums = $result->rowCount();

    //問い合わせ結果判断処理
    if ($rownums == 0)
    {
      $log_result = LOGIN_ERROR;
      return($log_result);
    }
    
    /*
     * ログインユーザーの受検状態チェック処理
     */
    $Statsql = "select * from user where ID = '".$userId."' AND stat = 0 ;" ;

    $stat_result = false;	
    $rownums = 0;

    $result = $con->query($Statsql);																					// クエリ発行
    $rownums = $result->rowCount();
    //
    if ($rownums == 0){
      //既に受検済みであった場合
      $log_result = STAT_ERROR;
      return($log_result);
    }
    else {
      //正しいID,Passwordで未受検の場合SUCSSESSで返す
      $log_result = SUCSSESS;
      return($log_result);
    }

  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  }
}

function getInfo($userId){
  try{
    $con = connectDb();
    $stmt = $con->prepare("select * from user where  ID = :userID; ");
    $stmt->bindValue(":userID", $userId, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch();
  
    $_SESSION['userId'] = $result["ID"];
    $_SESSION['userNameKanji'] = $result["name_kanji"];
    $_SESSION['userNameKana'] = $result["name_kana"];
  } catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
  } 
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


  //ログイン判定部
  if(isset($_POST['userId']))
  {
    $userId = $_POST['userId'];
    $userPass = $_POST['userPass'];
    $login_result = login($userId,$userPass);
    
    if($login_result == SUCSSESS)
    {
      if($userId == "mercury"){
	getInfo($userId);
	echo '<script type="text/javascript">';
	echo "<!--\n";
	echo 'location.href = "management.php"';
	echo '// -->';
	echo '</script>';
      }
      else{
	getInfo($userId);
	statChange();
	echo '<script type="text/javascript">';
	echo "<!--\n";
	echo 'location.href = "confirm_info.php"';
	echo '// -->';
	echo '</script>';
      }
    }
    else
    {
      if($login_result == STAT_ERROR){
	echo '<script type="text/javascript">alert("ERROR: 既に受検済みです。");</script>';
      }
      else if($login_result == LOGIN_ERROR){
	echo '<script type="text/javascript">alert("ERROR: IDかパスワードが違います。");</script>';
      }
    }
  }
?>
<html>
<head>
<title>ログイン - 適性検査 | MercurySoft</title>
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
      <h2>マーキュリーソフト株式会社へようこそ</h2>
      <h1>採用選考　一次適性検査</h1>
      <form action="login.php" method="post">
	<table class="loginTable">
	  <tr>
	    <td>受験者ID</td>
	    <td><input class="form-text" size="30" type="text"  name="userId" MAXLENGTH="20"value = ""
	    ></td>
	  </tr>
	  <tr>
	    <td>パスワード</td>
	    <td><input class="form-text" size="30" type="password"  name="userPass" MAXLENGTH="20"></td>
	  </tr>
	</table>
	<p>事前に通知しました受験者IDとパスワードを入力して、「ログイン」ボタンを押してください。<p/>
	<input type='submit' name='login' class="button" value = 'ログイン' >
      </form>
    </div>
  </div>
</body>


</html>
