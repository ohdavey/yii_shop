<?php

/**
 * ShoppingCart class.
 * ShoppingCart is the data structure for keeping
 * items that you added to the cart.
 */
class ShoppingCart {

    public $items;
    public $subtotal;
    public $qty;
    public $tax;
    public $shipping;
    public $total;

    /**
     * Initialize the session.
     */
    public function __construct() {
        if (isset($_SESSION['cart'])) {
            $this->items = $_SESSION['cart']['items'];
        } else {
            session_start();
            $this->items = array();
        }
    }

    /**
     * Get the tax rate by a given $zip_code
     * @params integer $zip_code
     * @return integer
     */
    public function taxByZipCode($zip_code) {
        $default_sales_tax_rate = 0.07;
        $sales_tax_rates_by_zip_codes = array(
            33781 => 0.05,
            34759 => 0.10,
        );
        if (in_array($zip_code, $sales_tax_rates_by_zip_codes)) {
            return $sales_tax_rates_by_zip_codes[$zip_code];
        } else {
            return $default_sales_tax_rate;
        }
    }

    /**
     * Calculate tax rate
     * @param  integer $zip_code
     * @param integer $subtotal
     * @return integer
     */
    private function zipCodeTaxRate($zip_code, $subtotal) {
        $default_sales_tax_rate = 0.07;
        $sales_tax_rates = array(
            33781 => 0.05,
            34759 => 0.10,
        );
        if (in_array($zip_code, $sales_tax_rates)) {
            return $subtotal * $sales_tax_rates[$zip_code];
        } else {
            return $subtotal * $default_sales_tax_rate;
        }
    }

    /**
     * Calculates shipping rate
     * @params integer $zip_code
     * @return integer
     */
    private function shippingRate($zip_code) {
        $default_shipping_rate = 0.00;
        $shipping_rates = array(
            33781 => 7.05,
            34759 => 10.10,
        );
        if (in_array($zip_code, $shipping_rates)) {
            return $shipping_rates[$zip_code];

        } else {
            return $default_shipping_rate;
        }
    }

    /**
     * Calculates cart's total by getting the sum of the subtotal, tax and
     * shipping
     * @param integer $subtotal
     * @param integer $tax
     * @param integer $shipping
     * @return integer
     */
    private function calcTotal($subtotal, $tax, $shipping) {
        $values = array_sum(array($subtotal, $tax, $shipping));


        return $values;
    }

    /**
     * Update the cart
     * @return CartForm session
     */
    public function update() {

        $items = ($this->items) ? $this->items : $_SESSION['cart']['items'];
        $items_total = array(0);
        $items_qty = array(0);
        $zip_code = 33781;
        foreach ($items as $item) {
            $unit_price = $item['product']['price'];
            $qty = $item['qty'];
            $items_total[] = ($unit_price * $qty);
            $items_qty[] = $qty;
        }

        $this->subtotal = array_sum($items_total);
        $this->qty = array_sum($items_qty);
        $this->tax = $this->zipCodeTaxRate($zip_code, $this->subtotal);
        $this->shipping = $this->shippingRate($zip_code);
        $this->total = $this->calcTotal($this->subtotal, $this->tax,
            $this->shipping);

        $this->items = $items;
        $cart = array(
            'items' => $this->items,
            'balance' => array(
                'subtotal' => $this->subtotal,
                'qty' => $this->qty,
                'tax' => $this->tax,
                'shipping' => $this->shipping
            ),
            'total' => $this->total
        );

        $_SESSION['cart'] = $cart;

        return $cart;
    }

    /**
     * Add an product {$item} to the cart
     * @param $item
     */
    public function add($item) {
        if ($this->exist($item)) {
            return $this->updateQty($item);
        }

        $this->items[$item['product']['id']] = $item;
        $this->update();

    }

    /**
     * Check if $item already exist in the cart.
     * @param integer $item
     * @return boolean
     */
    public function exist($item) {
        return ($this->items[$item['product']['id']]) ? true : false;
    }

    /**
     * Update item's qty
     * @param $item
     */
    public function updateQty($item) {
        $this->items[$item['product']['id']]['qty'] = $this->items[$item['product']['id']]['qty'] + $item['qty'];
        $this->update();
    }

    /**
     * Remove item
     * @param $item
     */
    public function remove($item) {
        unset($this->items[$item]);
        unset($_SESSION['cart']['items'][$item]);
        $this->update();
    }

    /**
     * Empty Cart
     */
    public function emptyCart() {
        unset($_SESSION['CartForm']);
        return;
    }
}