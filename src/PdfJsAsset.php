<?php

namespace diecoding\pdfjs;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * PdfJsAsset represents a collection of asset files, such as CSS, JS, images.
 * @see https://mozilla.github.io/pdf.js/getting_started/ for assets information
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2023
 */
class PdfJsAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = __DIR__ . '/assets';

    /**
     * @var array
     */
    public $css = [
        'web/viewer.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'build/pdf.js',
        'build/pdf.worker.js',
        'web/viewer.js'
    ];

    /**
     * @var array
     */
    public $jsOptions  = [
        'position' => View::POS_HEAD,
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
