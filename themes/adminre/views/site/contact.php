<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

/*$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<h1>Contact Us</h1>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
If you have business inquiries or other questions, please fill out the following form to contact us. Thank you.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'body'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif;*/ ?>
<div class="light-wrapper page-title">
<div class="container inner">
<h1>Get In Touch</h1>
</div>
</div>
<div class="dark-wrapper">
<div class="container inner">
<div class="row">
<div class="col-sm-8">
  <h1 class="post-title">Feel Free to Drop Us a Line</h1>
  <p>Maecenas vehicula condimentum consequat. Ut suscipit ipsum eget leotero convallis feugiat upsoyut fermentum leo auctor consequat turpis aturo nisiper.</p>
  <div class="divide20"></div>
  <div class="form-container">
    <div class="response alert alert-success"></div>
    <form class="forms" action="contact/form-handler.php" method="post">
      <fieldset>
        <ol>
          <li class="form-row text-input-row name-field">
            <input type="text" name="name" class="text-input defaultText required" title="Name (Required)"/>
          </li>
          <li class="form-row text-input-row email-field">
            <input type="text" name="email" class="text-input defaultText required email" title="Email (Required)"/>
          </li>
          <li class="form-row text-input-row subject-field">
            <input type="text" name="subject" class="text-input defaultText" title="Subject"/>
          </li>
          <li class="form-row text-area-row">
            <textarea name="message" class="text-area required"></textarea>
          </li>
          <li class="form-row hidden-row">
            <input type="hidden" name="hidden" value="" />
          </li>
          <li class="nocomment">
            <label for="nocomment">Leave This Field Empty</label>
            <input id="nocomment" value="" name="nocomment" />
          </li>
          <li class="button-row">
            <input type="submit" value="Submit" name="submit" class="btn btn-submit bm0" />
          </li>
        </ol>
        <input type="hidden" name="v_error" id="v-error" value="Required" />
        <input type="hidden" name="v_email" id="v-email" value="Enter a valid email" />
      </fieldset>
    </form>
  </div>
  <!-- /.form-container -->
</div>
<!-- /.span8 -->
<aside class="col-sm-4 sidebar lp20">
  <div class="sidebox widget">
    <h3>Address</h3>
    <p>Fusce dapibus, tellus commodo, tortor mauris condimentum utellus fermentum, porta sem malesuada magna. Sed posuere consectetur est at lobortis. Morbi leo risus, porta ac consectetur.</p>
    <address>
    <strong>Moose, Inc.</strong><br>
    Moon Street Light Avenue, 14/05 <br>
    Jupiter, JP 80630<br>
    <abbr title="Phone">P:</abbr> (123) 456-7890 <br>
    <abbr title="Email">E:</abbr> <a href="mailto:#">first.last@email.com</a>
    </address>
  </div>
  <!-- /.widget -->
</aside>
<!-- /.span4 -->
</div>
<!-- /.row -->

</div>
<!-- /.container -->
</div>
