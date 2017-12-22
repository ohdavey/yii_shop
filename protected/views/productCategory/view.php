<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('admin'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'Create ProductCategory', 'url'=>array('create')),
	array('label'=>'Update ProductCategory', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductCategory', 'url'=>array('admin')),
);
?>

<h1>View ProductCategory #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        'productCount'
	),

));

?>
<hr>
<div class="products">
    <table class="detail-view">
        <thead>
            <th align="left">Id</th>
            <th>Title</th>
            <th>Price</th>
        </tr>
        </thead>
        <?php $i; ?>
        <?php foreach ($model->products as $product): ?>
            <?php $i++; ?>
            <tr class="<?php echo $i % 2 ? 'odd' : 'even'; ?>">
                <td><?php echo $product->id; ?></td>

                <td>
                    <?php echo $product->title; ?>
                </td>
                <td><?php echo money_format('$%i', $product->price); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>