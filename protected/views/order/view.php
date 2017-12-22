<?php
$this->breadcrumbs=array(
	'Orders'=>array('admin'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Create Order', 'url'=>array('create')),
	array('label'=>'Update Order', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Order', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('zii','Are you sure you want to delete this item?'))),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>
<?php if(Yii::app()->user->hasFlash('OrderSubmitted')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('OrderSubmitted'); ?>
    </div>
<?php endif; ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'employee_id',
		'customer_name',
		'zipcode',
		'qty',
		'total',
		'status',
		'order_date',
	),
)); ?>
