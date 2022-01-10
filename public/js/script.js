// JSONからランダム配列でHTMLを生成&表示
// JSON読み込み
// var url = 'http://localhost/url.json';
// $.getJSON(url, (data) => {
//     // JSONデータを受信した後に実行する処理
//     console.log(data.url[0]);
//     var length = Object.keys(data['url']).length;
// });

// TOPへ戻るボタン
$('#top-btn').on('click', function () {
    $('html, body').animate({ scrollTop: 0 }, 400);
});