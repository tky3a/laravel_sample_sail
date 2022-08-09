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