<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'product-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.
    </p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'department_id'); ?>
        <?php echo $form->dropDownList($model, 'department_id', Product::listItem('Department')); ?>
        <?php echo $form->error($model, 'department_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_id'); ?>
        <?php echo $form->dropDownList($model, 'category_id', Product::listItem('ProductCategory')); ?>
        <?php echo $form->error($model, 'category_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'vendor_id'); ?>
        <?php echo $form->dropDownList($model, 'vendor_id', Product::listItem('Vendor')); ?>
        <?php echo $form->error($model, 'vendor_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 60, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'price'); ?>
        <?php echo $form->textField($model, 'price'); ?>
        <?php echo $form->error($model, 'price'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->