let interval_id;

function timerStart(time){
    //時間をWebストレージに保存
    //問題各部が終わるタイミングでtimeを破棄しないといけないです
    if(!sessionStorage.getItem('time')){
        sessionStorage.setItem('time', time);
    }

    let min = 0;
    let sec = 0;
    //カウント処理開始
    count_start();
    function count_start(){
        //1秒単位で処理実行
        interval_id = setInterval(count_down , 1000);
    }
    function count_down(){
        //ログ出力
        console.log( Number(sessionStorage.getItem('time')));
        //タイマー処理
        if ( Number(sessionStorage.getItem('time')) === 1 ){
            //時間経過したら処理実行
            count_stop();
            window.alert('終了時間です。'); 
            timeUpPostAnswerData("test_api.php");
        }else{
            //時間計算
            sessionStorage.setItem('time', Number(sessionStorage.getItem('time')) - 1);
            min = Math.floor( Number(sessionStorage.getItem('time')) / 60);
            sec = Math.floor( Number(sessionStorage.getItem('time')) % 60);
            //HTMLに書き込み
            $("#timer").html('[残り時間]' + min +'分' + sec + '秒' );
            if (sec<10) {
                $("#timer").html('[残り時間]' + min + '分' + '0' + sec + '秒' );
            }
        }
    }
}

function count_stop(){
    clearInterval(interval_id);
}

function postAnswerData(URL){
    
    $("#test_form").submit(function(event) {
        // HTMLでの送信をキャンセル
        event.preventDefault();

        // 操作対象のフォーム要素を取得
        let $form = $(this);

        // 送信ボタンを取得
        var $button = $("#nextTestPage");

        // 送信
        $.ajax({
            url: $form.attr("action"),
            type: $form.attr("method"),
            data: $form.serialize(),
            timeout: 10000,  // 単位はミリ秒

            // 送信前
            beforeSend: function(xhr, settings) {
                // ボタンを無効化し、二重送信を防止
                $button.attr("disabled", true);
            },
            // 応答後
            complete: function(xhr, textStatus) {
                // ボタンを有効化し、再送信を許可
                $button.attr("disabled", false);
            },

            // 通信成功時の処理
            success: function(result, textStatus, xhr) {
                // 入力値を初期化
                $form[0].reset();
                //問題さしかえ関数の呼び出し
                getTestData(URL);
            },
            // 通信失敗時の処理
            error: function(xhr, textStatus, error) {
                alert("通信に失敗しました。\n担当者に連絡してください。");
            }
        });
    });
}

//タイムアップしたときに呼び出される関数
function timeUpPostAnswerData(URL){ 
    //タイマーをリセット
    sessionStorage.removeItem('time');
    
    $("#test_form").append($('<input />', {
        type: 'hidden',
        name: 'sectionEnd',
        value: 'sectionEnd',
    }));
    console.log("タイムアップ関数");
    $("#test_form")[0].submit(function(event) {
        console.log("タイムアップ後submit");
        // HTMLでの送信をキャンセル        
        event.preventDefault();

        // 操作対象のフォーム要素を取得
        let $form = $(this);
        
        // 送信
        $.ajax({
            url: $form.attr("action"),
            type: $form.attr("method"),
            data: {
                data: $form.serialize(),
            },
            
            timeout: 10000,  // 単位はミリ秒

            // 送信前
            beforeSend: function(xhr, settings) {
            },
            // 応答後
            complete: function(xhr, textStatus) {
            },

            // 通信成功時の処理
            success: function(result, textStatus, xhr) {
                // 入力値を初期化
                $form[0].reset();
                // 送信
             },
            // 通信失敗時の処理
            error: function(xhr, textStatus, error) {
                alert("通信に失敗しました。\n担当者に連絡してください。");
            }
        });
    });
}

//問題データをPHPに要求し差し替える関数
function getTestData(URL){
    $.ajax(URL,
    {
        type: 'get',
        dataType: 'html',
        data: {
            key: '',
            search: ''
        }
    })
    .done(function (data)
    {
        // 問題データ差し替え
        $("#testDataAjax").html(data);
    })
    .fail(function() {
        // データ取得失敗
        alert('データの取得に失敗しました。');
        return false;

    });
}
