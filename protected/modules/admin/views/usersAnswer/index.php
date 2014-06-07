<?php
/* @var $this UsersAnswerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Users Answers',
);

$this->menu=array(
	array('label'=>'Create UsersAnswer', 'url'=>array('create')),
	array('label'=>'Manage UsersAnswer', 'url'=>array('admin')),
);
?>

<h1>Users Answers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
