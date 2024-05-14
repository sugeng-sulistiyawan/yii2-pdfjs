<?php

use diecoding\pdfjs\Module;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var \yii\web\View $this */
/** @var string $url */
/** @var string $title */
/** @var string $widgetId */
/** @var Module $module */
/** @var array $options */
/** @var array $sections */

$moduleId = $module->id;

$this->registerJs(<<<JS
	$("#{$moduleId}-form-{$widgetId}").submit();
JS);

$form = ActiveForm::begin([
	'id' => "{$moduleId}-form-{$widgetId}",
	'action' => ["/{$moduleId}", 'file' => $url],
	'options' => [
		'target' => "{$moduleId}-iframe-{$widgetId}",
	],
]);

Html::hiddenInput('title', $title);

foreach ($sections as $section => $show) {
	echo $show ? '' : Html::hiddenInput($section, 0);
}

ActiveForm::end();

echo Html::tag(
	"iframe",
	'',
	ArrayHelper::merge([
		'id' => "{$moduleId}-iframe-{$widgetId}",
		'name' => "{$moduleId}-iframe-{$widgetId}",
	], $options)
);
