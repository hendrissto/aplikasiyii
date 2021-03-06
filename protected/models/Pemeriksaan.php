<?php

/**
 * This is the model class for table "pemeriksaan".
 *
 * The followings are the available columns in table 'pemeriksaan':
 * @property integer $id_pemeriksaan
 * @property string $keluhan
 * @property string $riwayat_keluarga
 * @property string $riwayat_obat
 * @property string $periksa_fisik
 * @property string $tekanan_darah
 * @property string $suhu_tubuh
 * @property string $detak_jantung
 */
class Pemeriksaan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pemeriksaan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' keluhan, riwayat_keluarga, riwayat_obat, periksa_fisik, tekanan_darah, suhu_tubuh, detak_jantung,  tanggal_pemeriksaan, dokter', 'required'),
			array('id_pemeriksaan', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_pemeriksaan, keluhan, riwayat_keluarga, riwayat_obat, periksa_fisik, tekanan_darah, suhu_tubuh, detak_jantung, tanggal_pemeriksaan, dokter', 'safe', 'on'=>'search'),
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
			'id_pemeriksaan' => 'Id Pemeriksaan',
			'keluhan' => 'Keluhan',
			'riwayat_keluarga' => 'Riwayat Keluarga',
			'riwayat_obat' => 'Riwayat Obat',
			'periksa_fisik' => 'Periksa Fisik',
			'tekanan_darah' => 'Tekanan Darah',
			'suhu_tubuh' => 'Suhu Tubuh',
			'detak_jantung' => 'Detak Jantung',
			'id_periksa' => 'ID Periksa',
			'tanggal_pemeriksaan' => 'Tanggal Pemeriksaan',
			'dokter' => 'Dokter',
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

		$criteria->compare('id_pemeriksaan',$this->id_pemeriksaan);
		$criteria->compare('keluhan',$this->keluhan,true);
		$criteria->compare('riwayat_keluarga',$this->riwayat_keluarga,true);
		$criteria->compare('riwayat_obat',$this->riwayat_obat,true);
		$criteria->compare('periksa_fisik',$this->periksa_fisik,true);
		$criteria->compare('tekanan_darah',$this->tekanan_darah,true);
		$criteria->compare('suhu_tubuh',$this->suhu_tubuh,true);
		$criteria->compare('detak_jantung',$this->detak_jantung,true);
		$criteria->compare('id_periksa',$this->id_periksa,true);
		$criteria->compare('tanggal_pemeriksaan',$this->tanggal_pemeriksaan);
		$criteria->compare('dokter',$this->dokter);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pemeriksaan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTypeOptions()
 	{
		return CHtml::listData(Pegawai::model()->findAll('jabatan=:jabatan', array(':jabatan'=>"dokter")),'nama_pegawai','nama_pegawai');
	}
}
