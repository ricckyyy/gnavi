# gnavi

## 概要

このプロジェクトは、ぐるなびAPI（Gurunavi REST API）を使用して飲食店情報を検索し、CSV形式でエクスポートするPHPアプリケーションです。また、PHPの基本的な構文や機能を学習するための練習ファイルも含まれています。

## 主な機能

### 飲食店検索（restaurants_searcher.php）
- ぐるなびAPIを利用して条件に合った飲食店を検索
- 検索結果をCSVファイルに出力
- 店舗名、住所、営業時間、電話番号などの情報を取得

### PHP学習用ファイル
プロジェクトには以下のPHP基本構文の学習用ファイルが含まれています：
- `var.php` - 変数、配列の基本操作
- `func.php` - 関数の定義と使用
- `for.php` - ループ処理（FizzBuzz実装）
- `if.php` - 条件分岐
- `class.php` - クラスの基本（静的プロパティ）
- `class2.php` - クラスの継承とコンストラクタ
- `hash.php` - 連想配列の操作

## 必要要件

- PHP 8.0以上
- Composer
- ぐるなびAPIキー（飲食店検索機能を使用する場合）

## セットアップ

1. リポジトリをクローン:
```bash
git clone https://github.com/ricckyyy/gnavi.git
cd gnavi
```

2. Composerで依存関係をインストール:
```bash
composer install
```

3. ぐるなびAPIキーを取得:
   - [ぐるなびAPI](https://api.gnavi.co.jp/)から無料でAPIキーを取得できます

4. **重要**: APIキーの設定
   - ⚠️ **絶対に実際のAPIキーをGitにコミットしないでください**
   - ⚠️ **`restaurants_searcher.php`内の既存のハードコードされたキーは削除してください**（既に公開されています）
   - 新しいAPIキーを取得し、下記の「セキュリティのベストプラクティス」に従って安全に管理してください
   
   テスト目的でのみ、`restaurants_searcher.php`の設定を一時的に編集:
```php
$KEYID = "YOUR_API_KEY_HERE";  // APIキーを設定（本番では環境変数を使用）
$PREF = "PREF13";              // 都道府県コード（PREF13は東京都）
$FREEWORD = "渋谷駅";          // 検索キーワード
```

## 使用方法

### 飲食店検索
```bash
php restaurants_searcher.php
```

実行すると、検索結果が`restaurants_list.csv`ファイルに保存されます。

### PHP学習ファイルの実行
各学習ファイルは個別に実行できます：
```bash
php var.php
php func.php
php for.php
php if.php
php class.php
php class2.php
php hash.php
```

## 動作確認

以下のコマンドで各ファイルが正常に動作することを確認できます：

```bash
# 変数と配列の操作を確認
php var.php

# 関数の動作を確認
php func.php

# ループ処理（FizzBuzz）を確認
php for.php

# 条件分岐を確認
php if.php

# クラスの基本を確認
php class.php

# クラスの継承を確認
php class2.php

# 連想配列を確認
php hash.php
```

## プロジェクト構成

```
gnavi/
├── README.md                    # このファイル
├── composer.json                # Composer設定ファイル
├── composer.lock                # 依存関係のロックファイル
├── restaurants_searcher.php     # メイン機能：飲食店検索スクリプト
├── restaurants_list.csv         # 検索結果の出力ファイル
├── var.php                      # PHP学習：変数と配列
├── func.php                     # PHP学習：関数
├── for.php                      # PHP学習：ループ
├── if.php                       # PHP学習：条件分岐
├── class.php                    # PHP学習：クラス基本
├── class2.php                   # PHP学習：クラス継承
├── hash.php                     # PHP学習：連想配列
└── vendor/                      # Composer依存パッケージ
```

## 依存ライブラリ

- [GuzzleHttp](https://github.com/guzzle/guzzle) ^7.2 - HTTPクライアント

## 注意事項

- **セキュリティ警告**: 
  - ⚠️ **`restaurants_searcher.php`に現在ハードコードされているAPIキーは既に公開されています**
  - このキーを削除/無効化し、新しいキーを取得してください
  - 新しいキーは環境変数や設定ファイルで管理し、決してGitにコミットしないでください
- APIキーは公開リポジトリにコミットしないでください
  - 環境変数や設定ファイル（`.gitignore`に追加）を使用することを推奨します
- ぐるなびAPIには利用制限があります。詳細は[公式ドキュメント](https://api.gnavi.co.jp/api/manual/)を参照してください
- 検索条件は`restaurants_searcher.php`内で自由にカスタマイズできます

### セキュリティのベストプラクティス

APIキーを安全に管理するために、以下のような方法を検討してください：

**方法1: 環境変数から読み込む（推奨）**
```php
$KEYID = getenv('GNAVI_API_KEY');
if (!$KEYID) {
    die("Error: GNAVI_API_KEY environment variable is not set\n");
}
```

使用方法：
```bash
export GNAVI_API_KEY="your_actual_api_key_here"
php restaurants_searcher.php
```

**方法2: 設定ファイルから読み込む**

1. `config.php`を作成：
```php
<?php
define('GNAVI_API_KEY', 'your_actual_api_key_here');
?>
```

2. `.gitignore`に`config.php`を追加

3. `restaurants_searcher.php`で使用：
```php
require_once 'config.php';
$KEYID = GNAVI_API_KEY;
```

## ライセンス

このプロジェクトは学習目的で作成されています。

## 参考リンク

- [ぐるなびAPI](https://api.gnavi.co.jp/)
- [GuzzleHTTP ドキュメント](https://docs.guzzlephp.org/)
- [PHP公式ドキュメント](https://www.php.net/)
