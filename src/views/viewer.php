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
/** @var array $sections */

$url = Url::to(["/{$moduleId}", 'file' => Url::to($url, true)], true);

$this->registerJs(<<< JS
	$("#{$moduleId}-form-{$id}").submit();
JS);

$form = ActiveForm::begin([
	'id'      => "{$moduleId}-form-{$id}",
	'action'  => $url,
	'options' => [
		'target' => "{$moduleId}-{$id}",
	],
]);

foreach ($sections as $sectionId => $show) {
	echo $show ? '' : Html::hiddenInput($sectionId, 0);
}

ActiveForm::end();

echo Html::tag(
	'iframe',
	'',
	ArrayHelper::merge([
		'id'   => "{$moduleId}-{$id}",
		'name' => "{$moduleId}-{$id}",
	], $options)
);
