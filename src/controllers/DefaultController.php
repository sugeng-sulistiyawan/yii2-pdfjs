<?php

namespace diecoding\pdfjs\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the PdfJs Module.
 * 
 * @link [sugeng-sulistiyawan.github.io](sugeng-sulistiyawan.github.io)
 * @author Sugeng Sulistiyawan <sugeng.sulistiyawan@gmail.com>
 * @copyright Copyright (c) 2024
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
	public function actionIndex($file)
	{
		$title = 'PDF Viewer';
		$sections = [];
		if (Yii::$app->request->getIsPost()) {
			/** @var array $sections */
			$sections = Yii::$app->request->post();
			$title = $sections['title'] ?? 'PDF Viewer: ' . $file;
			unset($sections[Yii::$app->request->csrfParam]);
			unset($sections['title']);

			foreach ($sections as $section => $show) {
				$sections[$section] = $show != 0;
			}
		}

		return $this->render('index', [
			'title' => $title,
			'sections' => $sections,
		]);
	}
}
