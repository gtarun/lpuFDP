<?php
/* @var $this UsersAnswerController */
/* @var $model UsersAnswer */

$this->breadcrumbs=array(
	'Users Answers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsersAnswer', 'url'=>array('index')),
	array('label'=>'Manage UsersAnswer', 'url'=>array('admin')),
);
?>

<h1>Create UsersAnswer</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
