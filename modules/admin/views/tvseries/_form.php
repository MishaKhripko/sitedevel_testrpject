<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tvseries */
/* @var $form yii\widgets\ActiveForm */
?>

<?php if(isset($img)) : ?>
	<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
	    <?= $form->field($img, 'imageFile')->fileInput() ?>
	    <button>Submit</button>
	<?php ActiveForm::end() ?>
<?php endif; ?>


<div class="tvseries-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
