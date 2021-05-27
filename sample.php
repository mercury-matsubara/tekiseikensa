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
  if($_SESSION["testSection"] != 2){
    redirectTestPage($_SESSION["testSection"]);
  }
?>
<html>
<head>
<title>第二部 - 適性検査 | MercurySoft</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="css.css" rel="stylesheet" type="text/css">
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
  window.onload = function(){
    getTestData("test_data_ajax.php?page=");
    // 画面開いたら一番最初に走る処理
    //timerStart(900);//15分で設定
    timerStart(9999);//デバッグ用
  };
</script>
</head>
<body>
<div id="app">
  <div class="main">
    <div class="header">
      <img src="./img/mercury_soft_logo&mark_basic_02.png" >
      <hr class="primary">
    </div>
    <div class="contents">
      <div class="timer" id="timer">
	  [残り時間]
      </div>
      <form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	<h3>【第２部】 本題　　問題26～30</h3>
	<div class="workPlace">
	  <div class="testPlace">
	    <table width="100%" cellpadding="10px">
	      <tr>
		<td class="number" width="10%"></td>	
		<td class="questionSpacing" align="right" width="20%">回答番号→</td>
		<td class="resultSpacing" width="25%">
		  <img width="60" src="img/second_test_images/図A.png">
		  <img width="60" src="img/second_test_images/図B.png">
		  <img width="60" src="img/second_test_images/図C.png">
		  <img width="60" src="img/second_test_images/図D.png">
		  <img width="60" src="img/second_test_images/図E.png">
		</td>
		<td class="answer" width="10%">回答欄</td>
	      </tr>
	      <tr>
		<td class="number">問題26</td>	
		<td class="">
		    <img width="60" src="img/second_test_images/image204.png">
		    <img width="60" src="img/second_test_images/image205.png">
		    <img width="60" src="img/second_test_images/image206.png">
		    <img width="60" src="img/second_test_images/image207.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image208.png">
		    <img width="60" src="img/second_test_images/image209.png">
		    <img width="60" src="img/second_test_images/image210.png">
		    <img width="60" src="img/second_test_images/image211.png">
		    <img width="60" src="img/second_test_images/image212.png">
		</td>
		<td class="answer">
		  <select name="question1"  class="resultSelect">
		    <option value="" hidden></option>
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="D">D</option>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題27</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image213.png">
		    <img width="60" src="img/second_test_images/image214.png">
		    <img width="60" src="img/second_test_images/image215.png">
		    <img width="60" src="img/second_test_images/image216.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image217.png">
		    <img width="60" src="img/second_test_images/image218.png">
		    <img width="60" src="img/second_test_images/image219.png">
		    <img width="60" src="img/second_test_images/image220.png">
		    <img width="60" src="img/second_test_images/image221.png">
		</td>
		<td class="answer">
		  <select name="question2"  class="resultSelect">
		    <option value="" hidden></option>
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="D">D</option>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題28</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image222.png">
		    <img width="60" src="img/second_test_images/image223.png">
		    <img width="60" src="img/second_test_images/image224.png">
		    <img width="60" src="img/second_test_images/image225.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image226.png">
		    <img width="60" src="img/second_test_images/image227.png">
		    <img width="60" src="img/second_test_images/image228.png">
		    <img width="60" src="img/second_test_images/image230.png">
		    <img width="60" src="img/second_test_images/image229.png">
		</td>
		<td class="answer">
		  <select name="question3"  class="resultSelect">
		    <option value="" hidden></option>
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="D">D</option>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題29</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image231.png">
		  <img width="60" src="img/second_test_images/image232.png">
		  <img width="60" src="img/second_test_images/image233.png">
		  <img width="60" src="img/second_test_images/image234.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image235.png">
		  <img width="60" src="img/second_test_images/image236.png">
		  <img width="60" src="img/second_test_images/image237.png">
		  <img width="60" src="img/second_test_images/image238.png">
		  <img width="60" src="img/second_test_images/image239.png">
		</td>
		<td class="answer">
		  <select name="question4"  class="resultSelect">
		    <option value="" hidden></option>
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="D">D</option>
		  </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題30</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image240.png">
		  <img width="60" src="img/second_test_images/image241.png">
		  <img width="60" src="img/second_test_images/image242.png">
		  <img width="60" src="img/second_test_images/image243.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image244.png">
		  <img width="60" src="img/second_test_images/image245.png">
		  <img width="60" src="img/second_test_images/image246.png">
		  <img width="60" src="img/second_test_images/image247.png">
		  <img width="60" src="img/second_test_images/image248.png">
		</td>
		<td class="answer">
		  <select name="question5"  class="resultSelect">
		    <option value="" hidden></option>
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="D">D</option>
		  </select>
		</td>
	      </tr>
	    </table>
	  </div>
	</div>
      <p>第２部　問題数３０問、制限時間は１５分です。</p>
	  <p>「終了」ボタンを押すと、第２部に移ります。</p>
	  <p>「終了」ボタンを押した後は、第１部に戻ることはできません。</p>
	<div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <input id="TestPage" type="button" v-on:click="openModal" name="result" class="button" value = "終了" >
	</div>

      <div id="overlay" v-show="showContent">
      <div id="content">
	<p>終了してよろしいですか？</p>
	<div class="transitionButton">
	  <input type="submit" name="sectionEnd" v-on:click="onSectionEnd" class="button" value="はい"></input>
	  <input type="button" v-on:click="closeModal"　class="button" value="いいえ"></input>	  
	</div>
      </div>
      </div>
      </form>
      <script>
	$(function(){
	  $("#backTestPage").on("click", function(){
	    //回答送信
	    postAnswerData("test_data_ajax.php?page=back");
	    //問題文さしかえ
	    //getTestData ("test_data_ajax.php?page=back") ;
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
	      localStorage.removeItem("time");
	    }
	  }
	});
      </script>
      <div id="testDataAjax">
      </div>
    </div>
  </div>
</div>
  <script src="test_page_app.js"></script>
  <script src="blockBack.js"></script>
</body>


</html>
