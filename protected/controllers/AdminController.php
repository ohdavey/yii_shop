<?php

class AdminController extends Controller
{
	public function actionCategory()
	{
		$this->render('category');
	}

	public function actionDepartment()
	{
		$this->render('department');
	}

	public function actionEmployee()
	{
		$this->render('employee');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionInventory()
	{
        $model = new Inventory('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Product']))
            $model->attributes = $_GET['Product'];

        $this->render('inventory', array(
            'model' => $model,
        ));
	}

	public function actionProduct()
	{
		$this->render('product');
	}

	public function actionUser()
	{
		$this->render('user');
	}

	public function actionVendor()
	{
		$this->render('vendor');
	}

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