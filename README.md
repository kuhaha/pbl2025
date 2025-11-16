### サンプルコードの利用手順

#### **a.** サンプルコードを展開し、開発環境に配置する
**a1.** サンプルコード（zipファイル）を展開し、ドキュメントルート（下記）に置く

```shell
├ pbl2025/
  ├─ css/   CSSファイルが入っている
  ├─ docs/  データベースの構成等の説明が入っている
    ├─ SAMPLE_DB_DATA.sql
    └─ SAMPLE_DB_SCHEMA.sql
  ├─ img/   画像ファイルが入っている
  ├─ src/   主要機能や画面の実装のPHPソースファイルが入っている
       ├─ Model.php　データベース操作に関するクラス
       ├─ pg_footer.php
       ├─ pg_header.php
       ├─ rst_detail.php
       ├─ rst_list.php
       ├─ usr_detail.php
       ├─ usr_list.php
       ├─ usr_login.php
       ・・・
  ├─ index.php　各機能への入り口。
  └─ README.md　このドキュメント
```

**a2.** Visual Studio Codeを起動する 
-　「  `C:/php/lampp-docker8/htdocs/pbl2025`」フォルダを開く    
-　上記のフォルダにサンプルコードが含まれていることを確認

  以上で、サンプルコード導入完了

#### b. データベースを構築する

**b1.** 開発環境`Lampp-docker8`のトップ画面を開く

**b2.** データベース管理画面phpMyAdminを開く

**b3.** 新規データベース（**pbl2025db**）を作成する
- データベース名：**pbl2025db**
- 照合順序`：utf8mb4_general_ci` (正しく指定しないと,文字化けになる)
- ※データベース名(**pbl2025db**)が`src\Model.php`に使われている

**b4.** 作成したデータベースを開く
- データベース名(**pbl2025db**)をクリック

**b5.** SQL編集画面を開く
- SQLタブをクリック

**b6.** docs内にある以下のSQLを実行（各チームの設計案に合わせて適宜追加・修正）
- `SAMPLE_DB_SCHEMA.sql` :データベーススキーマを定義するSQL文 
- `SAMPLE_DB_DATA.sql`：データベースにサンプルデータを追加するSQL文

以上で、データベース構築完了

#### c. サンプルを使ってみる
**c1.** システムのTOPを開く
- URL:　http://localhost/pbl2025/
**c2.** 会員としてログイン
- ID: `u001～u010`
- PW: `1234`

**c3.** ゲストとしてログイン
- ID: `t001～t003`
- PW: `3456`

**c4.** 管理者としてログイン
- ID: `admin`
- PW: `5678`
