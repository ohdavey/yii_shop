<?php
/* @var $this InventoryController */
/* @var $model Inventory */

$this->breadcrumbs=array(
	'Inventories'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Update Inventory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Inventory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Inventory', 'url'=>array('admin')),
);
?>

<h1>View Inventory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        array(               // related city displayed as a link
            'label'=>'Product',
            'type'=>'raw',
            'value'=>CHtml::link(CHtml::encode($model->product->title),
                array('product/view','id'=>$model->product->id)),
        ),
		'qty',
        'updated',
	),
)); ?>
