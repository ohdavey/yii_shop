<?php
/* @var $this ProductController */
/* @var $dataProvider CActiveDataProvider */
/* @var $cart */

$this->breadcrumbs = array(
    'Products',
);

$this->menu = array(
    array('label' => 'Create Product', 'url' => array('create')),
    array('label' => 'Manage Product', 'url' => array('admin')),
);

?>

<h1>Products</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $dataProvider,
    'columns' => array(
        array(
            'class' => 'CLinkColumn',
            'labelExpression' => '$data->id', // this line is fine!
            'urlExpression' => '$data->url'
        ),
        'title',
        'category.name',
        'vendor.name',
        'price',
    ),
));
?>
<hr/>

