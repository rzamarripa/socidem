<?php

class PacienteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('autocompletesearch'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$usuarioActual = Usuario::model()->obtenerUsuarioActual();
		$paciente = Paciente::model()->find("id = " . $id);
		if($usuarioActual->tipoUsuario_did == 4){
     $consultas = ConsultaGinecologo::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 1){ 
     $consultas = array();
    }else if($usuarioActual->tipoUsuario_did == 5){ 
     $consultas = ConsultaPediatra::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 6){ 
     $consultas = ConsultaAlergologo::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 7){ 
     $consultas = ConsultaUrologo::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 8){ 
     $consultas = ConsultaDentista::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 9){ 
     $consultas = ConsultaNutriologo::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 10){ 
     $consultas = ConsultaOtorrino::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } else if($usuarioActual->tipoUsuario_did == 11){ 
     $consultas = ConsultaPsicologo::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
    } 
		$consultasBasicas = ConsultaBasica::model()->findAll("estatus_did = 1 && paciente_aid = " . $id);
		
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'consultas'=>$consultas,
			'consultasBasicas'=>$consultasBasicas,
			'usuarioActual'=>$usuarioActual,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Paciente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Paciente']))
		{
			$usuarioActual = Usuario::model()->obtenerUsuarioActual();
			if($usuarioActual->tipoUsuario_did > 3){
				$model->usuario_did = $usuarioActual->id;
			}
			$model->attributes=$_POST['Paciente'];
			$model->estatus_did= 1;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Paciente']))
		{
			$model->attributes=$_POST['Paciente'];

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
		$usuarioActual = Usuario::model()->obtenerUsuarioActual();
		$this->render('update',array(
			'model'=>$model,
			'usuarioActual'=>$usuarioActual,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		
		$usuarioActual = Usuario::model()->obtenerUsuarioActual();		
		if($usuarioActual->tipoUsuario_did == 1 || $usuarioActual->tipoUsuario_did == 2){
			
			$pacientes = Paciente::model()->findAll();
		}else{
	    $pacientes = Paciente::model()->findAll('estatus_did = 1 && usuario_did = '. $usuarioActual->id . ' order by fechaCreacion_ft desc');
		}
		
		$this->render('index',array(
			'pacientes'=>$pacientes,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Paciente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Paciente']))
			$model->attributes=$_GET['Paciente'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Paciente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='paciente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionAutocompletesearch()
	{
	    $q = "%". $_GET['term'] ."%";
	 	$result = array();
	    if (!empty($q))
	    {
			$criteria=new CDbCriteria;
			$criteria->select=array('id', "CONCAT_WS(' ',nombre,apellidos) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre,apellidos)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	       	$cursor = Paciente::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre . " " . $valor->apellidos,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	function CalculaEdad( $fecha ) {
		    list($Y,$m,$d) = explode("-",$fecha);
		    return ( date("md") < $m.$d ? date("Y")-$Y-1 : date("Y")-$Y );
		} 

}
