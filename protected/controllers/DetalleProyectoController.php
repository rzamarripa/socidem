<?php

class DetalleProyectoController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','cambiar'),
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
		$model=new DetalleProyecto;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['DetalleProyecto']))
		{
			$model->attributes=$_POST['DetalleProyecto'];
			$model->proyecto_did = $_GET["id"];
			if(!isset($_GET["ayuda"]))
				$model->responsable_did = $model->proyecto->responsable_did;
			if($model->save()){
				Yii::app()->user->setFlash("info","Se agregó una actividad el proyecto: " . $model->proyecto->nombre . ".");
				$proyecto = Proyecto::model()->find("id = " . $model->proyecto_did);
				if($proyecto->estatus_did == 2){
					$proyecto->estatus_did = 1;
					if($proyecto->save())
						Yii::app()->user->setFlash("info","El proyecto: " . $proyecto->nombre . " se volvió a poner en Proceso, debido a que tiene más de 1 actividad en pendiente");
				}
				$this->redirect(array('create','id'=>$model->proyecto_did));
			}
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

		if(isset($_POST['DetalleProyecto']))
		{
			$model->attributes=$_POST['DetalleProyecto'];
			if($model->save()){
				if(isset($_GET["ver"]))
					$this->redirect(array("proyecto/view",'id'=>$model->proyecto_did));
				else
					$this->redirect(array("proyecto/index"));
			}				
		}

		$this->render('update',array(
			'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('DetalleProyecto');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new DetalleProyecto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['DetalleProyecto']))
			$model->attributes=$_GET['DetalleProyecto'];

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
		$model=DetalleProyecto::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='detalle-proyecto-form')
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
	       	$cursor = DetalleProyecto::model()->findAll($criteria);
			foreach ($cursor as $valor)	
				$result[]=Array('label' => $valor->nombre,  
				                'value' => $valor->nombre,
				                'id' => $valor->id, );
	    }
	    echo json_encode($result);
	    Yii::app()->end();
	}
	
	public function actionCambiar($id){
		if(isset($_GET["estatus"])){
			$model = $this->loadModel($id);
			$model->estatus_did = $_GET["estatus"];
			if($model->save()){				
				if($model->estatus_did == 1){
					Yii::app()->user->setFlash("warning","No se ha realizado la actividad: " . $model->nombre . " del Proyecto " . $model->proyecto->nombre);
					$proyecto = Proyecto::model()->find("id = " . $model->proyecto_did);
					if($proyecto->estatus_did == 2){
						$proyecto->estatus_did = 1;
						if($proyecto->save())
							Yii::app()->user->setFlash("info","El proyecto: " . $proyecto->nombre . " se volvió a poner en Proceso, debido a que tiene más de 1 actividad en pendiente");
					}
				}
					
				else{
					Yii::app()->user->setFlash("info","Se realizó la actividad: " . $model->nombre . " del Proyecto " . $model->proyecto->nombre);
					$criteria = new CDbCriteria();
					$criteria->condition = "estatus_did = 2 && proyecto_did = " . $model->proyecto_did;
					$actividadesTotales = DetalleProyecto::model()->count("proyecto_did = " . $model->proyecto_did);
					$actividadesRealizadas = DetalleProyecto::model()->count($criteria);				
					if($actividadesTotales == $actividadesRealizadas){
						$proyecto = Proyecto::model()->find("id = " . $model->proyecto_did);
						$proyecto->estatus_did = 2;
						if($proyecto->save()){
							Yii::app()->user->setFlash("info","Se completó el proyecto: " . $proyecto->nombre);
							Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Se completó el proyecto: " . $proyecto->nombre ."', '" . Yii::app()->user->name ."')")->execute();
						}
					}
				}
				Yii::app()->db->createCommand("insert into Actividad (mensaje, usuario) Values ('Cambió de Estatus de la actividad " . $model->nombre  . " del Proyecto " . $model->proyecto->nombre . " a " . $model->estatus->nombre . "', '" . Yii::app()->user->name . "')")->execute();
				if(isset($_GET["ver"]))
					$this->redirect(array("proyecto/view",'id'=>$model->proyecto_did));
				if(isset($_GET["accion"]))
					$this->redirect(array("proyecto/otros"));
				else
					$this->redirect(array("proyecto/index"));
			}
		}
	}
}
