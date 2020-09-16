<?php

namespace diecoding\pdfjs\controllers;

use diecoding\pdfjs\Module;
use Yii;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

/**
 * @inheritdoc
 * 
 * @author Die Coding (Sugeng Sulistiyawan) <diecoding@gmail.com>
 * @copyright 2020 Die Coding
 * @license MIT
 * @link https://www.diecoding.com
 * @version 1.0.0
 */
class DefaultController extends Controller
{
	/**
	 * @inheritDoc
	 */
	public $layout = 'main';

	/**
	 * Renders the index view for the module
	 * @return string
	 */
	public function actionIndex()
	{
		$module    = new Module();
		$buttons   = $module->buttons;
		$waterMark = $module->waterMark;
		if (Yii::$app->request->isPost) {

			$widgitButtonConfig = Yii::$app->request->post();
			if (isset(Yii::$app->request->csrfParam)) {
				unset($widgitButtonConfig[Yii::$app->request->csrfParam]);
			}

			foreach ($widgitButtonConfig as $key => $value) {
				$widgitButtonConfig[$key] = trim($value) == '0' ? false : true;
			}
			$buttons = ArrayHelper::merge($buttons, $widgitButtonConfig);
		}

		return $this->render('index', [
			'buttons'   => $buttons,
			'waterMark' => $waterMark,
		]);
	}
}
