<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
use yii\widgets\MaskedInput;

?>

 

<?php $form = ActiveForm::begin(); ?>	

        <?php Modal::begin([
        'header' => '<h3>Привязать телефон</h3>',
        'toggleButton' => ['class' => 'btn btn-primary', 'label' => 'Add phone']
		])?> 
		<?= $form->field($rest, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
       'mask' => '+7(999) 999 99 99',
        ]) ?>
		
		<?= $form->field($rest, 'phone_digital')?>
        <?= Html::submitButton('Add', ['class' => 'btn btn-primary']) ?>
		
        <?php  Modal::end(); ?>

		<?php ActiveForm::end(); ?>
		
		
