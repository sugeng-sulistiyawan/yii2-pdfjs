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
	 * Show or hide section container id
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
	 * ```$('#{$sectionId}').hide();```;
	 * 
	 * @var array
	 */
	public $sections = [
		'outerContainer' => true,
		'sidebarContainer' => true,
		'toolbarSidebar' => true,
		'toolbarSidebarLeft' => true,
		'sidebarViewButtons' => true,
		'viewThumbnail' => true,
		'viewOutline' => true,
		'viewAttachments' => true,
		'viewLayers' => true,
		'toolbarSidebarRight' => true,
		'outlineOptionsContainer' => true,
		'currentOutlineItem' => true,
		'sidebarContent' => true,
		'thumbnailView' => true,
		'outlineView' => true,
		'attachmentsView' => true,
		'layersView' => true,
		'sidebarResizer' => true,
		'mainContainer' => true,
		'findbar' => true,
		'findbarInputContainer' => true,
		'findInput' => true,
		'findPrevious' => true,
		'findNext' => true,
		'findbarOptionsOneContainer' => true,
		'findHighlightAll' => true,
		'findMatchCase' => true,
		'findbarOptionsTwoContainer' => true,
		'findMatchDiacritics' => true,
		'findEntireWord' => true,
		'findbarMessageContainer' => true,
		'findResultsCount' => true,
		'findMsg' => true,
		'editorHighlightParamsToolbar' => true,
		'highlightParamsToolbarContainer' => true,
		'editorHighlightColorPicker' => true,
		'highlightColorPickerLabel' => true,
		'editorHighlightThickness' => true,
		'editorFreeHighlightThickness' => true,
		'editorHighlightVisibility' => true,
		'editorHighlightShowAll' => true,
		'editorFreeTextParamsToolbar' => true,
		'editorFreeTextColor' => true,
		'editorFreeTextFontSize' => true,
		'editorInkParamsToolbar' => true,
		'editorInkColor' => true,
		'editorInkThickness' => true,
		'editorInkOpacity' => true,
		'editorStampParamsToolbar' => true,
		'editorStampAddImage' => true,
		'secondaryToolbar' => true,
		'secondaryToolbarButtonContainer' => true,
		'secondaryOpenFile' => true,
		'secondaryPrint' => true,
		'secondaryDownload' => true,
		'presentationMode' => true,
		'viewBookmark' => true,
		'viewBookmarkSeparator' => true,
		'firstPage' => true,
		'lastPage' => true,
		'pageRotateCw' => true,
		'pageRotateCcw' => true,
		'cursorToolButtons' => true,
		'cursorSelectTool' => true,
		'cursorHandTool' => true,
		'scrollModeButtons' => true,
		'scrollPage' => true,
		'scrollVertical' => true,
		'scrollHorizontal' => true,
		'scrollWrapped' => true,
		'spreadModeButtons' => true,
		'spreadNone' => true,
		'spreadOdd' => true,
		'spreadEven' => true,
		'documentProperties' => true,
		'toolbarContainer' => true,
		'toolbarViewer' => true,
		'toolbarViewerLeft' => true,
		'sidebarToggle' => true,
		'viewFind' => true,
		'previous' => true,
		'next' => true,
		'pageNumber' => true,
		'numPages' => true,
		'toolbarViewerRight' => true,
		'editorModeButtons' => true,
		'editorHighlight' => true,
		'editorFreeText' => true,
		'editorInk' => true,
		'editorStamp' => true,
		'editorModeSeparator' => true,
		'print' => true,
		'download' => true,
		'secondaryToolbarToggle' => true,
		'toolbarViewerMiddle' => true,
		'zoomOut' => true,
		'zoomIn' => true,
		'scaleSelectContainer' => true,
		'scaleSelect' => true,
		'pageAutoOption' => true,
		'pageActualOption' => true,
		'pageFitOption' => true,
		'pageWidthOption' => true,
		'customScaleOption' => true,
		'loadingBar' => true,
		'viewerContainer' => true,
		'viewer' => true,
		'dialogContainer' => true,
		'passwordDialog' => true,
		'passwordText' => true,
		'password' => true,
		'passwordCancel' => true,
		'passwordSubmit' => true,
		'documentPropertiesDialog' => true,
		'fileNameLabel' => true,
		'fileNameField' => true,
		'fileSizeLabel' => true,
		'fileSizeField' => true,
		'titleLabel' => true,
		'titleField' => true,
		'authorLabel' => true,
		'authorField' => true,
		'subjectLabel' => true,
		'subjectField' => true,
		'keywordsLabel' => true,
		'keywordsField' => true,
		'creationDateLabel' => true,
		'creationDateField' => true,
		'modificationDateLabel' => true,
		'modificationDateField' => true,
		'creatorLabel' => true,
		'creatorField' => true,
		'producerLabel' => true,
		'producerField' => true,
		'versionLabel' => true,
		'versionField' => true,
		'pageCountLabel' => true,
		'pageCountField' => true,
		'pageSizeLabel' => true,
		'pageSizeField' => true,
		'linearizedLabel' => true,
		'linearizedField' => true,
		'documentPropertiesClose' => true,
		'altTextDialog' => true,
		'altTextContainer' => true,
		'overallDescription' => true,
		'dialogLabel' => true,
		'dialogDescription' => true,
		'addDescription' => true,
		'descriptionButton' => true,
		'descriptionAreaLabel' => true,
		'descriptionTextarea' => true,
		'markAsDecorative' => true,
		'decorativeButton' => true,
		'decorativeLabel' => true,
		'buttons' => true,
		'altTextCancel' => true,
		'altTextSave' => true,
		'printServiceDialog' => true,
		'printCancel' => true,
		'printContainer' => true,
	];

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
