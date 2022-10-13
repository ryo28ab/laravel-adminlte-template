## 環境構築

### 初回のみ

```
cp .env.example .env
cp docker-compose.override.yml.sample docker-compose.override.yml
docker compose build
docker compose run --rm app composer install
docker compose run --rm app php artisan key:generate
docker compose up -d
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
```

### 確認

#### 管理画面にログインする

`http://localhost:8000/admin/`
email: admin@example.com
pass: test1234

## 使用ライブラリ

### [Laravel-AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE)

管理画面の見た目を楽するために使用予定。

### [PHP-CS-Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

フォーマッター。

### [laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)

デバッグ用(ローカルのみ)。

API のデバッグには強くないので、API 用に他のを導入するかも。

### [laravel-ide-helper](https://github.com/barryvdh/laravel-ide-helper)

エディタの書き心地をあげるために使用。

必須ではないので使用は各自におまかせ。

```
docker compose exec app php artisan ide-helper:generate (一度のみでよい)
docker compose exec app php artisan ide-helper:models -N (モデルに変更があったとき)
```

### [scribe](https://github.com/knuckleswtf/scribe)

API ドキュメントの作成に使用予定。

気に入らなければ swagger 等に移行できるようになっている。

localhost:8000/admin/docs にアクセスできるようになる。
