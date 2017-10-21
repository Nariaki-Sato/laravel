

### /testapp/.env-sample 変更前 #####################
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret


This is Sato's Laravel Training Camp.

Reference Website: 
https://qiita.com/kiida510/items/cc31453f8034ceb73487

開発環境構築のコマンドは以下

docker-compose up -d php-fpm nginx mysql workspace

PHPフレームワーク Laravel入門 目次

Chapter 1 Laravelを準備する

1.1 PHPフレームワークとLaravel
    PHP開発の問題点
    フレームワークの導入
    Laravelの特徴
    Laravelのサイト
    Composerについて
    Laravelをインストールする
1.2 Laravelを使ってみる
    Laravel開発の手順
    プロジェクトの作成
    アプリケーションを実行する
    XAMPPにデプロイする
    指定のアドレスで公開する
    
Chapter 2 ルーティングとコントローラ

2.1 ルーティング
    アプリケーションの構成
    「app」フォルダについて
    ルーティングと「routes」フォルダ
    ルート情報の記述
    トップページのルート情報
    ルート情報を追加する
    HTMLを出力する
    ヒアドキュメントを使う
    ルートパラメータの利用
    必須パラメータと任意パラメータ
2.2 コントローラの利用
    MVCとコントローラ
    コントローラの作成
    HelloController.phpをチェックする
    アクションを追加する
    ルートパラメータの利用
    複数アクションの利用
    シングルアクションコントローラ
    リクエストとレスポンス
    RequestおよびResponse
    
Chapter 3 ビューとテンプレート

3.1 PHPテンプレートの利用
    ビューについて
    PHPテンプレートを作る
    ルートの設定でテンプレートを表示する
    コントローラでテンプレートを使う
    値をテンプレートに渡す
    ルートパラメータをテンプレートに渡す
    クエリー文字列の利用
3.2 Bladeテンプレートを使う
    Bladeを使う
    フォームを利用する
    CSR対策について
    アクションの用意
    POSTのルート設定
3.3 Bladeの構文
    値の表示
    @ifディレクティブ
    特殊なディレクティブ
    繰り返しのディレクティブ
    @break と @continue
    $loopによるループ変数
    @phpディレクティブについて
3.4 レイアウトの作成
    レイアウトの定義と継承
    @sectionと@yield
    ベース・レイアウトを作成する
    継承レイアウトの作成
    コンポーネントについて
    コンポーネントを作成する
    サブビューについて
    @eachによるコレクションビュー
3.5 ビューコンポーザ
    ビューコンポーザとは？
    サービスプロバイダについて
    HelloServiceProviderを作成する
    クロージャでコンポーザ処理を作る
    サービスプロバイダの登録
    ビューコンポーザを利用する
    ビューコンポーザクラスの作成


Chapter 4 リクエスト・レスポンスを補完する

4.1 ミドルウェアの利用
    ミドルウェアとは？
    ミドルウェアを作成する
    HelloMiddlewareクラス
    HelloMiddlewareを修正する
    ミドルウェアの実行
    ビューとコントローラの修正
    リクエストとレスポンスの流れ
    レスポンスを操作する
    グローバルミドルウェア
    ミドルウェアのグループ登録
4.2 バリデーション
    ユーザー入力時の問題
    バリデーションを利用する
    バリデーションの基本処理
    エラーメッセージと値の保持
    フィールドごとにエラーを表示
    バリデーションの検証ルール
4.3 バリデーションをカスタマイズする
    フォームリクエストについて
    フォームリクエストの作成
    HelloRequestクラスの基本コード
    メッセージのカスタマイズ
    バリデータを作成する
    クエリー文字列にバリデータを適用する
    エラーメッセージのカスタマイズ
    条件に応じてルールを追加する
    オリジナル・バリデータの作成
    HelloValidatorを作成する
    HelloValidatorのルールを使用する
    Validator::extendを利用する
4.4 その他のリクエスト・レスポンス処理
    CSRF対策とVerifyCsrfToken
    クッキーを読み書きする
    リダイレクトについて

Chapter 5 データベースの利用

5.1 データベースを準備する
    モデルとデータベース
    Laravelのアプローチ
    SQLiteデータベースを準備する
    DB Browser for SQLiteの導入
    DB Browserのインストール
    DB Browserを起動する
    データベースファイルを作る
    テーブルを作成する
    SQL利用の場合
    ダミーのレコードを追加する
    DB利用のための手続き
    SQLiteの設定
    MySQL/PostgreSQLの設定
    .envの環境変数について
5.2 DBクラスの利用
    DBクラスとは？
    パラメータ結合の利用
    DB::insertによるレコード作成
    DB::updateによる更新
    DB::deleteによる削除
    SQLクエリがすべて？
5.3 クエリビルダ
    クエリビルダとは？
    DB::tableとget
    指定したIDのレコードを得る
    演算記号を指定した検索
    whereとorWhere
    whereRawによる条件検索
    並び順を指定する「orderBy」
    offsetとlimit
    insertによるレコード追加
    updateによるレコード更新
    deleteによるレコード削除
5.4 マイグレーションとシーディング
    マイグレーションとは？
    マイグレーションファイルの生成
    マイグレーション処理について
    テーブル生成の処理
    テーブルの削除処理
    マイグレーションを試す
    シーディングについて
    シーダーファイルの作成
    シーディング処理について
    シーダーファイルの登録
    シーディングを実行する

Chapter 6 Eloquent ORM

6.1 Eloquentの基本
    ORMとは？
    モデルを作成する
    モデルクラスのソースコード
    PersonControllerを作成する
    index.blade.phpを作成する
    Personモデルで全レコードを得る
    Personクラスにメソッドを追加する
    IDによる検索
6.2 検索とスコープ
    whereによる検索
    スコープの利用
    ローカルスコープについて
    nameをスコープにする
    スコープを組み合わせる
    グローバルスコープについて
    グローバルスコープを作成する
    Scopeクラスを作成する
    ScopePersonクラスを作る
6.3 モデルの保存・更新・削除
    モデルの新規保存
    モデルを修正する
    add.blade.phpを作成する
    addおよびcreateアクションを追記する
    保存処理の流れ
    モデルを更新する
    editおよびupdateアクションを追記する
    モデルの削除
    モデルとDBクラスの共通性
6.4 モデルのリレーション
    モデルのリレーションとは？
    boardsテーブルを利用する
    マイグレーションの作成
    モデルの作成
    BoardControllerの作成
    テンプレートの作成
    has Oneについて
    has One結合
    has Many結合
    belongsTo結合
    関連レコードの有無
    withによるEagerローディング

Chapter 7 RESTfulサービス/セッション/ペジネーション/認証/テスト

7.1 リソースコントローラとRESTful
    RESTfulとは？
    マイグレーションの作成
    モデルの作成
    シードの作成
    シードの実行
    RESTコントローラの作成
    リソースコントローラについて
    indexおよびshowを作成する
    レコードの追加
    フォームを/hello/restに埋め込む
    RESTfulサービスにするために
7.2 セッション
    セッションについて
    セッションを利用する
    セッション利用アクションを作る
    データベースをセッションで使う
    セッションの保存先をデータベースに変更する
    セッション用マイグレーションの作成
7.3 ペジネーション
    ペジネーションとは？
    DBクラスとsimplePaginate
    ページの表示を作成する
    DBクラスとモデル
    ソート順を変更する
    paginateメソッドの利用
    リンクのテンプレートを用意する
    app.cssスタイルシートについて
7.4 ユーザー認証
    認証機能とAuth
    データベースの準備
    /helloでログインをチェックする
    Authの認証関係ページ
    特定ページの保護
    ログイン処理の実装
7.5 ユニットテスト
    ユニットテストとPHPUnit
    テスト用データベースの準備
    ダミーレコードの用意
    ユニットテストのスクリプト作成
    一般的な値のテスト
    指定アドレスにアクセスする
    データベースをテストする
    ユニットテスト以外のテスト
