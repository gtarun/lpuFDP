<?php
/* @var $this UsersAnswerController */
/* @var $model UsersAnswer */

$this->breadcrumbs=array(
	'Users Answers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsersAnswer', 'url'=>array('index')),
	array('label'=>'Create UsersAnswer', 'url'=>array('create')),
	array('label'=>'View UsersAnswer', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsersAnswer', 'url'=>array('admin')),
);
?>

<h1>Update UsersAnswer <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
