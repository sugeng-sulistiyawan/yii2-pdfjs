# Yii2 Previewer PDF File with [PDF.js](https://mozilla.github.io/pdf.js/) plugin.

[![Latest Version](https://img.shields.io/github/release/die-coding/yii2-pdfjs.svg?style=flat-square)](https://github.com/die-coding/yii2-pdfjs/releases)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Quality Score](https://img.shields.io/scrutinizer/g/die-coding/yii2-pdfjs.svg?style=flat-square)](https://scrutinizer-ci.com/g/die-coding/yii2-pdfjs)
[![Total Downloads](https://img.shields.io/packagist/dt/diecoding/yii2-pdfjs.svg?style=flat-square)](https://packagist.org/packages/diecoding/yii2-pdfjs)

## Cara Memasang

-   Melalui console

```
composer require --prefer-dist diecoding/yii2-pdfjs "*"
```

-   Melalui `composer.json`

1. Tambahkan pada baris `require`

```
"diecoding/yii2-pdfjs": "*"
```

2. Kemudian jalankan

```
composer update
```



Setup Module
------------

```php
...

'modules'=>[
  'pdfjs' => [
       'class' => 'diecoding\pdfjs\Module',
   ],
],
...

```



Cara Menggunakan
----------------

-   Cara Basic
```php
<?php

use diecoding\pdfjs\PdfJs;
use yii\helpers\Url;

?>

<?php echo PdfJs::widget([
    "url" => Url::to(["/uploads/File.pdf"], true),
]); ?>

```

-   Cara Kombinasi Modal
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


-   Cara Direct Url
```php
<?php

use yii\helpers\Url;

?>

<?php echo Url::to(["/pdfjs", "file" => "/uploads/File.pdf"], true) ?>

?>
```

-   Cara Custom Attribute Html
-----
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
]);

?>

```

-   Cara Disable Toolbar
```php
<?php

use diecoding\pdfjs\PdfJs;
use yii\helpers\Url;

?>

<?php echo PdfJs::widget([
  "url"     => Url::to(["/uploads/File.pdf"], true),
  "buttons"=>[
    "presentationMode" => false,
    "openFile" => false,
    "print" => true,
    "download" => true,
    "viewBookmark" => false,
    "secondaryToolbarToggle" => false
  ]
]);
?>
```


-   Cara Tambah Watermark
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