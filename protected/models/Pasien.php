<?php

/**
 * This is the model class for table "pasien".
 *
 * The followings are the available columns in table 'pasien':
 * @property integer $no_identitas
 * @property string $nama_pasien
 * @property string $alamat_pasien
 * @property integer $no_telp
 * @property string $tgl_lahir
 */
class Pasien extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('no_identitas, nama_pasien, alamat_pasien, no_telp, tgl_lahir', 'required'),
			array('no_identitas, no_telp', 'numerical', 'integerOnly'=>true),
			array('nama_pasien, tgl_lahir', 'length', 'max'=>50),
			array('alamat_pasien', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('no_identitas, nama_pasien, alamat_pasien, no_telp, tgl_lahir', 'safe', 'on'=>'search'),
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
			'no_identitas' => 'No Identitas',
			'nama_pasien' => 'Nama Pasien',
			'alamat_pasien' => 'Alamat Pasien',
			'no_telp' => 'No Telp',
			'tgl_lahir' => 'Tgl Lahir',
			'no_rm' => 'no_rm',
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

		$criteria->compare('no_identitas',$this->no_identitas);
		$criteria->compare('nama_pasien',$this->nama_pasien,true);
		$criteria->compare('alamat_pasien',$this->alamat_pasien,true);
		$criteria->compare('no_telp',$this->no_telp);
		$criteria->compare('tgl_lahir',$this->tgl_lahir,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pasien the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
