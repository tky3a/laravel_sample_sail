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

sail npm run dev
```

# 設定
vsCodeの場合はSettings.jsonに以下を追加　
```
    "editor.formatOnSave": true,
    // https://github.com/bmewburn/vscode-intelephense/issues/1413
    // 以下は全てUndefined method '?'. intelephense対策
    "intelephense.telemetry.enabled": false,
    "intelephense.completion.triggerParameterHints": true,
    "intelephense.completion.insertUseDeclaration": true,
    "intelephense.trace.server": "messages",
    "intelephense.diagnostics.undefinedClassConstants": false,
    "intelephense.diagnostics.undefinedFunctions": false,
    "intelephense.diagnostics.undefinedConstants": false,
    "intelephense.diagnostics.undefinedProperties": false,
    "intelephense.diagnostics.undefinedTypes": false,
    "intelephense.diagnostics.undefinedMethods": false,
```

## リスナー作成コマンド
```
sail artisan make:listener RegisteredListener
```

# JWT
公式：https://laravel-jwt-auth.readthedocs.io/en/latest/laravel-installation/

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