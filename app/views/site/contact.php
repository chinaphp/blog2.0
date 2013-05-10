<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Captcha;

$this->title = Yii::$app->name . ' - Contact Us';

$this->params['breadcrumbs']=array(
    'Contact',
);

?>

<h1>Contact Us</h1>

<?php if(Yii::$app->session->hasFlash('contact')): ?>
<div class="alert alert-success">
	<?php echo Yii::$app->session->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<?php $form=$this->beginWidget(ActiveForm::className(), array(
	'options' => array('class' => 'form-horizontal'),
	'fieldConfig' => array('inputOptions' => array('class' => 'input-xlarge')),
)); ?>

	<?php echo $form->field($model,'name')->textInput(); ?>
	<?php echo $form->field($model,'email')->textInput(); ?>
	<?php echo $form->field($model,'subject')->textInput(array('size'=>60,'maxlength'=>128)); ?>
	<?php echo $form->field($model,'body')->textArea(array('rows' => 6, 'cols'=>50)); ?>
	<?php
		$field = $form->field($model, 'verifyCode');
		echo $field->begin();
		echo $field->label();
		$this->widget(Captcha::className());
		echo Html::activeTextInput($model, 'verifyCode', array('class' => 'input-medium'));
		echo $field->error();
		echo $field->end();
	?>
	<div class="form-actions">
		<?php echo Html::submitButton('Submit', null, null, array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

<?php endif; ?>
