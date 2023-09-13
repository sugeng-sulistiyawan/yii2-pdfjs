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
	 * Show or hide section container
	 * 
	 * @var array
	 */
	public $sections = [];

	/**
	 * Show or hide section container
	 * 
	 * @var array
	 */
	private $_defaultSections = [
		'presentationMode'       => true,
		'print'                  => true,
		'download'               => true,
		'secondaryToolbarToggle' => true,
	];

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

		$this->sections = array_merge($this->_defaultSections, $this->sections);
	}
}
