<?php

/**
 * This is the model class for table "pegawai".
 *
 * The followings are the available columns in table 'pegawai':
 * @property integer $id_pegawai
 * @property string $nama_pegawai
 * @property string $alamat_pegawai
 * @property integer $no_telepon
 * @property string $username
 * @property string $password
 * @property string $jabatan
 */
class Pegawai extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pegawai';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pegawai, nama_pegawai, alamat_pegawai, no_telepon, username, password, jabatan', 'required'),
			array('id_pegawai, no_telepon', 'numerical', 'integerOnly'=>true),
			array('nama_pegawai, alamat_pegawai, username, password, jabatan', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pegawai, nama_pegawai, alamat_pegawai, no_telepon, username, password, jabatan', 'safe', 'on'=>'search'),
			array('username','namavalidasi'),
			array('id_pegawai','idpegawaivalidasi'),
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

	public function beforeSave()
	 {
		if(parent::beforeSave())
		{
			$this->password = inc::enkrip($this->password);
			return true;
		}
	 }
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pegawai' => 'Id Pegawai',
			'nama_pegawai' => 'Nama Pegawai',
			'alamat_pegawai' => 'Alamat Pegawai',
			'no_telepon' => 'No Telepon',
			'username' => 'Username',
			'password' => 'Password',
			'jabatan' => 'Jabatan',
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

		$criteria->compare('id_pegawai',$this->id_pegawai);
		$criteria->compare('nama_pegawai',$this->nama_pegawai,true);
		$criteria->compare('alamat_pegawai',$this->alamat_pegawai,true);
		$criteria->compare('no_telepon',$this->no_telepon);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('jabatan',$this->jabatan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pegawai the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTypeOptions()
 	{
		return CHtml::listData(Lookup::model()->findAll('type=:type', array(':type'=>"jabatan")),'value','nama_lookup');
	}
	
	public function namavalidasi($attribute)
	{
		$data = Yii::app()->db->createCommand()
				->select('username')
				->from('pegawai')
				->queryAll();
		foreach($data as $d){
			if($this->$attribute==$d['username'])
			{
				$this->addError('username', 'Username sudah digunakan');
				return false; 
			}
		}				
		
	}
	
	public function idpegawaivalidasi($attribute)
	{
		$data = Yii::app()->db->createCommand()
				->select('id_pegawai')
				->from('pegawai')
				->queryAll();
		foreach($data as $d){
			if($this->$attribute==$d['id_pegawai']){
				$this->addError('id_pegawai', 'ID Pegawai sudah digunakan');
				return false;
			}
		}				
		
	}
	
}
