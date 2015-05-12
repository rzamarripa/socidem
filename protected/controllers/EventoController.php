<?php

class EventoController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','geteventos','listar','cambiar','actualizar'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Evento;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evento']))
		{
			
			$model->attributes=$_POST['Evento'];
			$model->estatus_did = 1;
			if($model->save())
				$this->redirect(array('index'));
		} 
		else if(isset($_POST["title"]))
		{
			$model->nombre=$_POST['title'];
			$model->fechaInicio_ft=$_POST['start'];
			$model->fechaFin_ft=$_POST['end'];
			$model->estatus_did = 1;
			if($model->save())
				$this->redirect(array('index'));
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
	public function actionUpdate()
	{	
		
		if(isset($_POST["id"])){
			$model=$this->loadModel($_POST["id"]);
			$model->nombre=$_POST['title'];
			$model->fechaInicio_ft=$_POST['start'];
			$model->fechaFin_ft=$_POST['end'];
			$model->estatus_did = 1;
		}else{
			$model=$this->loadModel($_POST["id_"]);
			$model->fechaInicio_ft=$_POST['fechaInicio_ft'];
			$model->fechaFin_ft=$_POST['fechaFin_ft'];
			$model->estatus_did = 1;
		}
		
		if($model->save())
				$this->redirect(array('index'));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
	}
	
	public function actionActualizar($id)
	{	
		
		$model=$this->loadModel($id);
		$usuarioActual = Usuario::model()->obtenerUsuarioActual();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evento']))
		{
			$model->attributes = $_POST["Evento"];
			if($model->save())
				$this->redirect(array('index'));
		}
		
		$this->render("update", array("model"=>$model,'usuarioActual'=>$usuarioActual));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete()
	{
		$model = $this->loadModel($_POST["id_"]);
		$model->estatus_did = 3;
		if($model->save())
			$this->redirect(array("index"));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model = new Evento;

		if(isset($_POST["Evento"]))
		{
			$usuarioActual = Usuario::model()->obtenerUsuarioActual();
			if($usuarioActual->tipoUsuario_did > 3){
				$model->usuario_did = $usuarioActual->id;
			}
			$model->attributes = $_POST["Evento"];			
			$model->estatus_did = 1;

			if($model->save()){
				Yii::app()->user->setFlash("info","Se agregó la cita: " . $model->id . " al paciente: " . $model->paciente->nombre . " " . $model->paciente->apellidos . ".");
				$this->redirect(array("index"));
			}
		}else{
			$medicos = Usuario::model()->findAll("tipoUsuario_did >= 3");
			$dataProvider=new CActiveDataProvider('Evento');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
				'model'=>$model,
				'medicos'=>$medicos,
			));
		}
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evento']))
			$model->attributes=$_GET['Evento'];

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
		$model=Evento::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='evento-form')
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
			$criteria->select=array('id', "CONCAT_WS(' ',nombre) as nombre");
			$criteria->condition="lower(CONCAT_WS(' ',nombre)) like lower(:nombre) ";
			$criteria->params=array(':nombre'=>$q);
			$criteria->limit='10';
	    $cursor = Evento::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
		
	public function actionGeteventos()
	{
		$result = array();
		$cursor = Evento::model()->findAll("estatus_did = 1 order by fechaInicio_ft asc");
		foreach ($cursor as $valor)	
			$result[]=Array('id' => $valor->id,
											'title' => $valor->paciente->nombre . " " . $valor->paciente->apellidos ,
			                'start' => $valor->fechaInicio_ft,
 			                'end' => $valor->fechaFin_ft,
			                'description' => $valor->descripcion,
			                'acciones'=> CHtml::link("Prueba",array(),array("class"=>"btn btn-sm")),
			                'tip' => '<strong>' . $valor->paciente->nombre . " " . $valor->paciente->apellidos . "</strong><br/>" . 
			                					$valor->descripcion . "<br/>".
			                					"<strong>Inicia :</strong> " . date("d-m-Y H:i A", strtotime($valor->fechaInicio_ft)) . "<br/>".
			                					"<strong>Termina:</strong> " . date("d-m-Y H:i A", strtotime($valor->fechaFin_ft)));
    echo json_encode($result);
    Yii::app()->end();
	}
	
	public function actionListar()
	{
		$usuarioActual = Usuario::model()->obtenerUsuarioActual();
		if($usuarioActual->tipoUsuario_did == 1){
			$eventos = Evento::model()->findAll(array("order" =>"fechaInicio_ft asc"));
		} else {
			$eventos = Evento::model()->findAll("usuario_did = " . $usuarioActual->id . "  order by fechaInicio_ft asc");
		}
		$this->render("listar",array("eventos"=>$eventos));
	}
	
	public function actionCambiar($id){
		if(isset($_GET["estatus"])){
			$model = $this->loadModel($id);
			$model->estatus_did = $_GET["estatus"];
			if($model->save()){
				if($model->estatus_did == 1)
					Yii::app()->user->setFlash("info","Se reactivó la cita del paciente: " . $model->paciente->nombre . ".");
				else if($model->estatus_did == 3)
					Yii::app()->user->setFlash("danger","Se canceló la cita del paciente: " . $model->paciente->nombre . ".");
				else
					Yii::app()->user->setFlash("success","Pasó a consulta el paciente: " . $model->paciente->nombre . ".");
					Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Cambió de Estatus de la cita " . $model->paciente->nombre . " a " . $model->estatus->nombre . "', '" . Yii::app()->user->name . "')")->execute();
				$this->redirect(array("evento/listar"));
			}
		}
	}

}
