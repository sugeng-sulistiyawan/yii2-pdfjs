<?php

namespace diecoding\pdfjs;

use yii\helpers\ArrayHelper;

/**
 * @inheritdoc
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2020 Die Coding
 * @license MIT
 * @link https://www.diecoding.com
 * @version 1.0.0
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
