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
  
//POSTされた回答をそれぞれのページ用のセッション変数に退避させる関数
function setAnswerSession(){
  if($_SESSION["testSection"] === 1){
    if($_SESSION["testIndex"] === 1){
      $_SESSION["answer"]["answer1"] = $_POST["question1"];
      $_SESSION["answer"]["answer2"] = $_POST["question2"];
      $_SESSION["answer"]["answer3"] = $_POST["question3"];
      $_SESSION["answer"]["answer4"] = $_POST["question4"];
      $_SESSION["answer"]["answer5"] = $_POST["question5"];
      $_SESSION["answer"]["answer6"] = $_POST["question6"];
      $_SESSION["answer"]["answer7"] = $_POST["question7"];
      $_SESSION["answer"]["answer8"] = $_POST["question8"];  
    }
    else if($_SESSION["testIndex"] === 2){
      $_SESSION["answer"]["answer9"] = $_POST["question1"];
      $_SESSION["answer"]["answer10"] = $_POST["question2"];
      $_SESSION["answer"]["answer11"] = $_POST["question3"];
      $_SESSION["answer"]["answer12"] = $_POST["question4"];
      $_SESSION["answer"]["answer13"] = $_POST["question5"];
      $_SESSION["answer"]["answer14"] = $_POST["question6"];
      $_SESSION["answer"]["answer15"] = $_POST["question7"];
      $_SESSION["answer"]["answer16"] = $_POST["question8"];
    }
    else if($_SESSION["testIndex"] === 3){
      $_SESSION["answer"]["answer17"] = $_POST["question1"];
      $_SESSION["answer"]["answer18"] = $_POST["question2"];
      $_SESSION["answer"]["answer19"] = $_POST["question3"];
      $_SESSION["answer"]["answer20"] = $_POST["question4"];
      $_SESSION["answer"]["answer21"] = $_POST["question5"];
      $_SESSION["answer"]["answer22"] = $_POST["question6"];
      $_SESSION["answer"]["answer23"] = $_POST["question7"];
      $_SESSION["answer"]["answer24"] = $_POST["question8"];
    }
    else if($_SESSION["testIndex"] === 4){
      $_SESSION["answer"]["answer25"] = $_POST["question1"];
      $_SESSION["answer"]["answer26"] = $_POST["question2"];
      $_SESSION["answer"]["answer27"] = $_POST["question3"];
      $_SESSION["answer"]["answer28"] = $_POST["question4"];
      $_SESSION["answer"]["answer29"] = $_POST["question5"];
      $_SESSION["answer"]["answer30"] = $_POST["question6"];
      $_SESSION["answer"]["answer31"] = $_POST["question7"];
      $_SESSION["answer"]["answer32"] = $_POST["question8"];
    }
    else if($_SESSION["testIndex"] === 5){
      $_SESSION["answer"]["answer33"] = $_POST["question1"];
      $_SESSION["answer"]["answer34"] = $_POST["question2"];
      $_SESSION["answer"]["answer35"] = $_POST["question3"];
      $_SESSION["answer"]["answer36"] = $_POST["question4"];
      $_SESSION["answer"]["answer37"] = $_POST["question5"];
      $_SESSION["answer"]["answer38"] = $_POST["question6"];
      $_SESSION["answer"]["answer39"] = $_POST["question7"];
      $_SESSION["answer"]["answer40"] = $_POST["question8"];
    }
  }
  else if($_SESSION["testSection"] === 2){
    if($_SESSION["testIndex"] === 1){
      $_SESSION["answer"]["answer1"] = $_POST["question1"];
      $_SESSION["answer"]["answer2"] = $_POST["question2"];
      $_SESSION["answer"]["answer3"] = $_POST["question3"];
      $_SESSION["answer"]["answer4"] = $_POST["question4"];
      $_SESSION["answer"]["answer5"] = $_POST["question5"];
 
    }
    else if($_SESSION["testIndex"] === 2){
      $_SESSION["answer"]["answer6"] = $_POST["question1"];
      $_SESSION["answer"]["answer7"] = $_POST["question2"];
      $_SESSION["answer"]["answer8"] = $_POST["question3"]; 
      $_SESSION["answer"]["answer9"] = $_POST["question4"];
      $_SESSION["answer"]["answer10"] = $_POST["question5"];
    }
    else if($_SESSION["testIndex"] === 3){
      $_SESSION["answer"]["answer11"] = $_POST["question1"];
      $_SESSION["answer"]["answer12"] = $_POST["question2"];
      $_SESSION["answer"]["answer13"] = $_POST["question3"];
      $_SESSION["answer"]["answer14"] = $_POST["question4"];
      $_SESSION["answer"]["answer15"] = $_POST["question5"];
    }
    else if($_SESSION["testIndex"] === 4){
      $_SESSION["answer"]["answer16"] = $_POST["question1"];
      $_SESSION["answer"]["answer17"] = $_POST["question2"];
      $_SESSION["answer"]["answer18"] = $_POST["question3"];
      $_SESSION["answer"]["answer19"] = $_POST["question4"];
      $_SESSION["answer"]["answer20"] = $_POST["question5"];
    }
    else if($_SESSION["testIndex"] === 5){
      $_SESSION["answer"]["answer21"] = $_POST["question1"];
      $_SESSION["answer"]["answer22"] = $_POST["question2"];
      $_SESSION["answer"]["answer23"] = $_POST["question3"];
      $_SESSION["answer"]["answer24"] = $_POST["question4"];
      $_SESSION["answer"]["answer25"] = $_POST["question5"];
    }
    else if($_SESSION["testIndex"] === 6){
      $_SESSION["answer"]["answer26"] = $_POST["question1"];
      $_SESSION["answer"]["answer27"] = $_POST["question2"];
      $_SESSION["answer"]["answer28"] = $_POST["question3"];
      $_SESSION["answer"]["answer29"] = $_POST["question4"];
      $_SESSION["answer"]["answer30"] = $_POST["question5"];
    }
  }
  else if($_SESSION["testSection"] === 3){
    if($_SESSION["testIndex"] === 1){
      $_SESSION["answer"]["answer1"] = $_POST["question1"];
      $_SESSION["answer"]["answer2"] = $_POST["question2"];
      $_SESSION["answer"]["answer3"] = $_POST["question3"];
      $_SESSION["answer"]["answer4"] = $_POST["question4"];
    }
    else if($_SESSION["testIndex"] === 2){
      $_SESSION["answer"]["answer5"] = $_POST["question1"]; 
      $_SESSION["answer"]["answer6"] = $_POST["question2"];
      $_SESSION["answer"]["answer7"] = $_POST["question3"];
      $_SESSION["answer"]["answer8"] = $_POST["question4"];
    }
    else if($_SESSION["testIndex"] === 3){
      $_SESSION["answer"]["answer9"] = $_POST["question1"]; 
      $_SESSION["answer"]["answer10"] = $_POST["question2"];
      $_SESSION["answer"]["answer11"] = $_POST["question3"];
      $_SESSION["answer"]["answer12"] = $_POST["question4"];
    }
    else if($_SESSION["testIndex"] === 4){
      $_SESSION["answer"]["answer13"] = $_POST["question1"]; 
      $_SESSION["answer"]["answer14"] = $_POST["question2"];
      $_SESSION["answer"]["answer15"] = $_POST["question3"];
      $_SESSION["answer"]["answer16"] = $_POST["question4"];
    }
    else if($_SESSION["testIndex"] === 5){
      $_SESSION["answer"]["answer17"] = $_POST["question1"]; 
      $_SESSION["answer"]["answer18"] = $_POST["question2"];
      $_SESSION["answer"]["answer19"] = $_POST["question3"];
      $_SESSION["answer"]["answer20"] = $_POST["question4"];
    }
    
  }
}

//試験各部の回答をDBに登録するよう問い合わせる関数
function answerSubmitDb(){
  if($_SESSION["testSection"] === 1){
    try{
      $con = connectDb();
      $stmt = $con->prepare("UPDATE answer SET
	      first_answer_1 = :first_answer_1,
	      first_answer_2 = :first_answer_2,
	      first_answer_3 = :first_answer_3,
	      first_answer_4 = :first_answer_4,
	      first_answer_5 = :first_answer_5,
	      first_answer_6 = :first_answer_6,
	      first_answer_7 = :first_answer_7,
	      first_answer_8 = :first_answer_8,
	      first_answer_9 = :first_answer_9,
	      first_answer_10 = :first_answer_10,
	      first_answer_11 = :first_answer_11,
	      first_answer_12 = :first_answer_12,
	      first_answer_13 = :first_answer_13,
	      first_answer_14 = :first_answer_14,
	      first_answer_15 = :first_answer_15,
	      first_answer_16 = :first_answer_16,
	      first_answer_17 = :first_answer_17,
	      first_answer_18 = :first_answer_18,
	      first_answer_19 = :first_answer_19,
	      first_answer_20 = :first_answer_20,
	      first_answer_21 = :first_answer_21,
	      first_answer_22 = :first_answer_22,
	      first_answer_23 = :first_answer_23,
	      first_answer_24 = :first_answer_24,
	      first_answer_25 = :first_answer_25,
	      first_answer_26 = :first_answer_26,
	      first_answer_27 = :first_answer_27,
	      first_answer_28 = :first_answer_28,
	      first_answer_29 = :first_answer_29,
	      first_answer_30 = :first_answer_30,
        first_answer_31 = :first_answer_31,
	      first_answer_32 = :first_answer_32,
	      first_answer_33 = :first_answer_33,
	      first_answer_34 = :first_answer_34,
	      first_answer_35 = :first_answer_35,
	      first_answer_36 = :first_answer_36,
	      first_answer_37 = :first_answer_37,
	      first_answer_38 = :first_answer_38,
	      first_answer_39 = :first_answer_39,
	      first_answer_40 = :first_answer_40
	      WHERE ID = :ID;");

      $stmt->bindValue(":ID", $_SESSION["userId"], PDO::PARAM_STR);
      $stmt->bindValue(":first_answer_1", $_SESSION["answer"]["answer1"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_2", $_SESSION["answer"]["answer2"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_3", $_SESSION["answer"]["answer3"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_4", $_SESSION["answer"]["answer4"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_5", $_SESSION["answer"]["answer5"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_6", $_SESSION["answer"]["answer6"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_7", $_SESSION["answer"]["answer7"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_8", $_SESSION["answer"]["answer8"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_9", $_SESSION["answer"]["answer9"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_10", $_SESSION["answer"]["answer10"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_11", $_SESSION["answer"]["answer11"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_12", $_SESSION["answer"]["answer12"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_13", $_SESSION["answer"]["answer13"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_14", $_SESSION["answer"]["answer14"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_15", $_SESSION["answer"]["answer15"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_16", $_SESSION["answer"]["answer16"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_17", $_SESSION["answer"]["answer17"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_18", $_SESSION["answer"]["answer18"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_19", $_SESSION["answer"]["answer19"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_20", $_SESSION["answer"]["answer20"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_21", $_SESSION["answer"]["answer21"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_22", $_SESSION["answer"]["answer22"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_23", $_SESSION["answer"]["answer23"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_24", $_SESSION["answer"]["answer24"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_25", $_SESSION["answer"]["answer25"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_26", $_SESSION["answer"]["answer26"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_27", $_SESSION["answer"]["answer27"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_28", $_SESSION["answer"]["answer28"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_29", $_SESSION["answer"]["answer29"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_30", $_SESSION["answer"]["answer30"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_31", $_SESSION["answer"]["answer31"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_32", $_SESSION["answer"]["answer32"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_33", $_SESSION["answer"]["answer33"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_34", $_SESSION["answer"]["answer34"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_35", $_SESSION["answer"]["answer35"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_36", $_SESSION["answer"]["answer36"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_37", $_SESSION["answer"]["answer37"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_38", $_SESSION["answer"]["answer38"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_39", $_SESSION["answer"]["answer39"], PDO::PARAM_STR);  
      $stmt->bindValue(":first_answer_40", $_SESSION["answer"]["answer40"], PDO::PARAM_STR);

      $stmt->execute();

	
      $_SESSION["testSection"]++;
      $_SESSION["testIndex"] = 1;
        
      if($_SESSION["testSection"] == 2){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "second_test_example.php"';
        echo '// -->';
        echo '</script>';
      }
      if($_SESSION["testSection"] == 3){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "third_test_example.php"';
        echo '// -->';
        echo '</script>';
      }
      if($_SESSION["testSection"] == 4){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "end_page.php"';
        echo '// -->';
        echo '</script>';
      }
    } catch (Exception $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }
  else if($_SESSION["testSection"] === 2){
    try{
      $con = connectDb();
      $stmt = $con->prepare("UPDATE answer SET
	      second_answer_1 = :second_answer_1,
	      second_answer_2 = :second_answer_2,
	      second_answer_3 = :second_answer_3,
	      second_answer_4 = :second_answer_4,
	      second_answer_5 = :second_answer_5,
	      second_answer_6 = :second_answer_6,
	      second_answer_7 = :second_answer_7,
	      second_answer_8 = :second_answer_8,
	      second_answer_9 = :second_answer_9,
	      second_answer_10 = :second_answer_10,
	      second_answer_11 = :second_answer_11,
	      second_answer_12 = :second_answer_12,
	      second_answer_13 = :second_answer_13,
	      second_answer_14 = :second_answer_14,
	      second_answer_15 = :second_answer_15,
	      second_answer_16 = :second_answer_16,
	      second_answer_17 = :second_answer_17,
	      second_answer_18 = :second_answer_18,
	      second_answer_19 = :second_answer_19,
	      second_answer_20 = :second_answer_20,
	      second_answer_21 = :second_answer_21,
	      second_answer_22 = :second_answer_22,
	      second_answer_23 = :second_answer_23,
	      second_answer_24 = :second_answer_24,
	      second_answer_25 = :second_answer_25,
	      second_answer_26 = :second_answer_26,
	      second_answer_27 = :second_answer_27,
	      second_answer_28 = :second_answer_28,
	      second_answer_29 = :second_answer_29,
	      second_answer_30 = :second_answer_30
	      WHERE ID = :ID;");

      $stmt->bindValue(":ID", $_SESSION["userId"], PDO::PARAM_STR);
      $stmt->bindValue(":second_answer_1", $_SESSION["answer"]["answer1"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_2", $_SESSION["answer"]["answer2"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_3", $_SESSION["answer"]["answer3"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_4", $_SESSION["answer"]["answer4"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_5", $_SESSION["answer"]["answer5"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_6", $_SESSION["answer"]["answer6"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_7", $_SESSION["answer"]["answer7"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_8", $_SESSION["answer"]["answer8"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_9", $_SESSION["answer"]["answer9"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_10", $_SESSION["answer"]["answer10"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_11", $_SESSION["answer"]["answer11"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_12", $_SESSION["answer"]["answer12"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_13", $_SESSION["answer"]["answer13"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_14", $_SESSION["answer"]["answer14"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_15", $_SESSION["answer"]["answer15"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_16", $_SESSION["answer"]["answer16"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_17", $_SESSION["answer"]["answer17"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_18", $_SESSION["answer"]["answer18"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_19", $_SESSION["answer"]["answer19"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_20", $_SESSION["answer"]["answer20"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_21", $_SESSION["answer"]["answer21"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_22", $_SESSION["answer"]["answer22"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_23", $_SESSION["answer"]["answer23"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_24", $_SESSION["answer"]["answer24"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_25", $_SESSION["answer"]["answer25"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_26", $_SESSION["answer"]["answer26"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_27", $_SESSION["answer"]["answer27"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_28", $_SESSION["answer"]["answer28"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_29", $_SESSION["answer"]["answer29"], PDO::PARAM_STR);  
      $stmt->bindValue(":second_answer_30", $_SESSION["answer"]["answer30"], PDO::PARAM_STR);  

      $stmt->execute();

	
      $_SESSION["testSection"]++;
      $_SESSION["testIndex"] = 1;
    
    
      if($_SESSION["testSection"] == 2){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "second_test_example.php"';
        echo '// -->';
        echo '</script>';
      }
      if($_SESSION["testSection"] == 3){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "third_test_example.php"';
        echo '// -->';
        echo '</script>';
      }
      if($_SESSION["testSection"] == 4){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "end_page.php"';
        echo '// -->';
        echo '</script>';
      }
    } catch (Exception $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }
  else if($_SESSION["testSection"] === 3){
    try{
      $con = connectDb();
      $stmt = $con->prepare("UPDATE answer SET
	      third_answer_1 = :third_answer_1,
	      third_answer_2 = :third_answer_2,
	      third_answer_3 = :third_answer_3,
	      third_answer_4 = :third_answer_4,
	      third_answer_5 = :third_answer_5,
	      third_answer_6 = :third_answer_6,
	      third_answer_7 = :third_answer_7,
	      third_answer_8 = :third_answer_8,
	      third_answer_9 = :third_answer_9,
	      third_answer_10 = :third_answer_10,
	      third_answer_11 = :third_answer_11,
	      third_answer_12 = :third_answer_12,
	      third_answer_13 = :third_answer_13,
	      third_answer_14 = :third_answer_14,
	      third_answer_15 = :third_answer_15,
	      third_answer_16 = :third_answer_16,
	      third_answer_17 = :third_answer_17,
	      third_answer_18 = :third_answer_18,
	      third_answer_19 = :third_answer_19,
	      third_answer_20 = :third_answer_20
	      WHERE ID = :ID;");

      $stmt->bindValue(":ID", $_SESSION["userId"], PDO::PARAM_STR);
      $stmt->bindValue(":third_answer_1", $_SESSION["answer"]["answer1"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_2", $_SESSION["answer"]["answer2"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_3", $_SESSION["answer"]["answer3"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_4", $_SESSION["answer"]["answer4"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_5", $_SESSION["answer"]["answer5"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_6", $_SESSION["answer"]["answer6"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_7", $_SESSION["answer"]["answer7"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_8", $_SESSION["answer"]["answer8"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_9", $_SESSION["answer"]["answer9"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_10", $_SESSION["answer"]["answer10"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_11", $_SESSION["answer"]["answer11"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_12", $_SESSION["answer"]["answer12"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_13", $_SESSION["answer"]["answer13"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_14", $_SESSION["answer"]["answer14"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_15", $_SESSION["answer"]["answer15"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_16", $_SESSION["answer"]["answer16"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_17", $_SESSION["answer"]["answer17"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_18", $_SESSION["answer"]["answer18"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_19", $_SESSION["answer"]["answer19"], PDO::PARAM_STR);  
      $stmt->bindValue(":third_answer_20", $_SESSION["answer"]["answer20"], PDO::PARAM_STR);   

      $stmt->execute();

	
      $_SESSION["testSection"]++;
      $_SESSION["testIndex"] = 1;
    
    
      if($_SESSION["testSection"] == 2){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "second_test_example.php"';
        echo '// -->';
        echo '</script>';
      }
      if($_SESSION["testSection"] == 3){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "third_test_example.php"';
        echo '// -->';
        echo '</script>';
      }
      if($_SESSION["testSection"] == 4){
        statupdate();
        echo '<script type="text/javascript">';
        echo "<!--\n";
        echo 'location.href = "end_page.php"';
        echo '// -->';
        echo '</script>';
      }
    } catch (Exception $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }
}


/*
* 認証情報確認部
*/
if(!isset($_SESSION["userId"])){
  redirectLogin();
}
  
/*
 * HTTPリクエスト解析部
 */
if($_SERVER["REQUEST_METHOD"] == "GET"){
  
}
else if($_SERVER["REQUEST_METHOD"] == "POST"){
  if(isset($_POST["sectionEnd"])){
    //タイムアップ・試験各部終了時
    
    setAnswerSession();
    answerSubmitDb();
  }
  else if(isset($_POST["testNumber"])){
    //次へ、戻るが押された時
    //押されたページの回答をセッション変数に退避
    setAnswerSession();
  }
}

function statupdate()
{
    try{
        $con = connectDb();    
        $sql = "SELECT * FROM user where ID = '".$_SESSION["userId"]."';";
        $stmt = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $stat = $stmt[0]['stat'] + 1;

        //DBの受検区分を更新する
        $stmt = $con->prepare("UPDATE user SET 
           stat = :STAT
           WHERE ID = :ID;");

        $stmt->bindValue(":ID", $_SESSION["userId"], PDO::PARAM_STR);
        $stmt->bindValue(":STAT", $stat, PDO::PARAM_STR);

        $stmt->execute();
    }
    catch (PDOException $e) 
    {
        exit('データベース接続失敗。'.$e->getMessage());
    } 
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

