<?php

namespace app\modules\admin\controllers;
use Yii;
use yii\web\Controller;
class Auth extends Controller
{
	protected function isAdmin(){
		return (!Yii::$app->user->isGuest && Yii::$app->user->id == 1) ? TRUE : FALSE;
	}
}