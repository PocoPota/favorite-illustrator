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
    <link rel="icon" href="public/img/logo.png" sizes="16x16" type="image/png">

    <!-- リンク -->
    <link rel="stylesheet" href="public/css/style.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="public/js/illust.js"></script>

    <link rel="stylesheet" href="public/css/luminous-basic.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>
    <?php
        if (isset($_GET['u'])) {
            $user = ($_GET['u']);
            // ロード用
            echo '
            <div id="loading">
                <span class="material-icons-outlined">loop</span>
            </div>
            ';
            // 本体画面用
            echo '
            <main id="top-page">
            <div id="grid">
            ';
            // URLのjsonを取得
            $url = 'json/'.$user.'.json';
            $json = file_get_contents($url);
            $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
            $arr = json_decode($json, true);
            // 要素(url)の数取得
            $count = count($arr['url']);
            if($count !== 0){
                // ランダムな配列を生成
                $numarr = range(0, $count - 1);
                shuffle($arr['url']);
                // シャッフルした配列を順に出力
                foreach ($arr['url'] as $arr['url'] => $imgurl) {
                    $html = '<div class="grid-item"><a class="zoom" href="'.$imgurl.'&name=large"><img src="'.$imgurl.'&name=small"></a></div>';
                    echo $html;
                }
                echo '
                </div>
                </main>
                ';
            }
            // 下部固定用
            echo '
            <div id="bottom-btn">
            <div id="add-btn">
                <a href="add?u='.$user.'"><span class="material-icons-outlined">add</span></a>
            </div>
            <div id="delete-btn">
                <a href="delete?u='.$user.'"><span class="material-icons-outlined">delete</span></a>
            </div>
            <div id="top-btn">
                <span class="material-icons-outlined">vertical_align_top</span>
            </div>
            </div>';
        } else {
            echo '
            <main id="add-page">
            <form action="./" method="get">
            <label>ユーザー名を入力</label>
            <input type="text" name="u">
            <input type="submit" value="ログイン">
            </form>
            </main>
            ';
        }
        ?>
    <script src="public/js/luminous.min.js"></script>
    <script>new LuminousGallery(document.querySelectorAll('.zoom'));</script>
    <script src="public/js/script.js"></script>
</body>

</html>