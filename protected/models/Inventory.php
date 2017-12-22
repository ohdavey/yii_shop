<?php

/**
 * This is the model class for table "{{inventory}}".
 *
 * The followings are the available columns in table '{{inventory}}':
 * @property integer $id
 * @property integer $product_id
 * @property integer $qty
 * @property integer $updated
 */
class Inventory extends CActiveRecord {

    public $product_search;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{inventory}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('product_id, qty, updated', 'required'),
            array('product_id, qty, updated', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, product_search, qty, updated', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'product' => array(self::BELONGS_TO, 'Product', 'product_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'product_id' => 'Product',
            'qty' => 'Qty',
            'updated' => 'Updated',
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
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->with = array('product');
        $criteria->compare('product.title', $this->product_search, true, 'OR');
        $criteria->compare('qty', $this->qty);
        $criteria->compare('updated', $this->updated);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'product_search' => array(
                        'asc' => 'product.title',
                        'desc' => 'product.title DESC',
                    ),
                ),
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Inventory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }


    /**
     * Reformat the way date is is displayed.
     */
    protected function afterFind() {
        // convert to display format
        $this->updated = date("m-d-Y h:m a", $this->updated);

        parent::afterFind();
    }

    /**
     * Update inventory item
     */
    public function updateInventory($item, $qty) {
        $inventory_item = self::model()->findByAttributes(array('product_id' => $item));
        if ($inventory_item) {
            $inventory_item->qty = $inventory_item->qty - $qty;
            $inventory_item->updated = time();
            if ($inventory_item->validate()) {
                $inventory_item->save();
            }
        }
    }
}
