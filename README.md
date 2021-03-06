# Laravel

```
npm run dev
```



#### 下記が必要

- php-mbstring
- php-dom


config/filesystems.php

- ディスクの設定
- 特定のストレージドライバと保存場所を表す

```bash:
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:o3IbzUnXQQzyACVN/nFPKkKj1eze5C2U3abCKNvu0Ns=
APP_DEBUG=true
APP_URL=http://localhost
```

## storageへのシンボリックリンク作成

- /public/storage ディレクトリを作成
- 上記から/storage ディレクトリへシンボリックリンクを貼る

```bash:
php artisan storage:link
```

local storage/app/
public storage/app/pulic
s3 s3

assetヘルパを使いファイルへのURLを生成できる。

```bash:
echo asset('storage/file.txt');
```

## 画像などの保存

- 画像名は勝手にきまってしまう
$request->file("名前")->store('保存先', 必要ならドライバを指定);

- 保存画像名を指定したい
$request->file("名前")->storeAs('保存先', 画像名, 必要ならドライバを指定);


