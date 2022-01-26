<?php
if (isset($_GET['u'])) {
    $user = ($_GET['u']);
    if(isset($_POST['imgurl'])){
        $imgurl = $_POST['imgurl'];
    }else{
        $imgurl = null;
    }
    $imgurlForCheck = substr($imgurl, 0, 19);
    if ($imgurl == null) {
    } elseif ($imgurl == '') {
    } elseif ($imgurlForCheck != 'https://pbs.twimg.c') {
        echo '<div class="error">TwitterのURLしか対応していません。</div>';
    } else {
        $imgurl = substr($imgurl, 0, 54);
        // 現時点のurl.jsonを取得
        $url = 'json/'.$user.'.json';
        $json = file_get_contents($url);
        $json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $arr = json_decode($json, true);
        // 要素(url)の数を取得
        $count = count($arr['url']);
        // 新しい要素(url)を追加
        $arr['url'][$count] = $imgurl;
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
    header("refresh:0;url=./");
}
?>
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
</head>

<body>
    <?php $actionUrl = 'add?u='.$user ?>
    <main id="add-page">
        <form action=<?php echo $actionUrl ?> method="post">
            <label>画像を追加</label>
            <input type="url" name="imgurl">
            <input type="submit" value="追加">
        </form>
    </main>
</body>

</html>