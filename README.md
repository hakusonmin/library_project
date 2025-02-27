## 使用技術
- Laravel11(認証処理は認証ライブラリ(Breeze)を使用)
- MySQL

## 環境構築
### 前提
- 1.PHP,Composer,npmがinstall済み
- 2.MySQLでデータベースを作成済み
- 3.go-taskが実行できる(ライブラリは mac `brew install task` win `winget install Task.Task`でinstallできる )

### 手順
- `clone` しプロジェクト直下に移動
- `task install` をターミナルで実行
- `.env`にDBの情報を記載
- `php artisan migrate` を実行
- `npm run dev`フロントのサーバーを起動
- `php artisan serve --port=xxxx` バックエンドのビルトインサーバーを構築(xxxxは任意のポート番号)
- `task seed`でシーディング(＝ダミーデータの挿入)ができる

### パス
- http://localhost:xxxx/admin 管理者ダッシュボード
- http://localhost:xxxx/user ユーザーダッシュボード

### データ
- userアクセス情報：メアド fuga@gmail.com パスワード fugafuga
- adminアクセス情報：メアド hoge@gmail.com パスワード hogehoge

### 備考
- ダミーデータは左上の方のサムネイルにしか入っていません

