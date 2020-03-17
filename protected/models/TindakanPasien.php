<?php

/**
 * This is the model class for table "tindakan_pasien".
 *
 * The followings are the available columns in table 'tindakan_pasien':
 * @property integer $id_tindakan_pasien
 * @property integer $id_periksa
 * @property integer $id_tindakan
 */
class TindakanPasien extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tindakan_pasien';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' id_tindakan, tanggal', 'required'),
			array(' id_tindakan', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array(' id_tindakan, tanggal', 'safe', 'on'=>'search'),
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
			'id_tindakan' => 'Id Tindakan',
			'tanggal' => 'Tanggal',
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
		$criteria->compare('id_tindakan',$this->id_tindakan);
		$criteria->compare('tanggal',$this->tanggal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TindakanPasien the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTypeOptions()
 	{
      return CHtml::listData(Tindakan::model()->findAll(),'id_tindakan','nama_tindakan');
	 }
	 
	 public static function exportPdf()
    {
        $pdf = Yii::createComponent('application.extensions.tcpdf.tcpdf',
                            'P', 'cm', 'A4', true, 'UTF-8');
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor("Nicola Asuni");
        $pdf->SetTitle("TCPDF Example 002");
        $pdf->SetSubject("TCPDF Tutorial");
        $pdf->SetKeywords("TCPDF, PDF, example, test, guide");
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        //$pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont("times", "BI", 20);
        $pdf->Cell(0,10,"Example 002",1,1,'C');
        $pdf->Output("example_002.pdf", "I");
    }
}
