<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Tvseries;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\UploadImage;
use yii\web\UploadedFile;


/**
 * TvseriesController implements the CRUD actions for Tvseries model.
 */
class TvseriesController extends Auth
{
    /**
     * {@inheritdoc}
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
     * Lists all Tvseries models.
     * @return mixed
     */
    public function actionIndex()
    {
        if($this->isAdmin()){
            $dataProvider = new ActiveDataProvider([
                'query' => Tvseries::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }
    }

    /**
     * Displays a single Tvseries model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if($this->isAdmin())
            return $this->render('view', [
                'model' => $this->findModel($id),
                'series' => $id,
            ]);
    }

    /**
     * Creates a new Tvseries model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if($this->isAdmin()){
            $model = new Tvseries();
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }   
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Tvseries model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if($this->isAdmin()){
            $img = new UploadImage();

            if (Yii::$app->request->isPost){
                $img->imageFile = UploadedFile::getInstance($img, 'imageFile');
                $img->upload($id);
            }
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
                'img' => $img,
            ]);
        }
    }

    /**
     * Deletes an existing Tvseries model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if($this->isAdmin()){
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Tvseries model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tvseries the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tvseries::findOne($id)) !== null && $this->isAdmin()) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
