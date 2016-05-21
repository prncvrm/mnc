<?php

namespace app\controllers;

use Yii;
use app\models\service1;
use app\models\service2;
use app\models\service3;
use app\models\Service3Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Service3Controller implements the CRUD actions for service3 model.
 */
class Service3Controller extends Controller
{	

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all service3 models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest)
		{return $this->render('/site/index.php');}
        $searchModel = new Service3Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single service3 model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new service3 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
		/*$model_1 = $this->findModel1($id);
		if ($key != $model_1->auth_key){
			return $this->redirect('index.php');
		}*/
        $model = new service3();
		//if (empty($id)){return $this->redirect('index.php?r=service1/create');}
		
        if ($model->load(Yii::$app->request->post())) {
			$model->id = $id;
			$model->save();
            return $this->render('/site/index.php', ['message' => "Registered Succesfully"]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    /**
     * Updates an existing service3 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //$model = $this->findModel($id);
		$model = new service3();
			return $this->redirect(array('service3/create','model'=>$model));	
		if($model == null){
			
			
		}	
        if ($model->load(Yii::$app->request->post())) {
			$model->id = $id;
			$model->save();
			return $this->redirect(['index', 'message' => "Registered Succesfully"]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing service3 model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the service3 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return service3 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = service3::findOne($id)) !== null) {
            return $model;
        } else {
            return null;
		}
    }
	protected function findModel1($id)
    {
        if (($model = service1::findOne($id)) !== null) {
            return $model;
        } else {
           // throw new NotFoundHttpException('The requested page does not exist.');
			return null; //returning null in order to redirect the page to create
		}
    }
}
