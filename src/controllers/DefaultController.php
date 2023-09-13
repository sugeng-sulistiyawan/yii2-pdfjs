<?php

namespace diecoding\pdfjs\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the PdfJs Module.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2023
 */
class DefaultController extends Controller
{
	/**
	 * @inheritDoc
	 */
	public $layout = 'main';

	/**
	 * Renders the index view for the module
	 * 
	 * @return string
	 */
	public function actionIndex()
	{
		/** @var \diecoding\pdfjs\Module $module */
		$module  = $this->module;
		$title   = $module->title;
		$buttons = $module->buttons;
		if (Yii::$app->request->getIsPost()) {

			/** @var array $widgetButtonConfig */
			$widgetButtonConfig = Yii::$app->request->post();
			if (isset($widgetButtonConfig[Yii::$app->request->csrfParam])) {
				unset($widgetButtonConfig[Yii::$app->request->csrfParam]);
			}

			foreach ($widgetButtonConfig as $key => $value) {
				$widgetButtonConfig[$key] = trim($value) == '0' ? false : true;
			}
			$buttons = array_merge($buttons, $widgetButtonConfig);
		}

		return $this->render('index', [
			'title'   => $title,
			'buttons' => $buttons,
		]);
	}
}
