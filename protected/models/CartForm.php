<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class CartForm extends CFormModel {
    public $product_id;
    public $qty;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // product_id and qty are required
            array('product_id, qty', 'required'),
            // qty needs to be a integer
            array('qty, product_id', 'numerical'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'qty' => 'Qty',
            'product_id' => 'Product ID'
        );
    }
}
