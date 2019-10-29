# ToDo app & マークダウン記法

# マークダウン記法 (#1個)
## について (#2個)
### まとめてみた (#3個)
#### シャープ1個が一番でかいよ (#4個)
##### いいの見つけたら随時追加するよ (#5個)

___

## コード

```
1. コードそのまま描くときは
2. バッククォート(`)
3. 3個で囲む
```

___

## 太字／斜体

*斜体は米1個*

**太字は米2個**

***斜体／太字は米3個***


```
*斜体は米1個*
**太字は米2個**
***斜体／太字は米3個***
```

## 改行
改行は

空白行

```
改行は

空白行
```

## 取り消し線

~~取り消し線はチルダ2こ~~

```
~~取り消し線はチルダ2こ~~
```

## 色変更
<font color="red">(色名)色も変わるよ</font>
<font color="ffb677">(カラーコード)いや変わらんのかい！！</font>

```
<font color="red">(色名)色も変わるよ</font>
<font color="ffb677">(カラーコードいや変わらんのかい！！</font>
```

## リスト

1. 番号付き
2. リスト
3. 作れるよ

```
1. 番号付き
2. リストも
3. 作れるよ
```


- い
  - れ
  - こ
- リ
  - ス
  - ト

```
- い
  - れ
  - こ
- リ
  - ス
  - ト
  ```


## 表

| チルダの位置で | 文字の表示位置 | 変更できるよ |
| ---: | --- | :---: |
| 右寄せ   | 左寄せ  | 真ん中  |
| チルダは | 3個以上 | いるよ  |
| 3       | いいい  | いいい  |
| 4       | ううう  | ううう  |

```
| チルダの位置で | 文字の表示位置 | 変更できるよ |
| ---: | --- | :---: |
| 右寄せ   | 左寄せ  | 真ん中  |
| チルダは | 3個以上 | いるよ  |
| 3       | いいい  | いいい  |
| 4       | ううう  | ううう  |
```

## 水平線
___
---
***


```
___ or --- or *** で水平線
```

## 引用

>侍blogより引用

```
>侍blogより引用 ( '>' つけるだけ)
```

## リンク

[参考にしたサイトがこちら](https://www.sejuku.net/blog/77398)

```
[参考にしたサイトがこちら](https://...)
```

- [ ] 朝ごはん食べた？
- [x] 昼は？
- [ ] 夜は食べなよ

```
- [ ] チェックリスト
- [x] つけれるよ
- [ ] プレビューからは変更できないの？
```

```

***
markdown
---
終わり
___

# Todo app

## SQLと接続するクラス : db_manager
### メソッド : connect()

PDO(PHP Data Objects)クラス : インスタンス化することでDBに接続できる。DB抽象化レイヤの1つで、これを使うことで異なるDBに変更するときもいい感じに解釈してくれるから書き換える必要がない。(MySQL⇨PostgreSQL、Oracleとか)

dbh(DataBase Handler) : プロパティ名輩なんでもいいけど、慣例的に？よー使う

DSN(Data Source Name) : データベースのサーバー名、DB名、文字エンコードを指定

文字設定はセキュリティの観点から正しく設定する[安全なSQLの呼び出し方](https://www.ipa.go.jp/security/vuln/websecurity.html)

::(スコープ定義演算子) : クラスの静的プロパティや静的メソッドにアクセスするための演算子
->(アロー演算子) : インスタンスのプロパティやメソッドにアクセスするための演算子

## Todoの処理作成

prepared statement : 似たような記述何回もすんのダリィ！！

⇨よく変更されるところだけ ？ にしとけば繰り返し使えんじゃね
？

⇨超効率的なプリペアドステートメントの完成

疑問符プレースホルダ : 上のやつの (?)部分のこと。(?)に値を割り当てることを**バインドする**というらしい。

## createメソッド作成
DBに格納後index.phpに戻る

## allメソッド作成
SELECT * で取ってきてfech

## 画面に一覧を出力
foreach

## function.php作成
hメソッドで入力された文字を無害化