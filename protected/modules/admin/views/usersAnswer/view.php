<?php
/* @var $this UsersAnswerController */
/* @var $model UsersAnswer */

$this->breadcrumbs=array(
	'Users Answers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsersAnswer', 'url'=>array('index')),
	array('label'=>'Create UsersAnswer', 'url'=>array('create')),
	array('label'=>'Update UsersAnswer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsersAnswer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsersAnswer', 'url'=>array('admin')),
);
?>

<h1>View UsersAnswer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'question_id',
		'answer_id',
	),
)); ?>
