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
		$module   = $this->module;
		$title    = $module->title;
		$sections = $module->sections;
		if (Yii::$app->request->getIsPost()) {
			/** @var array $widgetSections */
			$widgetSections = Yii::$app->request->post();
			if (isset($widgetSections[Yii::$app->request->csrfParam])) {
				unset($widgetSections[Yii::$app->request->csrfParam]);
			}

			foreach ($widgetSections as $sectionId => $show) {
				$widgetSections[$sectionId] = $show != 0;
			}
			$sections = array_merge($sections, $widgetSections);
		}

		return $this->render('index', [
			'title'    => $title,
			'sections' => $sections,
		]);
	}
}
