<?php

namespace diecoding\pdfjs;

use yii\web\AssetBundle;

/**
 * PdfJsAsset represents a collection of asset files, such as CSS, JS, images.
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
    public $sourcePath = '@bower/pdfjs-dist/web';

    /**
     * @var array
     */
    public $css = [
        'web/pdf_viewer.css',
    ];

    /**
     * @var array
     */
    public $js = [
        'build/pdf.min.js',
        'web/pdf_viewer.js',
    ];

    /**
     * @var array
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];

    /**
     * @var array $jsOptions
     */
    public $publishOptions  = [
        'only' => [
            'build',
            'web',
        ]
    ];
}
