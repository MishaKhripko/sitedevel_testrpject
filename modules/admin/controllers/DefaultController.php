<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Auth
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	if($this->isAdmin())
	        return $this->render('index');
    }
}
