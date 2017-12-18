<?php
/* @var $this ProductController */
/* @var $data Product */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('department_id')); ?>
        :</b>
    <?php echo CHtml::encode($data->department->name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>
        :</b>
    <?php echo CHtml::encode($data->category->name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('vendor_id')); ?>:</b>
    <?php echo CHtml::encode($data->vendor->name); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
    <?php echo CHtml::encode($data->title); ?>
    <br/>

    <b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
    <?php echo CHtml::encode($data->price); ?>
    <br/>
    <?php echo CHtml::ajaxSubmitButton('Add to cart', 'index.php?r=product/add', array(
        'data' => 'product_id=' . $data->id . '&qty=1',
        'method' => 'POST',
        'dataType' => 'json',
    )); ?>

    <br/>


</div>