<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\KeyValue */
/* @var $form yii\widgets\ActiveForm */
/* @var $key string */
$title = stristr($key, '_', true) ?? '';
$this->title = Yii::t('seo', $title ?? $_GET['slug']);
?>

<div class="key-value-form">
	<h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['method' => 'post', 'action' => 'save']); ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true, 'value' => $key ?? '']) ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6, 'value' => \common\models\KeyValue::getValue($key) ?? '']) ?>

    <?= $form->field($model, 'dt_add')->hiddenInput(['value' => time()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('seo', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
