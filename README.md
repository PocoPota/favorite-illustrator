# favorite-illustrator
お気に入りのTwitterの画像を一覧化して表示させるサイトのソースコードです

## このソースコードについて
このソースコードはTwitterの画像URLを追加していき一覧表示させるサイト「Favorite Illustrator」作成のためのものです。

## Favorite Illustratorについて
Twitter画像の追加と表示ができるサイトです。
## 画像の追加方法
1,Twitterで追加したい画像のURLを取得する(右クリックで「画像のアドレスをコピー」)
2,サイト右下の＋ボタンをクリック  
3,入力欄にコピーしたURLを貼り付けて追加する
## アップロードできる画像
https://pbs.twimg.com から始まるTwitterの画像  
URLの最後に付くlargeとかsmall、900×900などの表示はそのままアップしても大丈夫です

## 作成方法
1,このfavorite-illustratorのリポジトリをダウンロードする  
2,jsonフォルダに「ユーザ名.json」の形式のファイルを作成する
3,PHP対応のサーバーへアップロードする  
4,.htaccessで.phpの拡張子がなくても表示できるようにする

## ユーザーの追加方法
1,jsonフォルダ内に「ユーザー名.json」ファイルを作成する

## 使用ライブラリとか
```
・masonry.js - 画像をPinterestのようなレイアウトで並べる(cdn)
・imagesLoaded - 画像が全て読み込まれたあとに表示させる(cdn)
・Luminous.js - クリックした画像の拡大縮小
・Google fonts - フォントと各種アイコン
```

## セキュリティ
ユーザー名さえ分かってしまえば他のユーザーの画像も全部弄れてしまいます
完全個人ようなので悪しからず
