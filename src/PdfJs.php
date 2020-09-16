<?php

namespace diecoding\pdfjs;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
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
class PdfJs extends \yii\base\Widget
{
	/**
	 *
	 * @var string $url
	 */
	public $url;

	/**
	 *
	 * @var array $options
	 */
	public $options = [];

	/**
	 *
	 * @var array $buttons
	 */
	public $buttons = [];

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();
		$this->view->registerAssetBundle(PdfJsAsset::className());

		$module        = Yii::$app->getModule('pdfjs');
		$buttons       = $module->buttons;
		$this->buttons = ArrayHelper::merge($buttons, $this->buttons);
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if (!array_key_exists('style', $this->options)) {
			$this->options['style'] = 'border:solid 2px #404040; width:' . $this->width . '; height:' . $this->height . ';';
		}

		return $this->render('viewer', [
			'options' => $this->options,
			'url'     => $this->url,
			'buttons' => $this->buttons,
			'id'      => $this->id
		]);
	}
}
