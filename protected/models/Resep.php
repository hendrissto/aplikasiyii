<?php

/**
 * This is the model class for table "resep".
 *
 * The followings are the available columns in table 'resep':
 * @property integer $kode_resep
 * @property string $tgl_resep
 * @property integer $id_obat
 * @property integer $jumlah
 */
class Resep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'resep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tgl_resep, id_obat, jumlah', 'required'),
			array('id_obat, jumlah', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('kode_resep, tgl_resep, id_obat, jumlah', 'safe', 'on'=>'search'),
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
			'kode_resep' => 'Kode Resep',
			'tgl_resep' => 'Tgl Resep',
			'id_obat' => 'Id Obat',
			'jumlah' => 'Jumlah',
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

		$criteria->compare('kode_resep',$this->kode_resep);
		$criteria->compare('tgl_resep',$this->tgl_resep,true);
		$criteria->compare('id_obat',$this->id_obat);
		$criteria->compare('jumlah',$this->jumlah);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Resep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTypeOptions()
 	{
      return CHtml::listData(Obat::model()->findAll(),'id_obat','nama_obat');
 	}
}
