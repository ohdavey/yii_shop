<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'View Inventory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Inventory', 'url'=>array('admin')),
);
?>

<h1>Update <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>