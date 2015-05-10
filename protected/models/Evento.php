<?php

/**
 * This is the model class for table "Evento".
 *
 * The followings are the available columns in table 'Evento':
 * @property string $id
 * @property string $paciente_aid
 * @property string $descripcion
 * @property string $fechaInicio_ft
 * @property integer $estatus_did
 * @property string $usuario_did
 * @property string $fechaCreacion_ft
 *
 * The followings are the available model relations:
 * @property Paciente $paciente
 * @property Usuario $usuario
 */
class Evento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Evento the static model class
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
		return 'Evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('paciente_aid, fechaInicio_ft, fechaFin_ft, estatus_did, usuario_did', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('paciente_aid, usuario_did', 'length', 'max'=>11),
			array('descripcion', 'length', 'max'=>100),
			array('fechaCreacion_ft', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, paciente_aid, descripcion, fechaInicio_ft, fechaFin_ft, estatus_did, usuario_did, fechaCreacion_ft', 'safe', 'on'=>'search'),
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
			'paciente' => array(self::BELONGS_TO, 'Paciente', 'paciente_aid'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
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
			'descripcion' => 'Descripción',
			'fechaInicio_ft' => 'Fecha/Hora Cita',
			'fechaFin_ft' => 'Fecha/Hora Término',
			'estatus_did' => 'Estatus',
			'usuario_did' => 'Médico',
			'fechaCreacion_ft' => 'Fecha Creación',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fechaInicio_ft',$this->fechaInicio_ft,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('usuario_did',$this->usuario_did,true);
		$criteria->compare('fechaCreacion_ft',$this->fechaCreacion_ft,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}