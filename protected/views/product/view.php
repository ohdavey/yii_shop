<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs = array(
    'Products' => array('index'),
    $model->title,
);

$this->menu = array(
    array('label' => 'List Product', 'url' => array('index')),
    array('label' => 'Create Product', 'url' => array('create')),
    array('label' => 'Update Product', 'url' => array('update', 'id' => $model->id)),
    array('label' => 'Delete Product', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' => 'Manage Product', 'url' => array('admin')),
);
?>
<h1>View Product #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'department.name',
        'category.name',
        'vendor.name',
        'title',
        'price',
    ),
)); ?>
<?php if(Yii::app()->user->hasFlash('limitedInventory')): ?>
    <div class="flash-error">
        <?php echo Yii::app()->user->getFlash('limitedInventory'); ?>
    </div>
<?php endif; ?>
<div class="form">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cart-form',
        'action' => CHtml::normalizeUrl(array('product/add')),
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.
    </p>

    <div class="row">
        <?php echo $form->hiddenField($cart, 'product_id', array('value' => $model->id)); ?>
        <?php echo $form->error($cart, 'product_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($cart, 'qty'); ?>
        <?php echo $form->dropDownList($cart, 'qty', array(
                1 => "1",
                2 => "2",
                3 => "3",
                4 => "4",
                5 => "5",
                6 => "6",
                7 => "7",
                8 => "8",
                9 => "9",
                10 => "10",
            )); ?>
        <?php echo $form->error($cart, 'qty'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Add'); ?>
    </div>

    <?php $this->endWidget(); ?>
</div><!-- form -->
