<?php

namespace diecoding\pdfjs;

/**
 * PdfJs Module.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2023
 */
class Module extends \yii\base\Module
{
	/**
	 * @var string
	 */
	public $title = 'PDF.js viewer';

	/**
	 * @var array
	 */
	public $buttons = [];

	/**
	 * @inheritdoc
	 */
	public $controllerNamespace = 'diecoding\pdfjs\controllers';

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

		$buttonsDefault = [
			'presentationMode'       => true,
			'openFile'               => true,
			'print'                  => true,
			'download'               => true,
			'viewBookmark'           => true,
			'secondaryToolbarToggle' => true,
		];

		$this->buttons   = array_merge($buttonsDefault, $this->buttons);
	}
}
