<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="span-19">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="span-5 last">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();

            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Admin Menu',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => array(
                    array('label' => 'Inventory', 'url' => array('inventory/admin')),
                    array('label' => 'Orders', 'url' => array('order/admin')),
                    array('label' => 'Vendors', 'url' => array('vendor/admin')),
                    array('label' => 'Product', 'url' => array('product/admin')),
                    array('label' => 'Departmens', 'url' => array('department/admin')),
                ),
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
    </div>
<?php $this->endContent(); ?>