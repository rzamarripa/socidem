<?php

/**
 * This is the model class for table "ConsultaPediatra".
 *
 * The followings are the available columns in table 'ConsultaPediatra':
 * @property string $id
 * @property string $paciente_aid
 * @property string $fecha_f
 * @property string $sintomas
 * @property string $notas
 * @property double $peso
 * @property double $altura
 * @property double $pc
 * @property double $temperatura
 * @property integer $fc
 * @property integer $fr
 * @property integer $ta
 * @property string $diagnostico
 * @property string $tratamiento
 * @property string $estatus_did
 * @property string $fechaCreacion_ft
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Paciente $paciente
 */
class ConsultaPediatra extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConsultaPediatra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ConsultaPediatra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fc, fr, ta', 'numerical', 'integerOnly'=>true),
			array('peso, altura, pc, temperatura', 'numerical'),
			array('paciente_aid', 'length', 'max'=>11),
			array('estatus_did', 'length', 'max'=>10),
			array('fecha_f, sintomas, notas, diagnostico, tratamiento, fechaCreacion_ft', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, paciente_aid, fecha_f, sintomas, notas, peso, altura, pc, temperatura, fc, fr, ta, diagnostico, tratamiento, estatus_did, fechaCreacion_ft', 'safe', 'on'=>'search'),
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
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'paciente' => array(self::BELONGS_TO, 'Paciente', 'paciente_aid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'paciente_aid' => 'Paciente',
			'fecha_f' => 'Fecha F',
			'sintomas' => 'Sintomas',
			'notas' => 'Notas',
			'peso' => 'Peso',
			'altura' => 'Altura',
			'pc' => 'Pc',
			'temperatura' => 'Temperatura',
			'fc' => 'Fc',
			'fr' => 'Fr',
			'ta' => 'Ta',
			'diagnostico' => 'Diagnostico',
			'tratamiento' => 'Tratamiento',
			'estatus_did' => 'Estatus',
			'fechaCreacion_ft' => 'Fecha Creacion Ft',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('paciente_aid',$this->paciente_aid,true);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('sintomas',$this->sintomas,true);
		$criteria->compare('notas',$this->notas,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('altura',$this->altura);
		$criteria->compare('pc',$this->pc);
		$criteria->compare('temperatura',$this->temperatura);
		$criteria->compare('fc',$this->fc);
		$criteria->compare('fr',$this->fr);
		$criteria->compare('ta',$this->ta);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('tratamiento',$this->tratamiento,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('fechaCreacion_ft',$this->fechaCreacion_ft,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}