<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;
use yii\widgets\Pjax;
?>

<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

<div class="clients-index">

    <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($registration, 'first_name') ?>
        <?= $form->field($registration, 'last_name') ?>
        <?= $form->field($registration, 'age') ?>
	
	
		<div class="form-group" align = "">
		

        <?php Modal::begin([
        'header' => '<h3>Привязать телефон</h3>',
        'toggleButton' => ['class' => 'btn btn-primary', 'label' => 'Add phone']
		])?> 
		<?= $form->field($registration, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
       'mask' => '+7(999) 999 99 99',
        ]) ?>
		
		<?= $form->field($registration, 'phone_digital')?>
    
	    <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
		
        <?php  Modal::end(); ?>

	<?= Html::submitButton('Regist', ['class' => 'btn btn-primary']) ?>
		</div>
    <?php ActiveForm::end(); ?>

</div><!-- clients-index -->
</div>
