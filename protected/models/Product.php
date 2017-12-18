<?php

/**
 * This is the model class for table "{{product}}".
 *
 * The followings are the available columns in table '{{product}}':
 * @property integer $id
 * @property integer $department_id
 * @property integer $category_id
 * @property integer $vendor_id
 * @property string $title
 * @property double $price
 */
class Product extends CActiveRecord {
    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{product}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('department_id, category_id, vendor_id, title, price', 'required'),
            array('department_id, category_id, vendor_id', 'numerical', 'integerOnly' => true),
            array('price', 'numerical'),
            array('title', 'length', 'max' => 128),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, department_id, category_id, vendor_id, title, price', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'vendor' => array(self::BELONGS_TO, 'Vendor', 'vendor_id'),
            'department' => array(self::BELONGS_TO, 'Department', 'department_id'),
            'category' => array(self::BELONGS_TO, 'ProductCategory', 'category_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'department_id' => 'Department',
            'category_id' => 'Category',
            'vendor_id' => 'Vendor',
            'title' => 'Title',
            'price' => 'Price',
        );
    }

    public function getUrl()
    {
        return Yii::app()->createUrl('product/view', array(
            'id'=>$this->id,
            'title'=>$this->title,
        ));
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
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('department_id', $this->department_id);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('vendor_id', $this->vendor_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('price', $this->price);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Product the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Retrieve a list of of items in a $type (ex. Vendors)
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

    /**
     * Action to perform after a new product is added.
     */
    protected function afterSave()
    {
        parent::afterSave();
        $inventory = new Inventory;
        $inventory->product_id = $this->id;
        $inventory->qty = 0;
        $inventory->updated = time();
        $inventory->save();
    }


}
