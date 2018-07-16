<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model common\models\Vacancy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vacancy-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_desc')->textInput(['maxlength' => true]) ?>

<!--    --><?//= $form->field($model, 'file')->textarea(['rows' => 6]) ?>

<!--    --><?//= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
	<?=$form->field( $model,'description' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1  ] ),
	] );?>
	
	<?=$form->field( $model,'demands' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1] ),
	] );?>
	
	<?=$form->field( $model,'conditions' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1] ),
	] );?>
	
	<?=$form->field( $model,'file' )->widget( CKEditor::className(),[
		'editorOptions' => ElFinder::ckeditorOptions( 'elfinder',['enterMode' => 2, 'forceEnterMode'=>false, 'shiftEnterMode'=>1] ),
	] );?>

<!--    --><?//= $form->field($model, 'options')->textInput() ?>
	<?=$form->field($model, 'options')->dropDownList([
		'0'=> 'Отключено',
		'1' => 'Показывать на главной',
		'2' => 'Показывать везде'
	],   [
		'prompt' => 'Выберите отображение'
	]);?>
    <?= $form->field($model, 'href')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'views')->textInput(['readonly' => true,'maxlength' => true]) ?>
	
    <?= $form->field($model, 'date')->textInput(['readonly' => true, 'value' => date('Y-m-d H:i:m')]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('vacancy', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
