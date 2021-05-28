<?php
    $html .=
        '<td class="answer">
		  <select name="question'.$mondaisu.'"  class="resultSelect">
		    <option value="'.$_SESSION["answer"]["answer".$mondainumber].'" selected>'.$_SESSION["answer"]["answer".$mondainumber].'</option>
		      
		    <option value="A">A</option>
		    <option value="B">B</option>
		    <option value="C">C</option>
		    <option value="D">D</option>
		    <option value="E">E</option>
		 </select>
		</td>';
?>
