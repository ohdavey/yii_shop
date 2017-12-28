<?php
$this->breadcrumbs = array(
    'Orders'=>array('admin'),
    $model->id,
);

$this->menu = array(
    array('label' => 'List Order', 'url' => array('index')),
    array('label' => 'Create Order', 'url' => array('create')),
    array('label' => 'Update Order', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Order', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => Yii::t('zii', 'Are you sure you want to delete this item?'))),
    array('label' => 'Manage Order', 'url' => array('admin')),
);
?>

<h1>View Order #<?php echo $model->id; ?></h1>
<?php if (Yii::app()->user->hasFlash('OrderSubmitted')): ?>
    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('OrderSubmitted'); ?>
    </div>
<?php endif; ?>
<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'employee.name',
        'customer_name',
        'zipcode',
        'qty',
        array(
            'label' => 'Total',
            'type' => 'raw',
            'value' => money_format('$%i', $model->total),
        ),
        'status',
        array(
            'label' => 'Created',
            'type' => 'raw',
            'value' => date("F d, Y", $model->order_date),
        )
    ),
)); ?>
<hr>
<div class="products">
    <table class="detail-view">
        <thead>
        <tr>
            <td></td>
            <td><strong>Title</strong></td>
            <td><strong>Qty</strong></td>
            <td><strong>Price</strong></td>
        </tr>
        </thead>
        <?php $i; ?>
        <?php foreach ($model->items as $item): ?>
            <?php $i++; ?>
            <tr class="<?php echo $i % 2 ? 'odd' : 'even'; ?>">
                <td><?php echo $i; ?></td>

                <td>
                    <?php echo $item->product->title; ?>
                </td>
                <td><?php echo $item->qty; ?></td>
                <td><?php echo money_format('$%i', $item->product->price) . " ea.";
                ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>