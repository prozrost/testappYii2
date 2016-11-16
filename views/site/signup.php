<?php
use \yii\widgets\ActiveForm;
 ?>
 <?php
$form = ActiveForm::begin(['class'=>'form-horizontal']);
?>
<?= $form->field($model,'email')->textInput(['autofocus'=>true]);?>
<?= $form->field($model, 'password')->passwordInput();?>
<?= $form->field($model, 'name')->textInput();?>
<div>
<button type="submit" class="btn btn-primary"> Submit </button>
</div>
 <?php
 ActiveForm::end();
  ?>
