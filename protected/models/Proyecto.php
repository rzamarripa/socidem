<?php

/**
 * This is the model class for table "Proyecto".
 *
 * The followings are the available columns in table 'Proyecto':
 * @property string $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fechaInicio_ft
 * @property string $fechaFin_ft
 * @property string $responsable_did
 * @property string $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Usuario $responsable
 * @property Documento[] $documentos
 */
class Proyecto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Proyecto the static model class
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
		return 'Proyecto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion, fechaInicio_ft, fechaFin_ft, responsable_did, estatus_did', 'required'),
			array('nombre', 'length', 'max'=>100),
			array('responsable_did, estatus_did', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, fechaInicio_ft, fechaFin_ft, responsable_did, estatus_did', 'safe', 'on'=>'search'),
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
			'responsable' => array(self::BELONGS_TO, 'Usuario', 'responsable_did'),
			'documentos' => array(self::HAS_MANY, 'Documento', 'proyecto_did'),
			'categoria' => array(self::BELONGS_TO, 'Categoria', 'categoria_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'categoria_did' => 'Categoría',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'fechaInicio_ft' => 'Fecha Inicio Ft',
			'fechaFin_ft' => 'Fecha Fin Ft',
			'responsable_did' => 'Responsable',
			'estatus_did' => 'Estatus',
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
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('fechaInicio_ft',$this->fechaInicio_ft,true);
		$criteria->compare('fechaFin_ft',$this->fechaFin_ft,true);
		$criteria->compare('responsable_did',$this->responsable_did,true);
		$criteria->compare('estatus_did',$this->estatus_did,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}