<?php

/**
 * This is the model class for table "ConsultaGinecologo".
 *
 * The followings are the available columns in table 'ConsultaGinecologo':
 * @property string $id
 * @property string $paciente_aid
 * @property string $fecha_f
 * @property double $presionSanguinea
 * @property double $peso
 * @property double $temperatura
 * @property double $frecuenciaRespiratoria
 * @property double $pulso
 * @property string $fechaUltimaMenstruacion_f
 * @property string $sintomas
 * @property string $diagnostico
 * @property string $tratamiento
 * @property string $notas
 * @property string $estatus_did
 * @property string $fechaCreacion_ft
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Paciente $paciente
 */
class ConsultaGinecologo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ConsultaGinecologo the static model class
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
		return 'ConsultaGinecologo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('presionSanguinea, peso, temperatura, frecuenciaRespiratoria, pulso', 'numerical'),
			array('paciente_aid, estatus_did', 'length', 'max'=>10),
			array('fecha_f, fechaUltimaMenstruacion_f, sintomas, diagnostico, tratamiento, notas, fechaCreacion_ft', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, paciente_aid, fecha_f, presionSanguinea, peso, temperatura, frecuenciaRespiratoria, pulso, fechaUltimaMenstruacion_f, sintomas, diagnostico, tratamiento, notas, estatus_did, fechaCreacion_ft', 'safe', 'on'=>'search'),
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
			'presionSanguinea' => 'Presion Sanguinea',
			'peso' => 'Peso',
			'temperatura' => 'Temperatura',
			'frecuenciaRespiratoria' => 'Frecuencia Respiratoria',
			'pulso' => 'Pulso',
			'fechaUltimaMenstruacion_f' => 'Fecha Ultima Menstruacion F',
			'sintomas' => 'Sintomas',
			'diagnostico' => 'Diagnostico',
			'tratamiento' => 'Tratamiento',
			'notas' => 'Notas',
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
		$criteria->compare('presionSanguinea',$this->presionSanguinea);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('temperatura',$this->temperatura);
		$criteria->compare('frecuenciaRespiratoria',$this->frecuenciaRespiratoria);
		$criteria->compare('pulso',$this->pulso);
		$criteria->compare('fechaUltimaMenstruacion_f',$this->fechaUltimaMenstruacion_f,true);
		$criteria->compare('sintomas',$this->sintomas,true);
		$criteria->compare('diagnostico',$this->diagnostico,true);
		$criteria->compare('tratamiento',$this->tratamiento,true);
		$criteria->compare('notas',$this->notas,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('fechaCreacion_ft',$this->fechaCreacion_ft,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}