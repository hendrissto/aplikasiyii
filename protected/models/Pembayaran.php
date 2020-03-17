<?php

/**
 * This is the model class for table "pembayaran".
 *
 * The followings are the available columns in table 'pembayaran':
 * @property integer $id_pembayaran
 * @property string $tgl_pembayaran
 * @property integer $total_pembayaran
 * @property integer $id_periksa
 */
class Pembayaran extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pembayaran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pembayaran, tgl_pembayaran, total_pembayaran, id_periksa', 'required'),
			array('id_pembayaran, total_pembayaran, id_periksa', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pembayaran, tgl_pembayaran, total_pembayaran, id_periksa', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pembayaran' => 'Id Pembayaran',
			'tgl_pembayaran' => 'Tgl Pembayaran',
			'total_pembayaran' => 'Total Pembayaran',
			'id_periksa' => 'Id Periksa',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_pembayaran',$this->id_pembayaran);
		$criteria->compare('tgl_pembayaran',$this->tgl_pembayaran,true);
		$criteria->compare('total_pembayaran',$this->total_pembayaran);
		$criteria->compare('id_periksa',$this->id_periksa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pembayaran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
