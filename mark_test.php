<?php
session_start();
  
  function connectDb(){
    $db_ini_array = parse_ini_file("db.ini", true);

    $host = $db_ini_array["database"]["host"];
    $user = $db_ini_array["database"]["user"];
    $password = $db_ini_array["database"]["userpass"];
    $database = $db_ini_array["database"]["database"];

    return new PDO("mysql:dbname=$database;host=$host;charset=utf8",$user,$password);
  }

  function getAnswerDb($userId){
    try{
      $con = connectDb();
      $stmt = $con->prepare("select * from answer where  ID = :userID; ");
      $stmt->bindValue(":userID", $userId, PDO::PARAM_STR);
      $stmt->execute();
      $result = $stmt->fetch();

      return $result;
      
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    } 
  }
  
  function updateScoreDb($userId, $first_correct, $first_wrong, $second_correct, $second_wrong, $third_correct, $third_wrong, $sum_score, $rank_score){
    try{
      $con = connectDb();
      $stmt = $con->prepare("UPDATE user SET
	      first_correct = :first_correct,
	      first_wrong = :first_wrong,
	      second_correct = :second_correct,
	      second_wrong = :second_wrong,
	      third_correct = :third_correct,
	      third_wrong = :third_wrong,
	      sum_score = :sum_score,
	      rank_score = :rank_score
	      WHERE ID = :userID;");
      $stmt->bindValue(":first_correct", $first_correct, PDO::PARAM_INT);
      $stmt->bindValue(":first_wrong", $first_wrong, PDO::PARAM_INT);
      $stmt->bindValue(":second_correct", $second_correct, PDO::PARAM_INT);
      $stmt->bindValue(":second_wrong", $second_wrong, PDO::PARAM_INT);
      $stmt->bindValue(":third_correct", $third_correct, PDO::PARAM_INT);
      $stmt->bindValue(":third_wrong", $third_wrong, PDO::PARAM_INT);
      $stmt->bindValue(":sum_score", $sum_score, PDO::PARAM_INT);
      $stmt->bindValue(":rank_score", $rank_score, PDO::PARAM_STR);
      $stmt->bindValue(":userID", $userId, PDO::PARAM_STR);
      $stmt->execute();
    } catch (PDOException $e) {
      exit('データベース接続失敗。'.$e->getMessage());
    }
  }

  if(isset($_POST)){
    //1部正解
    $answer1 =[
	1 => "5",
	2 => "5",
	3 => "4",
	4 => "1",
	5 => "4",
	6 => "3",
	7 => "3",
	8 => "1",
	9 => "5",
	10 => "3",
	11 => "2",
	12 => "4",
	13 => "4",
	14 => "2",
	15 => "4",
	16 => "4",
	17 => "2",
	18 => "2",
	19 => "5",
	20 => "1",
	21 => "1",
	22 => "3",
	23 => "2",
	24 => "5",
	25 => "3",
	26 => "4",
	27 => "4",
	28 => "5",
	29 => "3",
	30 => "2",
	31 => "5",
	32 => "4",
	33 => "3",
	34 => "3",
	35 => "4",
	36 => "1",
	37 => "4",
	38 => "5",
	39 => "1",
	40 => "2"
	];
    //２部正解
    $answer2 = [
	1 => "C",
	2 => "D",
	3 => "E",
	4 => "B",
	5 => "B",
	6 => "A",
	7 => "C",
	8 => "E",
	9 => "C",
	10 => "A",
	11 => "D",
	12 => "C",
	13 => "D",
	14 => "A",
	15 => "A",
	16 => "D",
	17 => "B",
	18 => "D",
	19 => "A",
	20 => "C",
	21 => "A",
	22 => "C",
	23 => "B",
	24 => "B",
	25 => "E",
	26 => "A",
	27 => "E",
	28 => "D",
	29 => "B",
	30 => "D"
	];
    //３部正解
    $answer3 = [
	1 => "3",
	2 => "2",
	3 => "4",
	4 => "1",
	5 => "1",
	6 => "2",
	7 => "1",
	8 => "4",
	9 => "2",
	10 => "2",
	11 => "3",
	12 => "1",
	13 => "2",
	14 => "4",
	15 => "3",
	16 => "3",
	17 => "1",
	18 => "2",
	19 => "4",
	20 => "2"
	];
    
    //POST取得
    $data = json_decode(file_get_contents("php://input"), TRUE);
    $userId = $data["userId"];
    
    //回答をDBから取得
    $userAnswer = getAnswerDb($userId);
    $score1 = 0;
    $score2 = 0;
    $score3 = 0;
    $sumScore = 0;
    $sumWrongScore = 0;
    $totalScore = 0;
    $rank = "";

    //回答と正解を比較して正答数を数える
    for($answerCount = 1, $userCount = 1; $answerCount <= 40; $answerCount++, $userCount++){
      if($answer1[$answerCount] == $userAnswer[$userCount]){
	$score1++;
      }
    }
    for($answerCount = 1, $userCount = 41; $answerCount <= 30; $answerCount++, $userCount++){
      if($answer2[$answerCount] == $userAnswer[$userCount]){
	$score2++;
      }
    }
    for($answerCount = 1, $userCount = 71; $answerCount <= 20; $answerCount++, $userCount++){
      if($answer3[$answerCount] == $userAnswer[$userCount]){
	$score3++;
      }
    }
    
    //総正答数
    $sumScore = $score1 + $score2 + $score3;
    //総誤答数
    $sumWrongScore = 90 - $sumScore;
    
    //得点の算出
    //得点＝(正－1/4*誤)・・・0.75は切り上げ、それ以外は切り捨てる。
    $tmpScore = $sumScore - (1 / 4 * $sumWrongScore);
    $sign = 0;
    if($tmpScore > 0){
      $sign = 1;
    }
    elseif($tmpScore == 0){
      $sign = 0;
    }
    if($tmpScore < 0){
      $sign = -1;
    }
    $a = $tmpScore - floor($tmpScore);
    if(($sign != 0) && ($a == 0.75)){
      $totalScore = $tmpScore + 0.25;
    }
//    if(($sign != 0) && (($tmpScore % $sign) == 0.75)){
//      $totalScore = $tmpScore + 0.25;
//    }
    else{
      if($sign < 0){
	$totalScore = floor($tmpScore) + 1;
      }
      else{
	$totalScore = floor($tmpScore);
      }
    }

    //評価ランク
    if($totalScore >= 73){
      $rank = "A上";
    }
    elseif($totalScore >= 64){
      $rank = "A中";
    }
    elseif($totalScore >= 55){
      $rank = "A下";
    }
    elseif($totalScore >= 52){
      $rank = "B上";
    }
    elseif($totalScore >= 50){
      $rank = "B中";
    }
    elseif($totalScore >= 46){
      $rank = "B下";
    }
    elseif($totalScore >= 42){
      $rank = "C上";
    }
    elseif($totalScore >= 37){
      $rank = "C中";
    }
    elseif($totalScore >= 32){
      $rank = "C下";
    }
    else{
      $rank = "D";
    }
    
    //DB更新
    updateScoreDb($userId, $score1, 40 - $score1, $score2, 30 - $score2, $score3, 20 - $score3, $totalScore, $rank);
  }
    
?>
  