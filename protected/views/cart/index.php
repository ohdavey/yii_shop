<?php

$this->breadcrumbs = array(
    'Shopping Cart',
); ?>
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
<h1>Shopping Cart</h1>
<div class="cart">
    <table class="table-view">
        <thead>
        <tr>
            <th>Title</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Total</th>
            <th>&nbsp;</th>
        </tr>
        </thead>
        <?php $i; ?>
        <?php foreach ($cart->items as $item): ?>
            <?php $i++; ?>
            <tr class="<?php echo $i % 2 ? 'odd' : 'even'; ?>">
                <td>
                    <a href="<?php echo CHtml::normalizeUrl(array('product/view', 'id' => $item['product']['id'])); ?>">
                        <?php echo $item['product']['title']; ?>
                    </a>
                </td>
                <td><?php echo $item['qty']; ?></td>
                <td><?php echo money_format('$%i', $item['product']['price']); ?></td>
                <td><?php echo money_format('$%i', ($item['product']['price'] * $item['qty'])); ?></td>
                <td>
                    <a href="<?php echo CHtml::normalizeUrl(array('cart/remove', 'product' => $item['product']['id'])); ?>">X</a>
                </td>
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
            <td>Subtotal:</td>
            <td><?php echo money_format('$%i', $cart->subtotal); ?></td>
        </tr>
        <tr>
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
            <td>shipping:</td>
            <td><?php echo money_format('$%i', $cart->shipping); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><strong>Total Balance:</strong></td>
            <td><?php echo money_format('$%i', $cart->total); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="<?php echo CHtml::normalizeUrl(array('product/index'));
                ?>">Continue Shopping</a> |
                <a href="<?php echo CHtml::normalizeUrl(array('cart/empty'));
                ?>">Empty Cart</a>
            </td>
            <td>
                <a href="<?php echo CHtml::normalizeUrl(array('cart/checkout'));
                ?>">
                    <button type="button"
                            class="button">Checkout
                    </button>
                </a></td>
        </tr>
    </table>
</div>
