/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// 今いるページを履歴に追加
history.pushState(null, null, null);
// ページ戻り時にも今いるページを履歴に追加
$(window).on("popstate", function(){
   history.pushState(null, null, null);
    // 確認ダイヤログを表示。不要な場合は削除
   alert('ブラウザの戻るボタンは使えません。\nページ内の前へ戻るボタンから戻ってください。');
});
