<?php

class CartController extends Controller {

    /**
     * Lists all cart items.
     */
    public function actionIndex() {
        $cart = new ShoppingCart;
        $cart->update();
        $this->render('index', array(
                'cart' => $cart)
        );
    }

    /**
     * Lists all cart items.
     */
    public function actionCheckout() {
        $order = new Order;
        $cart = new ShoppingCart;
        $cart->update();
        $this->render('//order/create', array(
            'cart' => $cart,
            'model' => $order
            )
        );
    }

    /**
     * Remove product from cart.
     */
    public function actionRemove($product) {
        $cart = new ShoppingCart;
        if (isset($product)) {
            $cart->remove($product);
        }

        $this->render('index', array(
                'cart' => $cart
            )
        );
    }

    /**
     * Empty the cart.
     */
    public function actionEmpty() {
        $cart = new ShoppingCart;
        $cart->emptyCart();
        $this->render('index', array(
                'cart' => $cart
            )
        );
    }

    // -----------------------------------------------------------
    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}