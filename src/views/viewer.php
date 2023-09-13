<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/** @var \yii\web\View $this */
/** @var string $id */
/** @var string $moduleId */
/** @var string $url */
/** @var array $options */
/** @var array $buttons */

$url = Url::to(["/{$moduleId}", 'file' => Url::to($url)]);

$this->registerJs(<<< JS
	$("#pdfjs-form-{$id}").submit();
JS);

$form = ActiveForm::begin([
	'id'      => "pdfjs-form-{$id}",
	'action'  => $url,
	'options' => [
		'class'  => 'form-horizontal',
		'target' => "pdfjs-{$id}",
	],
]);

foreach ($buttons as $btn => $value) {
	echo $value == false ? Html::hiddenInput($btn, 0) : null;
}

ActiveForm::end();

echo Html::tag(
	'iframe',
	'',
	ArrayHelper::merge([
		'id'   => "pdfjs-{$id}",
		'name' => "pdfjs-{$id}",
	], $options)
);
