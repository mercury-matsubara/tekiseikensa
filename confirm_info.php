<?php
  session_start();
  $_SESSION['exampleback'] = 0;
  
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
  elseif(isset($_SESSION["testSection"])){
    redirectTestPage($_SESSION["testSection"]);
  }
  
    //データベース接続関数
    function connectDb(){
      $db_ini_array = parse_ini_file("db.ini", true);

      $host = $db_ini_array["database"]["host"];
      $user = $db_ini_array["database"]["user"];
      $password = $db_ini_array["database"]["userpass"];
      $database = $db_ini_array["database"]["database"];

      return new PDO("mysql:dbname=$database;host=$host;charset=utf8",$user,$password);
    }
    
  if(isset($_POST['next']))
  {
    try
    {
        $con = connectDb();
        $sql = "SELECT * FROM user where ID = '".$_SESSION["userId"]."';";
        $stmt = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if($stmt[0]['stat'] == "0")
        {
            //DBの受検区分を1に更新する
            $stmt = $con->prepare("UPDATE user SET 
              stat = 1
              WHERE ID = :ID;");

            $stmt->bindValue(":ID", $_SESSION["userId"], PDO::PARAM_STR);  

            $stmt->execute();
            
            echo '<script type="text/javascript">';
            echo "<!--\n";
            echo 'location.href = "manual.php"';
            echo '// -->';
            echo '</script>';
        }
        else
        {
            echo '<script type="text/javascript">alert("ERROR: 既に受検しています");</script>';
        }
    }
    catch (PDOException $e) 
    {
        exit('データベース接続失敗。'.$e->getMessage());
    } 
  }
?>
<html>
<head>
<link rel="shortcut icon" href="./img/favicon.ico">
<title>確認画面 - 適性検査 | MercurySoft</title>
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
      <h3>受験者情報を確認してください。</h3>
      <table class="loginTable">
	<tr>
	  <td>受検者ID</td>
	  <td><input class="infoBox" size="30" type="text"  name="userIdInfo" MAXLENGTH="20" disabled ="disabled" value = <?php echo $_SESSION["userId"] ?> ></td>
	</tr>
	<tr><td>&nbsp;</td> <tr/>
	<tr>
	  <td>氏名（漢字）</td>
	  <td><input class="infoBox" size="30" type="text"  name="userNameKanjiInfo" MAXLENGTH="20" disabled ="disabled" value = <?php echo $_SESSION["userNameKanji"] ?> ></td>
	</tr>
	<tr>
	  <td>氏名（カナ）</td>
	  <td><input class="infoBox" size="30" type="text"  name="userNameKanaInfo" MAXLENGTH="20" disabled ="disabled" value = <?php echo $_SESSION["userNameKana"] ?> ></td>
	</tr>
      </table>
      <p>※ブラウザは「chrome」または「Edge」で受検してください。</p>
      <p>表示情報に誤りがないことを確認して、「次へ」ボタンを押してください。</p>
      
      <form action="confirm_info.php" method="post">
      <div class="transitionButton">
	<input type='button' onclick="location.href='./login.php'" name='back' class="button" value = '戻る' >
	<input type='submit' name='next' class="button" value = '次へ' >
      </div>
      </form>
    </div>
  </div>
</body>


</html>
