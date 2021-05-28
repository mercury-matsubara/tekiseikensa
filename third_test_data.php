<?php
    $html .=
        '<td class="answer" width="5%">
	  <select name="question'.$mondaisu.'"  class="resultSelect">
	    <option value="'.$_SESSION["answer"]["answer".$mondainumber].'" selected>'.$_SESSION["answer"]["answer".$mondainumber].'</option>
	    <option value="1">1</option>
	    <option value="2">2</option>
	    <option value="3">3</option>
	    <option value="4">4</option>
	  </select>
	</td>';
?>
