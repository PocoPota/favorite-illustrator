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

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>
    <?php
        if (isset($_GET['u'])) {
            $user = ($_GET['u']);
            if (isset($_POST['delete-check'])) {
                $deleteImages = $_POST['delete-check'];
                foreach ($deleteImages as $deleteImageNum) {
                    // 現時点のurl.jsonを取得
                    $url = 'json/'.$user.'.json';
                    $json = file_get_contents($url);
                    $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                    $arr = json_decode($json, true);
                    // 削除
                    $deleteImageNum = (int)$deleteImageNum;
                    unset($arr['url'][$deleteImageNum]);
                    // 連想配列にしたものをもう一度jsonに
                    $arrJson = json_encode($arr);
                    $filePass = 'json/'.$user.'.json';
                    file_put_contents($filePass, $arrJson);
                    // トップページにリダイレクト
                    $redirectUrl = './?u='.$user;
                    header("Location:".$redirectUrl);
                    exit();
                }
            } else {
                // 本体画面用
                echo '
                <main id="delete-page">
                <form action="delete.php?u='.$user.'" method="post">
                <div id="grid">
                ';
                // URLのjsonを取得
                $url = 'json/'.$user.'.json';
                $json = file_get_contents($url);
                $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
                $arr = json_decode($json, true);
                // 要素(url)の数取得
                $count = count($arr['url']);
                $arr = array_reverse($arr['url'],true);
                // htmlを生成&出力
                $keys = array_keys($arr);
                $counter = 0;
                foreach ($arr as $arr => $imgurl) {
                    $html = '<div class="grid-item"><label><input type="checkbox" name="delete-check[]" value="'.$keys[$counter].'"><img src="'.$imgurl.'&name=small"></label></div>';
                    echo $html;
                    $counter++;
                }
                echo '
                </div>
                <input type="submit" id="delete-deci-btn" value="削除">
                </form>
                </main>
                ';
            }
        } else {
            header("refresh:0;url=./");
        }
        ?>
    <script src="public/js/script.js"></script>
    <script src="public/js/delete.js"></script>
</body>

</html>