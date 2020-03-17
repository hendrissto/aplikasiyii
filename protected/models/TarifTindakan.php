<?php

/**
 * This is the model class for table "tarif_tindakan".
 *
 * The followings are the available columns in table 'tarif_tindakan':
 * @property integer $id_tarif_tindakan
 * @property string $nama_pasien
 * @property integer $harga
 */
class TarifTindakan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarif_tindakan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tarif_tindakan, id_tindakan, harga', 'required'),
			array('id_tarif_tindakan, id_tindakan, harga', 'numerical', 'integerOnly'=>true),
			
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tarif_tindakan, id_tindakan, harga', 'safe', 'on'=>'search'),
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
			'tindakanPasien'=>array(self::MANY_MANY, 'Tindakan', 'id_tindakan'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tarif_tindakan' => 'Id Tarif Tindakan',
			'id_tindakan' => 'ID Tindakan',
			'harga' => 'Harga',
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

		$criteria->compare('id_tarif_tindakan',$this->id_tarif_tindakan);
		$criteria->compare('id_tindakan',$this->id_tindakan);
		$criteria->compare('harga',$this->harga);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TarifTindakan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getTypeOptions()
 	{
      return CHtml::listData(Tindakan::model()->findAll(),'id_tindakan','nama_tindakan');
 	}
}
