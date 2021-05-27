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
  elseif(isset($_SESSION["testSection"])){
    redirectTestPage($_SESSION["testSection"]);
  }
?>
<html>
<head>
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
      <p>表示情報に誤りがないことを確認して、「次へ」ボタンを押してください。</p>
      <div class="transitionButton">
	<input type='button' onclick="location.href='./login.php'" name='back' class="button" value = '戻る' >
	<input type='button' onclick="location.href='./manual.php'" name='next' class="button" value = '次へ' >
      </div>
      </form>
    </div>
  </div>
</body>


</html>
