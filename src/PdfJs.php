<?php

namespace diecoding\pdfjs;

use Yii;
use yii\base\InvalidConfigException;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

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
	 * @var string
	 */
	public $url;

	/**
	 * @var string
	 */
	public $title;

	/**
	 * @var array
	 */
	public $options = [];

	/**
	 * Show or hide section container
	 * Example:
	 * 
	 * ```php
	 * 'sections' => [
	 * 	 'presentationMode' => true,
	 * 	 'print' => true,
	 * 	 'download' => true,
	 * 	 'secondaryToolbarToggle' => true,
	 * ],
	 * ```
	 * 
	 * This equivalent to:
	 * ```$('#{$sectionId}').remove();```;
	 * 
	 * @var array
	 */
	public $sections = [];

	/**
	 * @return Module
	 * @throws InvalidConfigException
	 */
	protected function getPdfJsModule()
	{
		$moduleClass = Module::class;
		foreach (Yii::$app->getModules(false) as $id => $module) {
			$class = is_array($module) ? $module['class'] : $module::class;
			if ($class === $moduleClass) {
				return Yii::$app->getModule($id);
			}
		}

		throw new InvalidConfigException('PDFJs module must be an application module.');
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		$module = $this->getPdfJsModule();
		$defaultOptions = $module->defaultOptions;
		$defaultSections = $module->defaultSections;

		$defaultOptions = ArrayHelper::merge($defaultOptions, [
			'style' => [
				'width' => '100%',
				'height' => '480px',
				'background-color' => 'rgba(212, 212, 215, 1)',
				'border' => 'none',
			],
		]);

		if (isset($this->options['style'])) {
			$style = $this->options['style'];
			unset($this->options['style']);

			Html::addCssStyle($defaultOptions, $style);
		}
		$this->options = ArrayHelper::merge($defaultOptions, $this->options);
		$this->sections = ArrayHelper::merge($defaultSections, $this->sections);

		return $this->render('viewer', [
			'url' => $this->url,
			'title' => $this->title,
			'widgetId' => $this->getId(),
			'module' => $this->getPdfJsModule(),
			'options' => $this->options,
			'sections' => $this->sections,
		]);
	}
}
