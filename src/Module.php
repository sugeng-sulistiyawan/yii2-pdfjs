<?php

namespace diecoding\pdfjs;

/**
 * PdfJs Module Viewer.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2024
 */
class Module extends \yii\base\Module
{
	/**
	 * @var array
	 */
	public $defaultOptions = [];

	/**
	 * @var array
	 */
	public $defaultSections = [];

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'diecoding\pdfjs\controllers';
}
