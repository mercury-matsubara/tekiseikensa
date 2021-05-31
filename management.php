<?php
    //セッション開始
    session_start();

    // DB基本情報格納.iniファイル
    $db_ini_array = parse_ini_file("db.ini",true);															

    // DBサーバーホスト
    $host = $db_ini_array["database"]["host"];
    // DBサーバーユーザー
    $user = $db_ini_array["database"]["user"];
    // DBサーバーパスワード
    $password = $db_ini_array["database"]["userpass"];
    // DB名
    $database = $db_ini_array["database"]["database"];

    try	
    {
        $con = new PDO("mysql:host=$host;dbname=$database;charset=utf8;",$user,$password,
        array(PDO::ATTR_EMULATE_PREPARES => false));
    }
    catch(PDOException $e)
    {
        exit('データベース接続失敗。'.$e->getMessage());
    }
    
    //検索フォームデータをセッション変数に格納する
    if(isset($_POST['search'])){
        $_SESSION['search_year'] = $_POST['year'];
        $_SESSION['search_id'] = $_POST['userid'];
        $_SESSION['search_kanji'] = $_POST['namekan'];
        $_SESSION['search_kana'] = $_POST['namekana'];
        $_SESSION['search_register'] = $_POST['registrationdate'];
        $_SESSION['search_testdate'] = $_POST['testdate'];
    }
    
    //受検者情報表示
    function hyozi($con){
        $sql = "SELECT * FROM user";
        
        if(isset($_POST['search']))
        {
            $hantei = 0;

            //yaerの入力判定
            if($_POST['year'] != "")
            {        
                $sql .= " where recruit_year = '".$_POST['year']."'";
                $hantei = 1;
            }

            //idの入力判定
            if($_POST['userid'] != "")
            {
                if($hantei == 1)
                {
                    $sql .= " AND ID = '".$_POST['userid']."'";
                }
                else
                {
                    $sql .= " where ID = '".$_POST['userid']."'";
                }

                $hantei = 1;
            }

            //namekanの入力判定
            if($_POST['namekan'] != "")
            {
                if($hantei == 1)
                {
                    $sql .= " AND name_kanji = '".$_POST['namekan']."'";
                }
                else
                {
                    $sql .= " where name_kanji = '".$_POST['namekan']."'";
                }
                $hantei = 1;
            }
   
            //namekanaの入力判定
            if($_POST['namekana'] != "")
            {     
                if($hantei == 1)
                {
                    $sql .= " AND name_kana = '".$_POST['namekana']."'";
                }
                else
                {
                    $sql .= " where name_kana = '".$_POST['namekana']."'";
                }
                $hantei = 1;
            }
 
            //registrationdateの入力判定
            if($_POST['registrationdate'] != "")
            {        
                if($hantei == 1)
                {
                    $sql .= " AND register_day = '".$_POST['registrationdate']."'"; 
                }
                else
                {
                    $sql .= " where register_day = '".$_POST['registrationdate']."'";
                }
                $hantei = 1;
            }

            //testdateの入力判定
            if($_POST['testdate'] != "")
            {
                if($hantei == 1)
                {
                    $sql .= " AND test_day = '".$_POST['testdate']."'";
                }
                else
                {
                    $sql .= " where test_day = '".$_POST['testdate']."'";
                }
            }           
        }
        $sql .= ";";
        
        $stmt = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['stmt'] = $stmt;

        //1ページの表示数 
        define('MAX', '10');

        //データ件数
        $hyozinum = count($stmt);

        if($hyozinum > 0)
        {
            //トータルページ数
            $max_page = ceil($hyozinum / MAX);

            if(!isset($_GET['page_id']))
            { // $_GET['page_id'] はURLに渡された現在のページ数
                $now = 1; // 設定されてない場合は1ページ目にする
            }
            else
            {
                $now = $_GET['page_id'];
            }

            $start_no = ($now - 1) * MAX; // 配列の何番目から取得すればよいか

            $disp_data = array_slice($stmt, $start_no, MAX, true);
            $_SESSION['data'] = $disp_data;

            foreach($disp_data as $val)
            {
                $html = '<form action="management.php" method="post">';
                $html .='<tr>';
                $html .='<td class ="henkou"><input type="text"  required="required" name = "ichiranuserid" class = "output"size ="10" value ="'.$val['ID'].'" onchange=change()></td>';
                $html .='<td class ="henkou"><input type="text" pattern=".{1,20}" title="20文字以内で入力してください" name = "ichirannamekan" class = "output" size ="15"value ="'.$val['name_kanji'].'" onchange=change()></td>';
                $html .='<td class ="henkou"><input type="text" pattern=".{1,20}" title="20文字以内で入力してください" name = "ichirannamekana" class = "output" size ="15" value ="'.$val['name_kana'].'" onchange=change()></td>';
                $html .='<td>'.$val['password'].'</td>';
                $html .='<td class ="henkou"><input type="text" name = "ichiranyear" class = "output" size ="10" value ="'.$val['recruit_year'].'" onchange=change()></td>';

                $html .='<td class ="henkou"><input type="date" name = "ichiranregistrationdate" class = "output" size ="8" value ="'.$val['register_day'].'" onchange=change()></td>';
                $html .='<td class ="henkou"><input type="date" name = "ichirantestdate" class = "output" size ="8" value ="'.$val['test_day'].'" onchange=change()></td>';
                $html .='<td class ="henkou"><input type="text" name = "ichirangloup" class = "output" size ="8" value ="'.$val['stat'].'" onchange=change()></td>';
                $html .='<td>'.$val['sum_score'].'</td>';
                $html .='<td>'.$val['rank_score'].'</td>';
                $html .='<td><input type="submit" name = "hensyu" class ="ichiranhensyubutton" size ="8" value="編集"></td>';
                $html .='<td><input type="submit" name = "sakuzyo" class ="ichiranhensyubutton" size ="8" value="削除"><input type="hidden" value ="'.$val['userNumber'].'" name ="ichirannum"></td>';
                $html .='</tr>';
                $html .='</form>';
                echo $html;
            }
            $html .= "</table>";

            //件数の表示
            if($now != $max_page)
            {
                echo '<table><tr><td>'.$hyozinum.'件中'.($start_no + 1).'～'.($start_no + MAX).'件表示<td>';
            }
            else
            {
                echo '<table><tr><td>'.$hyozinum.'件中'.($start_no + 1).'～'.$hyozinum.'件表示<td>';
            }

            if($now != 1)
            {
                echo '<td width = 50px><a href="management.php?page_id=1")>先頭へ</a></td>';
                echo '<td width = 50px><a href="management.php?page_id='. ($now - 1). '")>前へ</a></td>';
            }
            else
            {
                echo '<td>　　　</td>';
                echo '<td>　　</td>';
            }

            for($i = 1; $i <= $max_page; $i++)
            {
                if ($i == $now)
                { // 現在表示中のページ数の場合はリンクを貼らない
                    $pagebotan = '<td width = 25px>'.$now.'</td>';
                    echo $pagebotan;
                }
                else
                {
                    $pagebotan = '<td width = 25px><a href="management.php?page_id='. $i. '")>'. $i. '</a>'. '　</td>';
                    echo $pagebotan;
                }
            }

            if($now != $max_page)
            {
                echo '<td width = 50px><a href="management.php?page_id='. ($now + 1). '")>次へ</a></td>';
                echo '<td width = 50px><a href="management.php?page_id='.$max_page. '")>最後へ</a></td>';
            }
            else
            {
                echo '<td>　　</td>';
                echo '<td>　　　</td>';
            }
        }
        else
        {
            echo "</table>";
            echo "<script>alert('検索結果が見つかりません');</script>";
        }
        return $stmt;
    }
    
    //新規登録
    if(isset($_POST['new'])){
        //受検者IDが未入力の時
        if($_POST['userid'] == "")
        {
            $nyuryokumsg = "※受検者IDが未入力です。";
            $newyear = "";
            $newid = "";
            $newnamekan = "";
            $newnamekana = "";
            $newpass = "";
        }
        else if(mb_strlen($_POST['userid']) > 20)
        {
            $nyuryokumsg = "※受検者IDは20文字以内で入力してください";
            $newyear = "";
            $newid = "";
            $newnamekan = "";
            $newnamekana = "";
            $newpass = "";
        }
        else if(mb_strlen($_POST['namekan']) > 20)
        {
            $nyuryokumsg = "※氏名(漢字)は20文字以内で入力してください";
            $newyear = "";
            $newid = "";
            $newnamekan = "";
            $newnamekana = "";
            $newpass = "";
        }
        else if(mb_strlen($_POST['namekana']) > 20)
        {
            $nyuryokumsg = "※氏名(カナ)は20文字以内で入力してください";
            $newyear = "";
            $newid = "";
            $newnamekan = "";
            $newnamekana = "";
            $newpass = "";
        }
        else
        {
            if($_POST['year'] == "")
            {
                $newyear = "0";
            }
            else
            {
                $newyear = $_POST['year'];
            }
            if($_POST['namekan'] == "")
            {
                $newnamekan = "";
            }
            else
            {
                $newnamekan = $_POST['namekan'];
            }
            if($_POST['namekana'] == "")
            {
                $newnamekana = "";
            }
            else
            {
                $newnamekana = $_POST['namekana'];
            }
            $sql = "select * from user where ID = '".$_POST['userid']."'; ";
            																							
            $rownums = 0;	
            
            $result = $con->query($sql);											// クエリ発行
            $rownums = $result->rowCount();
            
            if($rownums != 0)
            {
                $nyuryokumsg = "受検者IDが重複しています";
                $newyear = "";
                $newid = "";
                $newnamekan = "";
                $newnamekana = "";
                $newpass = "";
            }
            else
            {
                //正常値なので空白を表示する
                $nyuryokumsg = "";
                $newid = $_POST['userid'];
                $newregistrationdate = date('Y/m/d');

                $newstat = 0;
                
                //パスワードの生成
                $pw = str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz');
                $newpass = substr(str_shuffle($pw), 0, 8);

                $new = "insert into user(recruit_year, ID, name_kanji, name_kana, password, register_day, stat)
                        values('".$newyear."', '".$newid."', '".$newnamekan."', '".$newnamekana."', '".$newpass."','".$newregistrationdate."','".$newstat."')";

                $stmt = $con->query($new)->fetchAll(PDO::FETCH_ASSOC);
                
                //テーブルanswerにuseridを登録する
                $log = "insert into answer(ID) values('".$_POST['userid']."')";               
                $answer = $con->query($log);
            }
        }
    }
    
    //編集
    if(isset($_POST['hensyu']))
    {
        //受検者IDが未入力の時
        if($_POST['ichiranuserid'] == "")
        {
            echo "<script>alert('受検者IDが空白です');</script>";
        }
        else
        {
            $sql = "select * from user where ID = '".$_POST['ichiranuserid']."'; ";
            $henko = "select * from user where userNumber = '".$_POST['ichirannum']."'; ";																							
            $rownums = 0;	
            $result = $con->query($sql);											// クエリ発行
            $h_result = $con->query($henko);
            $rownums = $result->rowCount();
            $List = $result->fetch(PDO::FETCH_ASSOC);
            $h_list = $h_result->fetch(PDO::FETCH_ASSOC);
            
            if($rownums == 0 || $_POST['ichiranuserid'] == $h_list['ID'])
            {
                //値を受け取る
                if($_POST['ichirannamekan'] == "")
                {
                    $cnamekan = "";
                }
                else
                {
                    $cnamekan = $_POST['ichirannamekan'];
                }
                if($_POST['ichirannamekana'] == "")
                {
                    $cnamekana = "";
                }
                else
                {
                    $cnamekana = $_POST['ichirannamekana'];
                }
                if($_POST['ichiranyear'] == "")
                {
                    $cyear = "0";
                }
                else
                {
                    $cyear = $_POST['ichiranyear'];
                }

                if($_POST['ichiranregistrationdate'] == "")
                {
                    $cregistrationdate = NULL;
                }
                else
                {
                    $cregistrationdate = $_POST['ichiranregistrationdate'];
                }
                
                $cuserid = $_POST['ichiranuserid'];
                $ctestdate = $_POST['ichirantestdate'];
                
                $cnum = $_POST['ichirannum'];

                //受検区分が1または0なら編集を行う、そうでない場合はメッセージを表示
                if($_POST['ichirangloup'] == 1 || $_POST['ichirangloup'] == 0)
                {
                    $cgloup = $_POST['ichirangloup'];
               
                    //受検日が入力されていない場合
                    if($ctestdate == "")
                    {
                        $change = "update user set ID = :id, name_kanji = :namekan, name_kana = :namekana, 
                             recruit_year = :year, register_day = :registrationdate, stat = :gloup, test_day = NULL
                             where userNumber = '".$cnum."';";

                        $csql = $con->prepare($change);
                        $con ->beginTransaction();

                        $csql ->bindParam(':id', $cuserid);
                        $csql ->bindParam(':namekan', $cnamekan);
                        $csql ->bindParam(':namekana', $cnamekana);
                        $csql ->bindParam(':year', $cyear);
                        $csql ->bindParam(':registrationdate',$cregistrationdate);
                        $csql ->bindParam(':gloup', $cgloup);
                        $csql ->execute();
                        $con->commit();
                        echo "<script>alert('データを編集しました');</script>";
                    }
                    else
                    {       
                        $change = "update user set ID = :id, name_kanji = :namekan, name_kana = :namekana, 
                             recruit_year = :year, test_day = :testdate, register_day = :registrationdate, stat = :gloup
                             where userNumber = '".$cnum."';";

                        $csql = $con->prepare($change);
                        $con ->beginTransaction();

                        $csql ->bindParam(':id', $cuserid);
                        $csql ->bindParam(':namekan', $cnamekan);
                        $csql ->bindParam(':namekana', $cnamekana);
                        $csql ->bindParam(':year', $cyear);
                        $csql ->bindParam(':registrationdate',$cregistrationdate);
                        $csql ->bindParam(':testdate', $ctestdate);
                        $csql ->bindParam(':gloup', $cgloup);
                        $csql ->execute();
                        $con->commit();
                        echo "<script>alert('データを編集しました');</script>";
                    }
                }
                else
                {
                    echo "<script>alert('受検区分は0か1を入力してください');</script>";
                }
            }
            else
            {
                echo "<script>alert('受検者IDが重複しています');</script>";
            }
        }
    }
    
    //削除
    if(isset($_POST['sakuzyo']))
    {
        echo "<script>alert('データを削除しました');</script>";
        
        $dnum = $_POST['ichirannum'];
        
        $delete = "delete from user where userNumber = '".$dnum."'";
        
        $dsql = $con -> query($delete);
        
    }

    //CSVの出力
    if(isset($_POST['output']))
    {   
        //出力情報の設定
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=受験者情報.csv");
        header("Content-Transfer-Encoding: binary");
        
        //変数の初期化
        $csv = null;
        
        $csv = '"受検者ID","氏名","氏名(カナ)","パスワード","採用年度","登録日","受検日","受検区分","評価ランク","総合得点","第1部正答数","第1部誤答数","第2部正答数","第2部誤答数","第3部正答数","第3部誤答数"';
        $csv .= ',"第1部問1","第1部問2","第1部問3","第1部問4","第1部問5","第1部問6","第1部問7","第1部問8","第1部問9","第1部問10"';
        $csv .= ',"第1部問11","第1部問12","第1部問13","第1部問14","第1部問15","第1部問16","第1部問17","第1部問18","第1部問19","第1部問20"';
        $csv .= ',"第1部問21","第1部問22","第1部問23","第1部問24","第1部問25","第1部問26","第1部問27","第1部問28","第1部問29","第1部問30"';
        $csv .= ',"第1部問31","第1部問32","第1部問33","第1部問34","第1部問35","第1部問36","第1部問37","第1部問38","第1部問39","第1部問40"';
        $csv .= ',"第2部問1","第2部問2","第2部問3","第2部問4","第2部問5","第2部問6","第2部問7","第2部問8","第2部問9","第2部問10"';
        $csv .= ',"第2部問11","第2部問12","第2部問13","第2部問14","第2部問15","第2部問16","第2部問17","第2部問18","第2部問19","第2部問20"';
        $csv .= ',"第2部問21","第2部問22","第2部問23","第2部問24","第2部問25","第2部問26","第2部問27","第2部問28","第2部問29","第2部問30"';
        $csv .= ',"第3部問1","第3部問2","第3部問3","第3部問4","第3部問5","第3部問6","第3部問7","第3部問8","第3部問9","第3部問10"';
        $csv .= ',"第3部問11","第3部問12","第3部問13","第3部問14","第3部問15","第3部問16","第3部問17","第3部問18","第3部問19","第3部問20"';
        $csv .= "\r\n";
        
        $array = $_SESSION['stmt'];
        
        $x = 0;
        foreach ($array as $user)
        {
            $csvid[$x] = $user['ID'];
            $x++;
        }
        // CSVファイル出力
        $i = 0;
        foreach ($array as $value)
        {
            $sql = "SELECT * FROM answer where ID = '".$csvid[$i]."';";
            $stmt = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  
            $csv .= $value['ID'];
            $csv .= ',';
            $csv .= $value['name_kanji'];
            $csv .= ',';
            $csv .= $value['name_kana'];
            $csv .= ',';
            $csv .= $value['password'];
            $csv .= ',';
            $csv .= $value['recruit_year'];
            $csv .= ',';
            $csv .= $value['register_day'];
            $csv .= ',';
            $csv .= $value['test_day'];
            $csv .= ',';
            $csv .= $value['stat'];
            $csv .= ',';
            $csv .= $value['rank_score'];
            $csv .= ',';
            $csv .= $value['sum_score'];
            $csv .= ',';
            $csv .= $value['first_correct'];
            $csv .= ',';
            $csv .= $value['first_wrong'];
            $csv .= ',';
            $csv .= $value['second_correct'];
            $csv .= ',';
            $csv .= $value['second_wrong'];
            $csv .= ',';
            $csv .= $value['third_correct'];
            $csv .= ',';
            $csv .= $value['third_wrong'];
            $csv .= ',';
            
            //useridがマーキュリーならば解答情報は入力せず、改行する
            if($csvid[$i] == "mercury")
            {
                $csv .= "\r\n";
            }
            else
            {
                //第一部解答
                for($f=1;$f<=40;$f++)
                {
                    $csv .= $stmt[0]['first_answer_'.$f];
                    $csv .= ',';
                }
                //第二部解答
                for($f=1;$f<=30;$f++)
                {
                    $csv .= $stmt[0]['second_answer_'.$f];
                    $csv .= ',';
                }
                //第三部解答
                for($f=1;$f<=20;$f++)
                {
                    $csv .= $stmt[0]['third_answer_'.$f];
                    $csv .= ',';
                }
                $csv .= "\r\n";
            }
            $i++;
        }
        $csv = mb_convert_encoding($csv, "SJIS");
        echo $csv;
        return;
    }
    
    //クリアボタンクリックしたとき
    if(isset($_POST['clear']))
    {
        $sql = "SELECT * FROM user;";
        $stmt = $con->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        $_SESSION['stmt'] = $stmt;
    }
?> 
<html>
    <head>
        <link rel="shortcut icon" href="./img/favicon.ico">
        <title>管理画面 - 適性検査 | MercurySoft</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link href="management.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react-dom.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
        <script type ="text/javascript" src="hensyuhantei.js"></script>
    </head>
    <body>
        <img src= "img/mercury_soft_logo&mark_basic_02.png" class = "logo">
        <hr>
        <CENTER>
            <form action="management.php" method="post" autocomplete=off>
                <table class = "manage">
                    <tr>
                        <td class = "managetitle">管理画面</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align = "right">
                            <input type='button' name='end' class='managebutton' value = '終了' style="WIDTH: 100px; HEIGHT: 30px" onclick="changeend();">
                        </td>
                    </tr>
                    <tr>
                        <td>採用年度</td>
                        <td>
                            <input type='text' name='year' class='register' style="WIDTH: 100px; HEIGHT: 30px" 
                                   value = "<?php  if(isset($_POST['new'])){echo $newyear;}elseif(isset($_POST['search'])){echo $_SESSION['search_year'];} ?>" list="yearlist">
                            <datalist id="yearlist">
                                <?php
                                    //入力候補の表示
                                    $yearsql = "select *from user ";
                                    $yearstmt = $con->query($yearsql)->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    $j = 0;
                                    foreach ($yearstmt as $yearst)
                                    {
                                        $yearlist[$j] = $yearst['recruit_year'];
                                        $j++;
                                    }
                                    //重複している配列データを削除する
                                    $tyohuku = array_unique($yearlist);
                                    
                                    sort( $tyohuku, SORT_DESC ) ;
                                    
                                    $year = "";
                                    
                                    for($k=0;$k<$j;$k++)
                                    {
                                        if(isset($tyohuku[$k]))
                                        {
                                            $year .= '<option value="'.$tyohuku[$k].'">';
                                        }
                                    }
                                    echo $year;
                                ?>
                            </datalist>
                            年卒
                        </td>
                        <td></td>
                        <td align='right'>
                            <input type='submit' name='new' class='managebutton' value = '新規登録' style="WIDTH: 100px; HEIGHT: 30px">
                        </td>
                        <td>
                            <font color='red'>
                                <span><?php if(isset($_POST['new'])){ echo $nyuryokumsg; } ?></span>
                            <font>
                        </td>
                    </tr>
                    <tr>
                        <td>受検者ID</td>
                        <td colspan="4">
                            <input type='tel' name='userid' class='register' style="WIDTH: 300px; HEIGHT: 30px" 
                                   value = "<?php  if(isset($_POST['new'])){echo $newid;} elseif(isset($_POST['search'])){echo $_SESSION['search_id'];}?>">
                            発行パスワード
                            <input type='text' name='pass' class='register' style="WIDTH: 150px; HEIGHT: 30px" disabled=""
                                   value = "<?php  if(isset($_POST['new'])){echo $newpass;} ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>氏名（漢字）</td>
                        <td colspan="4">
                            <input type='text' name='namekan' class='register' style="WIDTH: 300px; HEIGHT: 30px"
                                    value = "<?php  if(isset($_POST['new'])){echo $newnamekan;} elseif(isset($_POST['search'])){echo $_SESSION['search_kanji'];}?>">
                        </td>
                    </tr>
                    <tr>
                        <td>氏名（カナ）</td>
                        <td colspan="2">
                            <input type='text' name='namekana' class='register' style="WIDTH: 300px; HEIGHT: 30px"
                                   value = "<?php  if(isset($_POST['new'])){echo $newnamekana;}elseif(isset($_POST['search'])){echo $_SESSION['search_kana'];}?>">
                        </td>
                        <td>
                            登録日
                            <input type='date' name='registrationdate' class='register' style="WIDTH: 150px; HEIGHT: 30px"
                                   value = "<?php   if(isset($_POST['search'])){echo $_SESSION['search_register'];}?>">
                            受検日
                            <input type='date' name='testdate' class='register' style="WIDTH: 150px; HEIGHT: 30px"
                                   value = "<?php   if(isset($_POST['search'])){echo $_SESSION['search_testdate'];}?>">
                        </td>
                        <td>
                            <input type='submit' name='search' class='managebutton' value = '検索' style="WIDTH: 100px; HEIGHT: 30px">
                            <input type ='submit' name='clear' class='managebutton' value='クリア' style="WIDTH: 100px; HEIGHT: 30px">
                            <input type='submit' name='output' class='managebutton' value = '出力' style="WIDTH: 100px; HEIGHT: 30px">                           
                        </td>
                    </tr>
                </table>
                <hr>
                <div id = "zyouhou">
                    <table class = "list" border = "1">
                        <tr>
                            <td width = "100">受検者ID</td>
                            <td width = "150">氏名</td>
                            <td width = "150">氏名(カナ)</td>
                            <td width = "100">パスワード</td>
                            <td width = "100">採用年度</td>
                            <td width = "100">登録日</td>
                            <td width = "100">受検日</td>
                            <td width = "80">受検区分</td>
                            <td width = "80">評価ランク</td>
                            <td width = "80">総合得点</td>
                            <td width = "80" class ="hensyu">編集</td>
                            <td width = "80" class ="hensyu">削除</td>
                        </tr> 
                            <?php $stmt = hyozi($con); ?>
                </div>
            </form>
        </CENTER>
    </body>
</html>
