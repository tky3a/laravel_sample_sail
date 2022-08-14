# Laravel9サンプル

環境
```
PHP 8.1.8 
laravel 9.23.0
```

# 起動
```
// alias登録
alias sail="./vendor/bin/sail"

// Laravelサーバー起動
sail up -d
```

## リスナー作成コマンド
```
sail artisan make:listener RegisteredListener
```

# JWT

## install
```
こっちはまだlaravel9に対応していないみたい。
// sail composer require tymon/jwt-auth

// 追加
sail composer require php-open-source-saver/jwt-auth
```

## php-open-source-saver/jwt-auth パッケージの設定ファイルをconfig配下に追加
```
sail artisan vendor:publish --provider="PHPOpenSourceSaver\JWTAuth\Providers\LaravelServiceProvider"
```

## jwt認証で使う秘密鍵を生成
```
sail artisan jwt:secret
```