<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Episode;
use app\models\Season;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\admin\models\UploadImage;
use yii\web\UploadedFile;

/**
 * EpisodeController implements the CRUD actions for Episode model.
 */
class EpisodeController extends Auth
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
     * Lists all Episode models.
     * @return mixed
     */
    public function actionIndex($season = NULL)
    {
        if($this->isAdmin()){
            $query = ($season == NULL) ?
                Episode::find() :
                Episode::find()->where(['season_id' => $season])->orderBy('id');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'season' => Season::findOne($season),
            ]);
        } else 
            return ;
    }

    /**
     * Displays a single Episode model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if($this->isAdmin())
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new Episode model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($season_id)
    {
        if($this->isAdmin()){
            $model = new Episode();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
                'season' => Season::findOne($season_id),
            ]);
        }
    }

    /**
     * Updates an existing Episode model.
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
                $img->upload('episode-'.$id);
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
     * Deletes an existing Episode model.
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
     * Finds the Episode model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Episode the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Episode::findOne($id)) !== null && $this->isAdmin()) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
