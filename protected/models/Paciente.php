<?php

/**
 * This is the model class for table "Paciente".
 *
 * The followings are the available columns in table 'Paciente':
 * @property string $id
 * @property string $foto
 * @property string $nombre
 * @property string $apellidos
 * @property string $fechaNac_f
 * @property string $sexo
 * @property string $telefono
 * @property string $celular
 * @property string $correo
 * @property string $direccion
 * @property integer $peso
 * @property string $alergico
 * @property string $emergencia
 * @property string $grupoSanguineo
 * @property string $estatus_did
 * @property string $usuario_did
 * @property string $fechaCreacion_ft
 * @property string $observaciones
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Usuario $usuario
 */
class Paciente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Paciente the static model class
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
		return 'Paciente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apellidos, usuario_did', 'required'),
			array('peso', 'numerical', 'integerOnly'=>true),
			array('foto', 'length', 'max'=>200),
			array('nombre, apellidos, telefono, celular, correo, emergencia', 'length', 'max'=>100),
			array('sexo, grupoSanguineo', 'length', 'max'=>10),
			array('direccion', 'length', 'max'=>500),
			array('estatus_did, usuario_did', 'length', 'max'=>11),
			array('alergico, fechaCreacion_ft, observaciones, fechaNac_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, foto, nombre, apellidos, fechaNac_f, sexo, telefono, celular, correo, direccion, peso, alergico, emergencia, grupoSanguineo, estatus_did, usuario_did, fechaCreacion_ft, observaciones', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'foto' => 'Foto',
			'nombre' => 'Nombre',
			'apellidos' => 'Apellidos',
			'fechaNac_f' => 'Fecha de Nacimiento',
			'sexo' => 'Sexo',
			'telefono' => 'Teléfono',
			'celular' => 'Celular',
			'correo' => 'Correo',
			'direccion' => 'Dirección',
			'peso' => 'Peso',
			'alergico' => 'Alérgico',
			'emergencia' => 'Emergencia',
			'grupoSanguineo' => 'Grupo Sanguíneo',
			'estatus_did' => 'Estatus',
			'usuario_did' => 'Médico',
			'fechaCreacion_ft' => 'Creando en',
			'observaciones' => 'Observaciones',
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
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('fechaNac_f',$this->fechaNac_f,true);
		$criteria->compare('sexo',$this->sexo,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('alergico',$this->alergico,true);
		$criteria->compare('emergencia',$this->emergencia,true);
		$criteria->compare('grupoSanguineo',$this->grupoSanguineo,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('usuario_did',$this->usuario_did,true);
		$criteria->compare('fechaCreacion_ft',$this->fechaCreacion_ft,true);
		$criteria->compare('observaciones',$this->observaciones,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}