<?php $form = ActiveForm::begin([
                    'enableAjaxValidation' => true,
                    'enableClientValidation' => false,
                    'validateOnBlur' => false,
                    'validateOnType' => false,
                    'validateOnChange' => false,
	]); ?>


		<div class="form-group">
		<?php Pjax::begin() ?>
		
		<?= $form->field($registration, 'add_phone')->checkbox(['tabindex' => '3']) ?>
		
		<?=$var?>
		
		<?php Pjax::end() ?>
 
		</div>
    <?php ActiveForm::end(); ?>