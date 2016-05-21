<?php

namespace app\controllers;

use Yii;
use app\models\service1;
use app\models\service2;
use app\models\service3;
use app\models\ServiceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * Service1Controller implements the CRUD actions for service1 model.
 */
class Service1Controller extends Controller
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
     * Lists all service1 models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest)
		{return $this->render('/site/index.php');}
        $searchModel = new ServiceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single service1 model.
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
     * Creates a new service1 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new service1();
		$model_2 = new service2();
		$model_3 = new service3();
        if ($model->load(Yii::$app->request->post())) {
			$model->resume_file = UploadedFile::getInstance($model, 'resume_file');
			
			//saving path
			$model->resume = 'resumes/'.$model->contact.'_resume.'.$model->resume_file->extension;
			$model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
			$model->auth_key = Yii::$app->getSecurity()->generateRandomString();
			if($model->save())
                {
					$user_id = $model->id;
					$model->resume_file->saveAs('resumes/'.$model->contact . '_resume.' . $model->resume_file->extension);
                   $lastInsertID = $model->getPrimaryKey();
                   //return $this->redirect(['view', 'id' => $lastInsertID]);
					return $this->redirect(array('service2/create','id'=>$user_id,'key'=>$model->auth_key));
					
					}
               else
               {
                   print_r($model->getErrors()); //=> check whether any validation errors are there
               }
		} else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing service1 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		
        if ($model->load(Yii::$app->request->post())) {
			$model->resume_file = UploadedFile::getInstance($model, 'resume_file');
			
			//saving path
			$model->resume = 'resumes/'.$model->contact.'_resume.'.$model->resume_file->extension;
			if($model->save())
                {	
					$user_id = $model->id;
					$model->resume_file->saveAs('resumes/'.$model->contact . '_resume.' . $model->resume_file->extension);
                   $lastInsertID = $model->getPrimaryKey();
                   	return $this->render(array('service2/create', 'id' => $user_id));
					
					}
               else
               {
                   print_r($model->getErrors()); //=> check whether any validation errors are there
               }
			
            
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing service1 model.
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
     * Finds the service1 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return service1 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = service1::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.Contact ');
        }
    }
}
