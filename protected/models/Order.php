<?php

/**
 * This is the model class for table "{{order}}".
 *
 * The followings are the available columns in table '{{order}}':
 * @property integer $id
 * @property integer $employee_id
 * @property string $customer_name
 * @property integer $zipcode
 * @property integer $qty
 * @property double $total
 * @property integer $status
 * @property integer $order_date
 */
class Order extends CActiveRecord
{
    const PENDING_ORDER_STATUS=1;
    const PROCESSING_ORDER_STATUS=2;
    const COMPLETED_ORDER_STATUS=3;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{order}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('employee_id, customer_name, zipcode', 'required'),
			array('employee_id, zipcode, qty, status, order_date', 'numerical', 'integerOnly'=>true),
			array('total', 'numerical'),
			array('customer_name', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, employee_id, customer_name, zipcode, qty, total, status, order_date', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employee' => array(
                self::BELONGS_TO, 'Employee', 'employee_id'
            ),

            'items' => array(
                self::HAS_MANY, 'LineItem', 'order_id',
            ),
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'employee_id' => 'Employee',
			'customer_name' => 'Customer Name',
			'zipcode' => 'Zipcode',
			'qty' => 'Qty',
			'total' => 'Total',
			'status' => 'Status',
			'order_date' => 'Order Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('employee_id',$this->employee_id);

		$criteria->compare('customer_name',$this->customer_name,true);

		$criteria->compare('zipcode',$this->zipcode);

		$criteria->compare('qty',$this->qty);

		$criteria->compare('total',$this->total);

		$criteria->compare('status',$this->status);

		$criteria->compare('order_date',$this->order_date);

		return new CActiveDataProvider('Order', array(
			'criteria'=>$criteria,
		));
	}

    /**
	 * Returns the static model of the specified AR class.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Retrieve a list of of items in a $type (ex. Employee)
     * @param $type
     * @return array of items.
     */
    public static function listItem($type) {
        $items = array();
        if ($type) {
            $models = $type::model()->findAll();
            foreach ($models as $model) {
                $items[$model->id] = $model->name;
            }
        }
        return $items;
    }
}