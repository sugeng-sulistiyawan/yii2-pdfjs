<?php

namespace diecoding\pdfjs;

use yii\helpers\ArrayHelper;

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
	 *
	 * @var array $buttons
	 */
	public $buttons = [];

	/**
	 *
	 * @var array $waterMark
	 */
	public $waterMark = [];

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

		$waterMarkDefault = [
			'text'  => '',
			'alpha' => '0.5',
			'color' => 'red'
		];

		if (!empty($this->waterMark)) {
			$this->waterMark = ArrayHelper::merge($waterMarkDefault, $this->waterMark);
		} else {
			$this->waterMark = $waterMarkDefault;
		}

		$this->buttons = ArrayHelper::merge([
			'presentationMode'       => true,
			'openFile'               => true,
			'print'                  => true,
			'download'               => true,
			'viewBookmark'           => true,
			'secondaryToolbarToggle' => true,
		], $this->buttons);
	}
}
