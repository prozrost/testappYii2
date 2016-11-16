<?php
use \yii\widgets\ActiveForm;
 ?>
 <?php
$form = ActiveForm::begin(['class'=>'form-horizontal']);
?>
<?= $form->field($post_model,'post_title')->textInput(['autofocus'=>true]);?>
<?= $form->field($post_model, 'post_text')->textInput();?>
<div>
<button type="submit" class="btn btn-primary"> Создать новую запись </button>
</div>
 <?php
 ActiveForm::end();
  ?>
