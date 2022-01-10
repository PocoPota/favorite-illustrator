<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- 言語・環境設定 -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <!-- ページの内容 -->
    <title>Favo Illustrator</title>

    <!-- サイトアイコン -->
    <link rel="icon" href="https://favo-illustrator.pocopota.com/public/img/logo.png" sizes="16x16" type="image/png">

    <!-- リンク -->
    <link rel="stylesheet" href="../public/css/style.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="../public/js/illust.js"></script>

    <link rel="stylesheet" href="../public/css/luminous-basic.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>
    <!-- ロード用 -->
    <div id="loading">
        <span class="material-icons-outlined">loop</span>
    </div>
    <!-- 本画面用 -->
    <main id="top-page">
        <div id="grid">
            <?php
                // url.jsonを取得
                $url = 'url.json';
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json, true);
                // 要素(url)の数取得
                $count = count($arr['url']);
                // ランダムな配列を生成
                $numarr = range(0, $count - 1);
                shuffle($numarr);
                // 生成したランダムな配列を使ってhtmlを生成&出力
                for ($i = 0; $i <= $count - 1;$i++) {
                    $html = '<div class="grid-item"><a class="zoom" href="'.$arr['url'][$numarr[$i]].'&name=large"><img src="'.$arr['url'][$numarr[$i]].'&name=small"></a></div>';
                    echo $html;
                }
            ?>
        </div>
    </main>
    <!-- 下部固定用 -->
    <div id="bottom-btn">
        <div id="add-btn">
            <a href="change"><span class="material-icons-outlined">add</span></a>
        </div>
        <div id="top-btn">
            <span class="material-icons-outlined">vertical_align_top</span>
        </div>
    </div>
    <script src="../public/js/luminous.min.js"></script>
    <script>new LuminousGallery(document.querySelectorAll('.zoom'));</script>
    <script src="../public/js/script.js"></script>
</body>

</html>