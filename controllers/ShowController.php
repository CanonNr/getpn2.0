<?php


namespace app\controllers;


use yii\web\Controller;

class ShowController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}