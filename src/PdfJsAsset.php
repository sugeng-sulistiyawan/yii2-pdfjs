<?php

namespace diecoding\pdfjs;

use yii\web\AssetBundle;
use yii\web\View;

/**
 * @inheritdoc
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2020 Die Coding
 * @license MIT
 * @link https://www.diecoding.com
 * @version 1.0.0
 */
class PdfJsAsset extends AssetBundle
{

    /**
     * @var string $sourcePath
     */
    public $sourcePath = '@bower/pdfjs-dist';

    /**
     * @var array $css
     */
    public $css = [
        'web/pdf_viewer.css',
    ];

    /**
     * @var array $js
     */
    public $js = [
        'build/pdf.min.js',
        // 'build/pdf.worker.min.js',
        'web/pdf_viewer.js',
    ];

    /**
     * @var array $depends
     */
    public $depends = [
        'yii\web\YiiAsset',
    ];

    /**
     * @var array $jsOptions
     */
    public $jsOptions  = [
        'position' => View::POS_HEAD
    ];
}
