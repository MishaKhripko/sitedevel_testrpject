<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Season */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="season-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <label class="control-label">Select date start and finish season</label>
    <?= DatePicker::widget([
        'name' => 'Season[dateStart]',
        'value' => ($model->dateStart == '') ? '2000-01-01' : $model->dateStart,
        'type' => DatePicker::TYPE_RANGE,
        'name2' => 'Season[dateFinish]',
        'value2' => ($model->dateFinish == '') ? '2010-01-01' : $model->dateFinish,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);?>
    <?php if(isset($series) && !is_null($series)) : ?>
    	<?= Html::activeHiddenInput($model, 'tvseries_id', ['value' => $series]) ?>
    <?php else: ?>
    	<?php // $form->field($model, 'tvseries_id')->textInput() ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
