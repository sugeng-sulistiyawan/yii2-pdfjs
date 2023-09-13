<?php

namespace diecoding\pdfjs;

use Yii;
use yii\base\Widget;

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
	 * @var string
	 */
	public $width = '100%';

	/**
	 * @var string
	 */
	public $height = '500px';

	/**
	 * @var string
	 */
	public $background = 'rgba(212, 212, 215, 1)';

	/**
	 * @var array
	 */
	public $options = [];

	/**
	 * Show or hide section container
	 * 
	 * @var array
	 */
	public $sections = [];

	/**
	 * @inheritdoc
	 */
	public function init()
	{
		parent::init();

		/** @var Module $module */
		$module         = Yii::$app->getModule($this->moduleId);
		$sections       = $module->sections;
		$this->sections = array_merge($sections, $this->sections);
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if (!isset($this->options['style'])) {
			$this->options['style']['background-color'] = $this->background;
			$this->options['style']['width']            = $this->width;
			$this->options['style']['height']           = $this->height;
		}

		return $this->render('viewer', [
			'id'       => $this->id,
			'moduleId' => $this->moduleId,
			'url'      => $this->url,
			'options'  => $this->options,
			'sections' => $this->sections,
		]);
	}
}
