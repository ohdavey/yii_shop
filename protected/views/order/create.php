<?php
$this->breadcrumbs=array(
	'Orders',
	'Create',
);

$this->menu=array(
	array('label'=>'List Order', 'url'=>array('index')),
	array('label'=>'Manage Order', 'url'=>array('admin')),
);
?>
<style>

    table.table-view {
        background: white;
        border-collapse: collapse;
        width: 100%;
        margin: 0;
    }

    table.table-view tr.odd {
        background: #E5F1F4;
    }

    table.table-view tr.even {
        background: #F8F8F8;
    }
</style>
<h1>Create Order</h1>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'order-form',
        'action' => CHtml::normalizeUrl(array('order/create')),
        'enableAjaxValidation'=>false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'employee_id'); ?>
        <?php echo $form->dropDownList($model, 'employee_id', Order::listItem('Employee')); ?>
        <?php echo $form->error($model,'employee_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'customer_name'); ?>
        <?php echo $form->textField($model,'customer_name',array('size'=>60,'maxlength'=>128)); ?>
        <?php echo $form->error($model,'customer_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'zipcode'); ?>
        <?php echo $form->textField($model,'zipcode',array('size'=>60,
            'maxlength'=>128)); ?>
        <?php echo $form->error($model,'zipcode'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<hr>
<h1>Cart Summary</h1>
<div class="cart">
    <table class="table-view">
        <?php $i; ?>
        <?php foreach ($cart->items as $item): ?>
            <?php $i++; ?>
            <tr class="<?php echo $i % 2 ? 'odd' : 'even'; ?>">
                <td><?php echo $item['product']['id']; ?></td>
                <td><?php echo $item['product']['title']; ?></td>
                <td><?php echo $item['qty']; ?></td>
                <td><?php echo money_format('$%i',$item['product']['price']); ?></td>
                <td><?php echo money_format('$%i', ($item['product']['price'] * $item['qty'])); ?></td>
                <td><a href="<?php echo CHtml::normalizeUrl(array('cart/remove', 'product' => $item['product']['id']));?>">X</a</td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td>
            </td>
        </tr>

        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Subtotal:</td>
            <td><?php echo money_format('$%i', $cart->subtotal); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Tax:</td>
            <td><?php echo money_format('$%i', $cart->tax); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>shipping:</td>
            <td><?php echo money_format('$%i', $cart->shipping); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total Balance:</strong></td>
            <td><?php echo money_format('$%i', $cart->total); ?></td>
        </tr>
    </table>
</div>
