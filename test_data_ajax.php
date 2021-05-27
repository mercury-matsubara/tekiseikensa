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

/*
* 認証情報確認部
*/
if(!isset($_SESSION["userId"])){
  redirectLogin();
}

$requestPage = filter_input(INPUT_GET, 'page');
$html = "";

if($requestPage === 'next'){
  $_SESSION["testIndex"]++;
}
else if($requestPage === 'back'){
  $_SESSION["testIndex"]--;
}

if($_SESSION["testSection"] === 1){
  if($_SESSION["testIndex"] === 1){
    $html = 
	'<form id="test_form" name="test_form" action="test_api.php" method="post">
	  <input type="hidden" name="testNumber" value="first_1">
	  <h3>【第１部】 本題　　問題01～08</h3>
	  <div class="workPlace">
	    <div class="testPlace">    
	      <table width="100%" cellpadding="10px">
		<tr>
		  <td class="number"></td>	
		  <td class="question" align="right">回答番号→</td>
		  <td class="result">12345</td>
		  <td class="answer" >回答欄</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		  <td class="number">問題01</td>	
		  <td class="question">eefgghii</td>
		  <td class="result">fghij</td>
		  <td class="answer">
		    <select name="question1" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer1"].'" selected>'.$_SESSION["answer"]["answer1"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題02</td>	
		  <td class="question">azaybzbyc</td>
		  <td class="result">acxyz</td>
		  <td class="answer">
		    <select name="question2" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer2"].'" selected>'.$_SESSION["answer"]["answer2"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題03</td>	
		  <td class="question">defdefghi</td>
		  <td class="result">defgh</td>
		  <td class="answer">
		    <select name="question3" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer3"].'" selected>'.$_SESSION["answer"]["answer3"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題04</td>	
		  <td class="question">cdexyzfghxyz</td>
		  <td class="result">ijklm</td>
		  <td class="answer">
		    <select name="question4" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer4"].'" selected>'.$_SESSION["answer"]["answer4"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題05</td>	
		  <td class="question">defdegde</td>
		  <td class="result">dfghi</td>
		  <td class="answer">
		    <select name="question5" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer5"].'" selected>'.$_SESSION["answer"]["answer5"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題06</td>	
		  <td class="question">abczabcyabc</td>
		  <td class="result">abxyz</td>
		  <td class="answer">
		    <select name="question6" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer6"].'" selected>'.$_SESSION["answer"]["answer6"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題07</td>	
		  <td class="question">fgbhibjkb</td>
		  <td class="result">belmn</td>
		  <td class="answer">
		    <select name="question7" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer7"].'" selected>'.$_SESSION["answer"]["answer7"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題08</td>	
		  <td class="question">tsrtsrts</td>
		  <td class="result">rstvw</td>
		  <td class="answer">
		    <select name="question8" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer8"].'" selected>'.$_SESSION["answer"]["answer8"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
	      </table>
	    </div>
	  </div>
	  <p>第１部　問題数４０問、制限時間は１０分です。</p>
	  <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
	  <div class="transitionButton">
	    <button id="nextTestPage" name="next" class="button" >次へ</button>
	  </div>
	  </form>
	  <script>
	    $(function(){
	      //次へボタン押下時の挙動
	      $("#nextTestPage").on("click", function(){
		//回答送信
		postAnswerData("test_data_ajax.php?page=next");
	      });
	    });
	  </script>';
  }
  else if($_SESSION["testIndex"] === 2){
    $html =
      '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	  <h3>【第１部】 本題　　問題09～16</h3>
	  <div class="workPlace">
	    <div class="testPlace">
	      <table width="100%" cellpadding="10px">
		<tr>
		  <td class="number"></td>	
		  <td class="question" align="right">回答番号→</td>
		  <td class="result">12345</td>
		  <td class="answer" >回答欄</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		  <td class="number">問題09</td>	
		  <td class="question">arbsctarb</td>
		  <td class="result">abcrs</td>
		  <td class="answer">
		    <select name="question1" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer9"].'" selected>'.$_SESSION["answer"]["answer9"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題10</td>	
		  <td class="question">bccdeefg</td>
		  <td class="result">efghi</td>
		  <td class="answer">
		    <select name="question2" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer10"].'" selected>'.$_SESSION["answer"]["answer10"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題11</td>	
		  <td class="question">efhikl</td>
		  <td class="result">mnopq</td>
		  <td class="answer">
		    <select name="question3" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer11"].'" selected>'.$_SESSION["answer"]["answer11"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題12</td>	
		  <td class="question">abccdeffg</td>
		  <td class="result">efghi</td>
		  <td class="answer">
		    <select name="question4" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer12"].'" selected>'.$_SESSION["answer"]["answer12"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題13</td>	
		  <td class="question">amnbopc</td>
		  <td class="result">depqr</td>
		  <td class="answer">
		    <select name="question5" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer13"].'" selected>'.$_SESSION["answer"]["answer13"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題14</td>	
		  <td class="question">tttssrqqqp</td>
		  <td class="result">opqrs</td>
		  <td class="answer">
		    <select name="question6" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer14"].'" selected>'.$_SESSION["answer"]["answer14"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題15</td>	
		  <td class="question">ddffhhjj</td>
		  <td class="result">ijklm</td>
		  <td class="answer">
		    <select name="question7" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer15"].'" selected>'.$_SESSION["answer"]["answer15"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題16</td>	
		  <td class="question">mnmnklopopkl</td>
		  <td class="result">kopqr</td>
		  <td class="answer">
		    <select name="question8" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer16"].'" selected>'.$_SESSION["answer"]["answer16"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
	      </table>  
	    </div>
	  </div>
	  <p>第１部　問題数４０問、制限時間は１０分です。</p>
	  <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
	<p>「戻る」ボタンで前ページに戻ります。</p>
	<div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 3){
    $html =
      '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	  <h3>【第１部】 本題　　問題17～24</h3>
	  <div class="workPlace">
	    <div class="testPlace">
	      <table width="100%" cellpadding="10px">
		<tr>
		  <td class="number"></td>	
		  <td class="question" align="right">回答番号→</td>
		  <td class="result">12345</td>
		  <td class="answer" >回答欄</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		  <td class="number">問題17</td>	
		  <td class="question">cddeeefff</td>
		  <td class="result">efghj</td>
		  <td class="answer">
		    <select name="question1" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer17"].'" selected>'.$_SESSION["answer"]["answer17"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題18</td>	
		  <td class="question">gfed</td>
		  <td class="result">bcfgh</td>
		  <td class="answer">
		    <select name="question2" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer19"].'" selected>'.$_SESSION["answer"]["answer19"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題19</td>	
		  <td class="question">dfhjl</td>
		  <td class="result">jklmn</td>
		  <td class="answer">
		    <select name="question3" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer19"].'" selected>'.$_SESSION["answer"]["answer19"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題20</td>	
		  <td class="question">abcijdefij</td>
		  <td class="result">ghijk</td>
		  <td class="answer">
		    <select name="question4" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer20"].'" selected>'.$_SESSION["answer"]["answer20"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題21</td>	
		  <td class="question">efgefghefghi</td>
		  <td class="result">egijl</td>
		  <td class="answer">
		    <select name="question5" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer21"].'" selected>'.$_SESSION["answer"]["answer21"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題22</td>	
		  <td class="question">bcbdedfgfhi</td>
		  <td class="result">fghjk</td>
		  <td class="answer">
		    <select name="question6" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer22"].'" selected>'.$_SESSION["answer"]["answer22"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題23</td>	
		  <td class="question">aababccdc</td>
		  <td class="result">cdefg</td>
		  <td class="answer">
		    <select name="question7" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer23"].'" selected>'.$_SESSION["answer"]["answer23"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題24</td>	
		  <td class="question">aibcidef</td>
		  <td class="result">efghi</td>
		  <td class="answer">
		    <select name="question8" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer24"].'" selected>'.$_SESSION["answer"]["answer24"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
	      </table>  
	    </div>
	  </div>
	  <p>第１部　問題数４０問、制限時間は１０分です。</p>
	  <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
	<p>「戻る」ボタンで前ページに戻ります。</p>
	<div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 4){
    $html =
      '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	  <h3>【第１部】 本題　　問題25～32</h3>
	  <div class="workPlace">
	    <div class="testPlace">
	      <table width="100%" cellpadding="10px">
		<tr>
		  <td class="number"></td>	
		  <td class="question" align="right">回答番号→</td>
		  <td class="result">12345</td>
		  <td class="answer" >回答欄</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		  <td class="number">問題25</td>	
		  <td class="question">cehl</td>
		  <td class="result">opqrs</td>
		  <td class="answer">
		    <select name="question1" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer25"].'" selected>'.$_SESSION["answer"]["answer25"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題26</td>	
		  <td class="question">abdehimn</td>
		  <td class="result">pqrst</td>
		  <td class="answer">
		    <select name="question2" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer26"].'" selected>'.$_SESSION["answer"]["answer26"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題27</td>	
		  <td class="question">becfdge</td>
		  <td class="result">efghi</td>
		  <td class="answer">
		    <select name="question3" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer27"].'" selected>'.$_SESSION["answer"]["answer27"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題28</td>	
		  <td class="question">agbhc</td>
		  <td class="result">dfghi</td>
		  <td class="answer">
		    <select name="question4" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer28"].'" selected>'.$_SESSION["answer"]["answer28"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題29</td>	
		  <td class="question">adhko</td>
		  <td class="result">pqrst</td>
		  <td class="answer">
		    <select name="question5" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer29"].'" selected>'.$_SESSION["answer"]["answer29"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題30</td>	
		  <td class="question">efghjklno</td>
		  <td class="result">pqrst</td>
		  <td class="answer">
		    <select name="question6" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer30"].'" selected>'.$_SESSION["answer"]["answer30"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題31</td>	
		  <td class="question">aeibf</td>
		  <td class="result">cdgij</td>
		  <td class="answer">
		    <select name="question7" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer31"].'" selected>'.$_SESSION["answer"]["answer31"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題32</td>	
		  <td class="question">aedhg</td>
		  <td class="result">hijkl</td>
		  <td class="answer">
		    <select name="question8" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer32"].'" selected>'.$_SESSION["answer"]["answer32"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
	      </table>  
	    </div>
	  </div>
	  <p>第１部　問題数４０問、制限時間は１０分です。</p>
	  <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
	<p>「戻る」ボタンで前ページに戻ります。</p>
	<div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 5){
    $html =
      '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	  <h3>【第１部】 本題　　問題33～40</h3>
	  <div class="workPlace">
	    <div class="testPlace">
	      <table width="100%" cellpadding="10px">
		<tr>
		  <td class="number"></td>	
		  <td class="question" align="right">回答番号→</td>
		  <td class="result">12345</td>
		  <td class="answer" >回答欄</td>
		</tr>
		<tr><td></td></tr>
		<tr>
		  <td class="number">問題33</td>	
		  <td class="question">zdwgt</td>
		  <td class="result">hijkl</td>
		  <td class="answer">
		    <select name="question1" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer33"].'"  selected>'.$_SESSION["answer"]["answer33"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題34</td>	
		  <td class="question">zeiyfjxg</td>
		  <td class="result">ijklm</td>
		  <td class="answer">
		    <select name="question2" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer34"].'" selected>'.$_SESSION["answer"]["answer34"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題35</td>	
		  <td class="question">cqreuvg</td>
		  <td class="result">vwxyz</td>
		  <td class="answer">
		    <select name="question3" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer35"].'" selected>'.$_SESSION["answer"]["answer35"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題36</td>	
		  <td class="question">ksjtiuh</td>
		  <td class="result">vwxyz</td>
		  <td class="answer">
		    <select name="question4" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer36"].'" selected>'.$_SESSION["answer"]["answer36"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題37</td>	
		  <td class="question">rsjtuhvw</td>
		  <td class="result">cdefg</td>
		  <td class="answer">
		    <select name="question5" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer37"].'" selected>'.$_SESSION["answer"]["answer37"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題38</td>	
		  <td class="question">ieajfbk</td>
		  <td class="result">cdefg</td>
		  <td class="answer">
		    <select name="question6" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer38"].'" selected>'.$_SESSION["answer"]["answer38"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題39</td>	
		  <td class="question">hebifcj</td>
		  <td class="result">ghijk</td>
		  <td class="answer">
		    <select name="question7" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer39"].'" selected>'.$_SESSION["answer"]["answer39"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
		<tr>
		  <td class="number">問題40</td>	
		  <td class="question">njfmiel</td>
		  <td class="result">dhijm</td>
		  <td class="answer">
		    <select name="question8" class="resultSelect">
		      <option value="'.$_SESSION["answer"]["answer40"].'" selected>'.$_SESSION["answer"]["answer40"].'</option>
		      <option value="1">1</option>
		      <option value="2">2</option>
		      <option value="3">3</option>
		      <option value="4">4</option>
		      <option value="5">5</option>
		    </select>
		  </td>
		</tr>
	      </table>  
	    </div>
	  </div>
	  <p>第１部　問題数４０問、制限時間は１０分です。</p>
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
      </script>';
  }
}


else if($_SESSION["testSection"] === 2){
  if($_SESSION["testIndex"] === 1){
    $html = '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	<h3>【第２部】 本題　　問題01～05</h3>
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
		<td class="number">問題01</td>	
		<td class="">
		    <img width="60" src="img/second_test_images/図19.png">
		    <img width="60" src="img/second_test_images/図20.png">
		    <img width="60" src="img/second_test_images/図21.png">
		    <img width="60" src="img/second_test_images/図22.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/図21.png">
		    <img width="60" src="img/second_test_images/図22.png">
		    <img width="60" src="img/second_test_images/図19.png">
		    <img width="60" src="img/second_test_images/図20.png">
		    <img width="60" src="img/second_test_images/図26.png">
		</td>
		<td class="answer">
		  <select name="question1"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer1"].'" selected>'.$_SESSION["answer"]["answer1"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題02</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/図27.png">
		    <img width="60" src="img/second_test_images/図28.png">
		    <img width="60" src="img/second_test_images/図29.png">
		    <img width="60" src="img/second_test_images/図30.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image21.png">
		    <img width="60" src="img/second_test_images/image22.png">
		    <img width="60" src="img/second_test_images/図29.png">
		    <img width="60" src="img/second_test_images/image23.png">
		    <img width="60" src="img/second_test_images/図30.png">
		</td>
		<td class="answer">
		  <select name="question2"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer2"].'" selected>'.$_SESSION["answer"]["answer2"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題03</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image24.png">
		    <img width="60" src="img/second_test_images/image25.png">
		    <img width="60" src="img/second_test_images/image26.png">
		    <img width="60" src="img/second_test_images/image27.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image28.png">
		    <img width="60" src="img/second_test_images/image29.png">
		    <img width="60" src="img/second_test_images/image26.png">
		    <img width="60" src="img/second_test_images/image25.png">
		    <img width="60" src="img/second_test_images/image30.png">
		</td>
		<td class="answer">
		  <select name="question3"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer3"].'" selected>'.$_SESSION["answer"]["answer3"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題04</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image31.png">
		  <img width="60" src="img/second_test_images/image32.png">
		  <img width="60" src="img/second_test_images/image34.png">
		  <img width="60" src="img/second_test_images/image35.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image38.png">
		  <img width="60" src="img/second_test_images/image37.png">
		  <img width="60" src="img/second_test_images/image34.png">
		  <img width="60" src="img/second_test_images/image33.png">
		  <img width="60" src="img/second_test_images/image36.png">
		</td>
		<td class="answer">
		  <select name="question4"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer4"].'" selected>'.$_SESSION["answer"]["answer4"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題05</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image39.png">
		  <img width="60" src="img/second_test_images/image40.png">
		  <img width="60" src="img/second_test_images/image41.png">
		  <img width="60" src="img/second_test_images/image42.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image43.png">
		  <img width="60" src="img/second_test_images/image44.png">
		  <img width="60" src="img/second_test_images/image45.png">
		  <img width="60" src="img/second_test_images/image46.png">
		  <img width="60" src="img/second_test_images/image47.png">
		</td>
		<td class="answer">
		  <select name="question5"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer5"].'" selected>'.$_SESSION["answer"]["answer5"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	    </table>
	  </div>
	</div>
      <p>第２部　問題数３０問、制限時間は１５分です。</p>
      <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
      <div class="transitionButton">
	<button id="nextTestPage" name="next" class="button" >次へ</button>
      </div>
      </form>
      <script>
	$(function(){
	  //次へボタン押下時の挙動
	  $("#nextTestPage").on("click", function(){
	    //回答送信
	    postAnswerData("test_data_ajax.php?page=next");
	  });
	});
      </script>';
  }
  else if($_SESSION["testIndex"] === 2){
    $html = '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	<h3>【第２部】 本題　　問題06～10</h3>
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
		<td class="number">問題06</td>	
		<td class="">
		    <img width="60" src="img/second_test_images/image48.png">
		    <img width="60" src="img/second_test_images/image49.png">
		    <img width="60" src="img/second_test_images/image50.png">
		    <img width="60" src="img/second_test_images/image51.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image52.png">
		    <img width="60" src="img/second_test_images/image53.png">
		    <img width="60" src="img/second_test_images/image54.png">
		    <img width="60" src="img/second_test_images/image50.png">
		    <img width="60" src="img/second_test_images/image55.png">
		</td>
		<td class="answer">
		  <select name="question1"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer6"].'" selected>'.$_SESSION["answer"]["answer6"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題07</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image56.png">
		    <img width="60" src="img/second_test_images/image57.png">
		    <img width="60" src="img/second_test_images/image58.png">
		    <img width="60" src="img/second_test_images/image59.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image60.png">
		    <img width="60" src="img/second_test_images/image61.png">
		    <img width="60" src="img/second_test_images/image62.png">
		    <img width="60" src="img/second_test_images/image63.png">
		    <img width="60" src="img/second_test_images/image64.png">
		</td>
		<td class="answer">
		  <select name="question2"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer7"].'" selected>'.$_SESSION["answer"]["answer7"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題08</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image65.png">
		    <img width="60" src="img/second_test_images/image66.png">
		    <img width="60" src="img/second_test_images/image65.png">
		    <img width="60" src="img/second_test_images/image66.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image67.png">
		    <img width="60" src="img/second_test_images/image66.png">
		    <img width="60" src="img/second_test_images/image68.png">
		    <img width="60" src="img/second_test_images/image69.png">
		    <img width="60" src="img/second_test_images/image65.png">
		</td>
		<td class="answer">
		  <select name="question3"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer8"].'" selected>'.$_SESSION["answer"]["answer8"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題09</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image70.png">
		  <img width="60" src="img/second_test_images/image71.png">
		  <img width="60" src="img/second_test_images/image73.png">
		  <img width="60" src="img/second_test_images/image72.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image74.png">
		  <img width="60" src="img/second_test_images/image75.png">
		  <img width="60" src="img/second_test_images/image76.png">
		  <img width="60" src="img/second_test_images/image77.png">
		  <img width="60" src="img/second_test_images/image78.png">
		</td>
		<td class="answer">
		  <select name="question4"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer9"].'" selected>'.$_SESSION["answer"]["answer9"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題10</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image79.png">
		  <img width="60" src="img/second_test_images/image80.png">
		  <img width="60" src="img/second_test_images/image81.png">
		  <img width="60" src="img/second_test_images/image82.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image79.png">
		  <img width="60" src="img/second_test_images/image82.png">
		  <img width="60" src="img/second_test_images/image80.png">
		  <img width="60" src="img/second_test_images/image81.png">
		  <img width="60" src="img/second_test_images/image82.png">
		</td>
		<td class="answer">
		  <select name="question5"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer10"].'" selected>'.$_SESSION["answer"]["answer10"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	    </table>
	  </div>
	</div>
      <p>第２部　問題数３０問、制限時間は１５分です。</p>
      <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
      <p>「戻る」ボタンで前ページに戻ります。</p>
      <div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 3){
    $html = '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	<h3>【第２部】 本題　　問題11～15</h3>
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
		<td class="number">問題11</td>	
		<td class="">
		    <img width="60" src="img/second_test_images/image83.png">
		    <img width="60" src="img/second_test_images/image84.png">
		    <img width="60" src="img/second_test_images/image85.png">
		    <img width="60" src="img/second_test_images/image86.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image83.png">
		    <img width="60" src="img/second_test_images/image87.png">
		    <img width="60" src="img/second_test_images/image88.png">
		    <img width="60" src="img/second_test_images/image89.png">
		    <img width="60" src="img/second_test_images/image90.png">
		</td>
		<td class="answer">
		  <select name="question1"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer11"].'" selected>'.$_SESSION["answer"]["answer11"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題12</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image91.png">
		    <img width="60" src="img/second_test_images/image92.png">
		    <img width="60" src="img/second_test_images/image93.png">
		    <img width="60" src="img/second_test_images/image94.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image97.png">
		    <img width="60" src="img/second_test_images/image93.png">
		    <img width="60" src="img/second_test_images/image95.png">
		    <img width="60" src="img/second_test_images/image96.png">
		    <img width="60" src="img/second_test_images/image91.png">
		</td>
		<td class="answer">
		  <select name="question2"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer12"].'" selected>'.$_SESSION["answer"]["answer12"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題13</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image98.png">
		    <img width="60" src="img/second_test_images/image99.png">
		    <img width="60" src="img/second_test_images/image100.png">
		    <img width="60" src="img/second_test_images/image99.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image101.png">
		    <img width="60" src="img/second_test_images/image102.png">
		    <img width="60" src="img/second_test_images/image103.png">
		    <img width="60" src="img/second_test_images/image98.png">
		    <img width="60" src="img/second_test_images/image104.png">
		</td>
		<td class="answer">
		  <select name="question3"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer13"].'" selected>'.$_SESSION["answer"]["answer13"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題14</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image105.png">
		  <img width="60" src="img/second_test_images/image106.png">
		  <img width="60" src="img/second_test_images/image107.png">
		  <img width="60" src="img/second_test_images/image108.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image105.png">
		  <img width="60" src="img/second_test_images/image107.png">
		  <img width="60" src="img/second_test_images/image109.png">
		  <img width="60" src="img/second_test_images/image110.png">
		  <img width="60" src="img/second_test_images/image106.png">
		</td>
		<td class="answer">
		  <select name="question4"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer14"].'" selected>'.$_SESSION["answer"]["answer14"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題15</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image111.png">
		  <img width="60" src="img/second_test_images/image112.png">
		  <img width="60" src="img/second_test_images/image113.png">
		  <img width="60" src="img/second_test_images/image114.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image115.png">
		  <img width="60" src="img/second_test_images/image116.png">
		  <img width="60" src="img/second_test_images/image117.png">
		  <img width="60" src="img/second_test_images/image118.png">
		  <img width="60" src="img/second_test_images/image119.png">
		</td>
		<td class="answer">
		  <select name="question5"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer15"].'" selected>'.$_SESSION["answer"]["answer15"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	    </table>
	  </div>
	</div>
      <p>第２部　問題数３０問、制限時間は１５分です。</p>
      <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
      <p>「戻る」ボタンで前ページに戻ります。</p>
      <div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 4){
    $html = '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	<h3>【第２部】 本題　　問題16～20</h3>
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
		<td class="number">問題16</td>	
		<td class="">
		    <img width="60" src="img/second_test_images/image120.png">
		    <img width="60" src="img/second_test_images/image121.png">
		    <img width="60" src="img/second_test_images/image122.png">
		    <img width="60" src="img/second_test_images/image123.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image124.png">
		    <img width="60" src="img/second_test_images/image125.png">
		    <img width="60" src="img/second_test_images/image126.png">
		    <img width="60" src="img/second_test_images/image127.png">
		    <img width="60" src="img/second_test_images/image128.png">
		</td>
		<td class="answer">
		  <select name="question1"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer16"].'" selected>'.$_SESSION["answer"]["answer16"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題17</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image129.png">
		    <img width="60" src="img/second_test_images/image130.png">
		    <img width="60" src="img/second_test_images/image131.png">
		    <img width="60" src="img/second_test_images/image132.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image133.png">
		    <img width="60" src="img/second_test_images/image134.png">
		    <img width="60" src="img/second_test_images/image135.png">
		    <img width="60" src="img/second_test_images/image136.png">
		    <img width="60" src="img/second_test_images/image132.png">
		</td>
		<td class="answer">
		  <select name="question2"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer17"].'" selected>'.$_SESSION["answer"]["answer17"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題18</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image137.png">
		    <img width="60" src="img/second_test_images/image128.png">
		    <img width="60" src="img/second_test_images/image140.png">
		    <img width="60" src="img/second_test_images/image127.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image138.png">
		    <img width="60" src="img/second_test_images/image128.png">
		    <img width="60" src="img/second_test_images/image139.png">
		    <img width="60" src="img/second_test_images/image141.png">
		    <img width="60" src="img/second_test_images/image125.png">
		</td>
		<td class="answer">
		  <select name="question3"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer18"].'" selected>'.$_SESSION["answer"]["answer18"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題19</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image142.png">
		  <img width="60" src="img/second_test_images/image143.png">
		  <img width="60" src="img/second_test_images/image144.png">
		  <img width="60" src="img/second_test_images/image145.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image146.png">
		  <img width="60" src="img/second_test_images/image147.png">
		  <img width="60" src="img/second_test_images/image148.png">
		  <img width="60" src="img/second_test_images/image149.png">
		  <img width="60" src="img/second_test_images/image150.png">
		</td>
		<td class="answer">
		  <select name="question4"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer19"].'" selected>'.$_SESSION["answer"]["answer19"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題20</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image151.png">
		  <img width="60" src="img/second_test_images/image152.png">
		  <img width="60" src="img/second_test_images/image153.png">
		  <img width="60" src="img/second_test_images/image154.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image155.png">
		  <img width="60" src="img/second_test_images/image156.png">
		  <img width="60" src="img/second_test_images/image157.png">
		  <img width="60" src="img/second_test_images/image158.png">
		  <img width="60" src="img/second_test_images/image159.png">
		</td>
		<td class="answer">
		  <select name="question5"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer20"].'" selected>'.$_SESSION["answer"]["answer20"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	    </table>
	  </div>
	</div>
      <p>第２部　問題数３０問、制限時間は１５分です。</p>
      <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
      <p>「戻る」ボタンで前ページに戻ります。</p>
      <div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 5){
    $html = '<form id="test_form" name="test_form" action="test_api.php" method="post">
	<input type="hidden" name="testNumber" value="first_1">
	<h3>【第２部】 本題　　問題21～25</h3>
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
		<td class="number">問題21</td>	
		<td class="">
		    <img width="60" src="img/second_test_images/image160.png">
		    <img width="60" src="img/second_test_images/image161.png">
		    <img width="60" src="img/second_test_images/image162.png">
		    <img width="60" src="img/second_test_images/image163.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image164.png">
		    <img width="60" src="img/second_test_images/image165.png">
		    <img width="60" src="img/second_test_images/image166.png">
		    <img width="60" src="img/second_test_images/image167.png">
		    <img width="60" src="img/second_test_images/image168.png">
		</td>
		<td class="answer">
		  <select name="question1"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer21"].'" selected>'.$_SESSION["answer"]["answer21"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題22</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image169.png">
		    <img width="60" src="img/second_test_images/image170.png">
		    <img width="60" src="img/second_test_images/image171.png">
		    <img width="60" src="img/second_test_images/image172.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image173.png">
		    <img width="60" src="img/second_test_images/image174.png">
		    <img width="60" src="img/second_test_images/image175.png">
		    <img width="60" src="img/second_test_images/image176.png">
		    <img width="60" src="img/second_test_images/image177.png">
		</td>
		<td class="answer">
		  <select name="question2"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer22"].'" selected>'.$_SESSION["answer"]["answer22"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題23</td>	
		<td class="questionSpacing">
		    <img width="60" src="img/second_test_images/image178.png">
		    <img width="60" src="img/second_test_images/image179.png">
		    <img width="60" src="img/second_test_images/image180.png">
		    <img width="60" src="img/second_test_images/image181.png">
		</td>
		<td class="resultSpacing">
		    <img width="60" src="img/second_test_images/image180.png">
		    <img width="60" src="img/second_test_images/image182.png">
		    <img width="60" src="img/second_test_images/image183.png">
		    <img width="60" src="img/second_test_images/image184.png">
		    <img width="60" src="img/second_test_images/image185.png">
		</td>
		<td class="answer">
		  <select name="question3"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer23"].'" selected>'.$_SESSION["answer"]["answer23"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題24</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image186.png">
		  <img width="60" src="img/second_test_images/image187.png">
		  <img width="60" src="img/second_test_images/image188.png">
		  <img width="60" src="img/second_test_images/image189.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image190.png">
		  <img width="60" src="img/second_test_images/image191.png">
		  <img width="60" src="img/second_test_images/image192.png">
		  <img width="60" src="img/second_test_images/image193.png">
		  <img width="60" src="img/second_test_images/image194.png">
		</td>
		<td class="answer">
		  <select name="question4"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer24"].'" selected>'.$_SESSION["answer"]["answer24"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	      <tr>
		<td class="number">問題25</td>	
		<td class="questionSpacing">
		  <img width="60" src="img/second_test_images/image195.png">
		  <img width="60" src="img/second_test_images/image196.png">
		  <img width="60" src="img/second_test_images/image197.png">
		  <img width="60" src="img/second_test_images/image198.png">
		</td>
		<td class="resultSpacing">
		  <img width="60" src="img/second_test_images/image199.png">
		  <img width="60" src="img/second_test_images/image200.png">
		  <img width="60" src="img/second_test_images/image201.png">
		  <img width="60" src="img/second_test_images/image202.png">
		  <img width="60" src="img/second_test_images/image203.png">
		</td>
		<td class="answer">
		  <select name="question5"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer25"].'" selected>'.$_SESSION["answer"]["answer25"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>
	      </tr>
	    </table>
	  </div>
	</div>
      <p>第２部　問題数３０問、制限時間は１５分です。</p>
      <p>「次へ」ボタンを押して、次ページへ進んでください。　（次ページから当ページに戻ることもできます。）</p>
      <p>「戻る」ボタンで前ページに戻ります。</p>
      <div class="transitionButton">
	  <button id="backTestPage" name="back" class="button" >戻る</button>
	  <button id="nextTestPage" name="next" class="button" >次へ</button>
	</div>
      </form>
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
  else if($_SESSION["testIndex"] === 6){
    $html = '<form id="test_form" name="test_form" action="test_api.php" method="post">
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
		    <option value="'.$_SESSION["answer"]["answer26"].'" selected>'.$_SESSION["answer"]["answer26"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
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
		    <option value="'.$_SESSION["answer"]["answer27"].'" selected>'.$_SESSION["answer"]["answer27"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
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
		    <option value="'.$_SESSION["answer"]["answer28"].'" selected>'.$_SESSION["answer"]["answer28"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
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
		    <option value="'.$_SESSION["answer"]["answer29"].'" selected>'.$_SESSION["answer"]["answer29"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
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
		    <option value="'.$_SESSION["answer"]["answer30"].'" selected>'.$_SESSION["answer"]["answer30"].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
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
      </script>';
  }
}
else if($_SESSION["testSection"] === 3){
  if($_SESSION["testIndex"] === 1){
    $html = "<div>３部1ページ</div>";
  }
  else if($_SESSION["testIndex"] === 2){
    $html = "<div>2</div>";
  }
  else if($_SESSION["testIndex"] === 3){
    $html = "<div>3</div>";
  }
  else if($_SESSION["testIndex"] === 4){
    $html = "<div>4</div>";
  }
  else if($_SESSION["testIndex"] === 5){
    $html = "<div>5</div>";
  }
  else if($_SESSION["testIndex"] === 6){
    $html = "<div>6</div>";
  }
}

echo $html;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

