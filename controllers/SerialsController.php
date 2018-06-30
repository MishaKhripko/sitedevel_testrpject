<?php

namespace app\controllers;

use Yii;
use app\models\Tvseries;
use app\models\Season;
use app\models\Episode;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class SerialsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = Tvseries::find()->all();
        return $this->render('index', [
            'dp' => $dataProvider,
            'query' => Tvseries::getTvseriesWithStartFinishSeoson()
        ]);
    }
    public function actionView($id){
        $dataProvider = Season::find()
            ->where(['tvseries_id' => $id])
            ->orderBy('id')
            ->all();
        $serial = Tvseries::find()->where(['id' => $id])->one();
        return $this->render('view',[
            'dp' => $dataProvider,
            'serial' => $serial,
        ]);
    }
    // \Yii::$app->request->post('id')
    public function actionEpisodes(){
        if (Yii::$app->request->isAjax){
            $episods = Episode::find()
                ->where(['season_id' => \Yii::$app->request->post('id')])
                ->orderBy('id')
                ->all();
            header('Content-Type: application/json');
            return $this->asJson($episods);
        }
    }
}