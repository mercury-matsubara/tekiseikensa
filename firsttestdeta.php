<?php
    $html = 
	'<form id="test_form" name="test_form" action="test_api.php" method="post">
	  <input type="hidden" name="testNumber" value="first_1">
	  <h3>【第１部】 本題　　問題'.$mondaihani.'</h3>
	  <div class="workPlace">
	    <div class="testPlace">    
	      <table width="100%" class="testTable">
		<tr>
		  <td class="number"></td>	
		  <td class="question" align="right">回答番号→</td>
		  <td class="result">12345</td>
		  <td class="answer" >回答欄</td>
		</tr>
		<tr><td></td></tr>';
    
    for($mondaisu=1;$mondaisu<=8;$mondaisu++){
        
        $mondainumber = $mondaisu + $pagepurasu;
        
        
        $html .= 
            '<tr>
              <td class="number">問題'.$mondainumber.'</td>	
              <td class="question">'.$mondainaiyou[$mondaisu - 1].'</td>
              <td class="result">'.$sentaku[$mondaisu - 1].'</td>
              <td class="answer">
                <select name="question'.$mondaisu.'" class="resultSelect">
                  <option value="'.$_SESSION["answer"]["answer".$mondainumber].'" selected>'.$_SESSION["answer"]["answer".$mondainumber].'</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </td>
            </tr>';
    }
    
    $html .= 
        '</table>  
	    </div>
	  </div>
	  <p>第１部　問題数４０問、制限時間は１０分です。</p>';
    
    //ページ数が4ページ以下の場合
    if($_SESSION['testIndex'] <= 4){
        $html .= 
            '<p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>';
    }
    
    //ページ数が2ページ目以降の場合
    if($_SESSION['testIndex'] >= 2){
        $html .= '<p>「戻る」ボタンで前ページに戻ります。</p>';
    }
    
    if($_SESSION['testIndex'] == 5){
        $html .= '<p>「終了」ボタンを押すと、第２部に移ります。</p>
                  <p>「終了」ボタンを押した後は、第１部に戻ることはできません。</p>';
    }
    
    $html .= '<div class="transitionButton">';
	
    //ページ数が2ページ目以降の場合
    if($_SESSION['testIndex'] >= 2){
        $html .= '<button id="backTestPage" name="back" class="button" >戻る</button>';
    }
    
	if($_SESSION['testIndex'] <= 4){
        $html .= 
            '<button id="nextTestPage" name="next" class="button" >次へ</button>';
    }
    
	if($_SESSION['testIndex'] == 5){
        $html .= 
            '<input id="TestPage" type="button" v-on:click="openModal" name="result" class="button" value = "終了" >';
    }
    
    $html .= 
        '</div>';
    
    if($_SESSION['testIndex'] == 5){
        $html .= 
            '<div id="overlay" v-show="showContent">
              <div id="content">
            <p>終了してよろしいですか？</p>
            <br><br>
            <div class="transitionButton">
              <input type="submit" name="sectionEnd" v-on:click="onSectionEnd" class="button" value="はい"></input>
              <input type="button" v-on:click="closeModal"　class="button" value="いいえ"></input>	  
            </div>
            </div>
            </div>';
    }
    
    if($_SESSION['testIndex'] != 5){
        $html .= 
          '</form>
          <script>
        $(function(){
          //次へボタン押下時の挙動
          $("#nextTestPage").on("click", function(){
            //回答送信
            postAnswerData("test_data_ajax.php?page=next");
            //問題文さしかえ
            //getTestData ("test_data_ajax.php?page=next") ;
          });
          $("#backTestPage").on("click", function(){
            //回答送信
            postAnswerData("test_data_ajax.php?page=back");
          });
        });
          </script>';
    }
    
    if($_SESSION['testIndex'] == 5){
        $html .= 
          '</form>
              <script>
            $(function(){
              $("#backTestPage").on("click", function(){
                //回答送信
                postAnswerData("test_data_ajax.php?page=back");
              });
            });
              </script>
              <script>
            new Vue({
              el: "#app",
              data: {
                showContent: false
              },
              methods:{
                openModal: function(){
                  this.showContent = true;
                },
                closeModal: function(){
                  this.showContent = false;
                },
                onSectionEnd: function(){
			count_stop();
			console.log( "エンド" + Number(sessionStorage.getItem("time")));
                }
              }
            });
              </script>';
    }
?>

