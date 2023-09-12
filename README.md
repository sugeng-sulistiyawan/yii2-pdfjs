# Yii2 PDF.js

Previewer PDF File with PDF.js for Yii2

[![Latest Stable Version](https://img.shields.io/packagist/v/diecoding/yii2-pdfjs?label=stable)](https://packagist.org/packages/diecoding/yii2-pdfjs)
[![Total Downloads](https://img.shields.io/packagist/dt/diecoding/yii2-pdfjs)](https://packagist.org/packages/diecoding/yii2-pdfjs)
[![Latest Stable Release Date](https://img.shields.io/github/release-date/sugeng-sulistiyawan/yii2-pdfjs)](https://github.com/sugeng-sulistiyawan/yii2-pdfjs)
[![Quality Score](https://img.shields.io/scrutinizer/quality/g/sugeng-sulistiyawan/yii2-pdfjs)](https://scrutinizer-ci.com/g/sugeng-sulistiyawan/yii2-pdfjs)
[![Build Status](https://img.shields.io/travis/com/sugeng-sulistiyawan/yii2-pdfjs)](https://app.travis-ci.com/sugeng-sulistiyawan/yii2-pdfjs)
[![License](https://img.shields.io/github/license/sugeng-sulistiyawan/yii2-pdfjs)](https://github.com/sugeng-sulistiyawan/yii2-pdfjs)
[![PHP Version Require](https://img.shields.io/packagist/dependency-v/diecoding/yii2-pdfjs/php?color=6f73a6)](https://packagist.org/packages/diecoding/yii2-pdfjs)

> Yii2 PDF.js uses [PDF.js](https://mozilla.github.io/pdf.js/) <br> Demo: https://mozilla.github.io/pdf.js/web/viewer.html

## Table of Contents

- [Yii2 PDF.js](#yii2-pdfjs)
  - [Table of Contents](#table-of-contents)
  - [Instalation](#instalation)
  - [Dependencies](#dependencies)
  - [Usage](#usage)
    - [Setup Module](#setup-module)
    - [Views](#views)
      - [Basic Usage](#basic-usage)
      - [Basic Usage with Modal](#basic-usage-with-modal)
      - [Direct Url](#direct-url)
      - [Custom Attribute](#custom-attribute)
      - [Disable Toolbar](#disable-toolbar)
      - [Add Watermark](#add-watermark)

## Instalation

Package is available on [Packagist](https://packagist.org/packages/diecoding/yii2-pdfjs), you can install it using [Composer](https://getcomposer.org).

```shell
composer require diecoding/yii2-pdfjs "^1.0"
```

or add to the require section of your `composer.json` file.

```shell
"diecoding/yii2-pdfjs": "^1.0"
```

## Dependencies

- PHP 7.0+
- [yiisoft/yii2](https://github.com/yiisoft/yii2)
- [npm-asset/pdfjs-dist](https://asset-packagist.org/package/npm-asset/pdfjs-dist)

## Usage

### Setup Module

```php
...

'modules'=>[
  'pdfjs' => [
       'class' => 'diecoding\pdfjs\Module',
   ],
],
...

```

### Views

#### Basic Usage

```php
<?php

use diecoding\pdfjs\PdfJs;
use yii\helpers\Url;

?>

<?php echo PdfJs::widget([
    "url" => Url::to(["/uploads/File.pdf"], true),
]); ?>

```

#### Basic Usage with Modal

```php
<?php

use diecoding\pdfjs\PdfJs;
use yii\bootstrap\Modal;
use yii\helpers\Url;

Modal::begin([
    "header"       => "<h2>Hello, World!</h2>",
    "toggleButton" => ["label" => "Lihat File"],
]);

echo PdfJs::widget([
    "url" => Url::to(["/uploads/File.pdf"], true),
]);

Modal::end();

?>

```

#### Direct Url

```php
<?php

use yii\helpers\Url;

?>

<?php echo Url::to(["/pdfjs", "file" => "/uploads/File.pdf"], true) ?>

?>
```

#### Custom Attribute

```php
<?php

use diecoding\pdfjs\PdfJs;
use yii\helpers\Url;

?>

<?php echo PdfJs::widget([
    "url"     => Url::to(["/uploads/File.pdf"], true),
    "options" => [
        "width"       => "100%",
        "height"      => "360",
        "frameborder" => "0",
    ]
]); ?>

```

#### Disable Toolbar

```php
<?php

use diecoding\pdfjs\PdfJs;
use yii\helpers\Url;

?>

<?php echo PdfJs::widget([
    "url"     => Url::to(["/uploads/File.pdf"], true),
    "buttons" => [
        "presentationMode"       => false,
        "openFile"               => false,
        "print"                  => false,
        "download"               => false,
        "viewBookmark"           => false,
        "secondaryToolbarToggle" => false
    ]
]); ?>

```

#### Add Watermark

```php
...

'modules'=>[
  'pdfjs' => [
       'class'     => 'diecoding\pdfjs\Module',
       'waterMark' => [
            'text'  => 'Yii2 PDF.js',
            'color' => 'blue',
            'alpha' => '0.3',
       ]
   ],
],
...

```
