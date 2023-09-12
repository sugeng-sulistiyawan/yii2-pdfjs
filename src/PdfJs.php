<?php

namespace diecoding\pdfjs;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;

/**
 * PdfJs is the class for widgets.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2023
 */
class PdfJs extends Widget
{
	/**
	 * @var string Module ID for your config
	 */
	public $moduleId = 'pdfjs';

	/**
	 * @var string
	 */
	public $url;

	/**
	 * @var array
	 */
	public $options = [];

	/**
	 * @var array
	 */
	public $buttons = [];

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

		$this->view->registerAssetBundle(PdfJsAsset::class);

		$module        = Yii::$app->getModule($this->moduleId);
		$buttons       = $module->buttons;
		$this->buttons = ArrayHelper::merge($buttons, $this->buttons);
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		return $this->render('viewer', [
			'options' => $this->options,
			'url'     => $this->url,
			'buttons' => $this->buttons,
			'id'      => $this->id
		]);
	}
}
