<?php

namespace app\controllers;

use Yii;
use app\models\service1;
use app\models\service2;
use app\models\service3;
use app\models\Service2Search;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * Service2Controller implements the CRUD actions for service2 model.
 */
class Service2Controller extends Controller
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
     * Lists all service2 models.
     * @return mixed
     */
    public function actionIndex()
    {
		if (Yii::$app->user->isGuest)
		{return $this->render('/site/index.php');}
        $searchModel = new Service2Search();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single service2 model.
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
     * Creates a new service2 model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id,$key)
    {
		$model_1 = $this->findModel1($id);
		if ($key != $model_1->auth_key){
			return $this->redirect('index.php');
		}
        $model = new service2();
			
		if (empty($id)){return $this->redirect('index.php?r=service1/create');}
		if ($model->load(Yii::$app->request->post())) {
			$model->id = $id;
			$model->photo_image = UploadedFile::getInstance($model, 'photo_image');
			$model->id_image = UploadedFile::getInstance($model, 'id_image');
			//saving path
			$model->photo = 'photos/'.$model->photo_image->baseName.'_photo.'.$model->photo_image->extension;
			$model->id_upload = 'id_images/'.$model->id_image->baseName.'_id.'.$model->id_image->extension;
			$model->save();
			$model->photo_image->saveAs('photos/'.$model->photo_image->baseName.'_photo.'.$model->photo_image->extension);
			$model->id_image->saveAs('id_images/'.$model->id_image->baseName.'_id.'.$model->id_image->extension);
           return $this->redirect(array('service3/create', 'id' => $id,'key'=>$key));
        } else {
			return $this->render('create', [
                'model' => $model,
			]);
        }
    }

    /**
     * Updates an existing service2 model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id,$key)
    {
		$model = $this->findModel($id);
		$model_1 = $this->findModel1($id);
		if ($key != $model_1->auth_key){
			return $this->redirect('index.php');
		}
		if(empty($model)){
			$model = new service2();
			return $this->redirect(array('service2/create','model'=>$model));	
			
		}
        if ($model->load(Yii::$app->request->post())) {
			$model->id = $id;
			$model->photo_image = UploadedFile::getInstance($model, 'photo_image');
			$model->id_image = UploadedFile::getInstance($model, 'id_image');
			//saving path
			$model->photo = 'photos/'.$model->photo_image->baseName.'_photo.'.$model->photo_image->extension;
			$model->id_upload = 'id_images/'.$model->id_image->baseName.'_id.'.$model->id_image->extension;
			$model->save();
			$model->photo_image->saveAs('photos/'.$model->photo_image->baseName.'.'.$model->photo_image->extension);
			$model->id_image->saveAs('id_images/'.$model->id_image->baseName.'.'.$model->id_image->extension);
			return $this->redirect(array('service3/update','id'=>$id));
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing service2 model.
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
     * Finds the service2 model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return service2 the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = service2::findOne($id)) !== null) {
            return $model;
        } else {
           // throw new NotFoundHttpException('The requested page does not exist.');
			return null; //returning null in order to redirect the page to create
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
