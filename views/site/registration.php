<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form ActiveForm */
?>
<div class="clients-index">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($registration, 'First_name') ?>
        <?= $form->field($registration, 'Last_name') ?>
        <?= $form->field($registration, 'Age') ?>
		
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- clients-index -->
