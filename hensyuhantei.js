window.onload = management();

function management(){
    sessionStorage.setItem('change', '0');
}

function change(){
    sessionStorage['change'] = "1";
}

function changeend(){
    var end;
    end = sessionStorage.getItem('change');
    if(end == "1"){
        var result = window.confirm('編集中です。閉じると保存されません。');
        if(result){
            sessionStorage['change'] = "0";
            window.location.href = "login.php";
        }
    } 
    else if(end == "0"){
        window.location.href = "login.php";
    }
}