<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Season;
use app\models\Tvseries;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeasonController implements the CRUD actions for Season model.
 */
class SeasonController extends Auth
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
     * Lists all Season models.
     * @return mixed
     */
    public function actionIndex($tvserial = NULL)
    {
        if($this->isAdmin()){
            $query = ($tvserial == NULL) ?
                Season::find() :
                Season::find()->where(['tvseries_id' => $tvserial])->orderBy('id');
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
                'tvseries_id' => $tvserial,
                'serial' => Tvseries::findOne($tvserial),
            ]);
        }
    }

    /**
     * Displays a single Season model.
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
     * Creates a new Season model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tvseries_id = NULL)
    {
        if($this->isAdmin()){
            $model = new Season();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('create', [
                'model' => $model,
                'series' => $tvseries_id,
            ]);
        }
    }

    /**
     * Updates an existing Season model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if($this->isAdmin()){
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Season model.
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
     * Finds the Season model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Season the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Season::findOne($id)) !== null && $this->isAdmin()) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
