<?php

/**
 * This is the model class for table "DetalleProyecto".
 *
 * The followings are the available columns in table 'DetalleProyecto':
 * @property string $id
 * @property string $nombre
 * @property string $proyecto_did
 * @property integer $peso
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Proyecto $proyecto
 */
class DetalleProyecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleProyecto the static model class
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
		return 'DetalleProyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, peso, estatus_did', 'required'),
			array('peso', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			array('proyecto_did, estatus_did, responsable_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, proyecto_did, peso, estatus_did,responsable_did', 'safe', 'on'=>'search'),
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
			'proyecto' => array(self::BELONGS_TO, 'Proyecto', 'proyecto_did'),
			'responsable' => array(self::BELONGS_TO, 'Usuario', 'responsable_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'proyecto_did' => 'Proyecto',
			'peso' => 'Peso',
			'estatus_did' => 'Estatus',
			'responsable_did' => 'Responsable',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('proyecto_did',$this->proyecto_did,true);
		$criteria->compare('peso',$this->peso);
		$criteria->compare('estatus_did',$this->estatus_did,true);
		$criteria->compare('responsable_did',$this->responsable_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}