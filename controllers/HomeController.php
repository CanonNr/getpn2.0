<?php
namespace app\controllers;

use yii\web\Controller;
use app\models\Type;
use app\models\Region;

class HomeController extends Controller
{
    public function actionIndex()
    {
        $provinceArray = Region::find()->where(['PARENT_ID'=>1])->asArray()->all();
        $cityArray = Region::find()->where(['PARENT_ID'=>2])->asArray()->all();
        $typeArray = Type::find()->where(['pid'=>'0'])->asArray()->all();
        $hyArray = Type::find()->where(['pid'=>'010000'])->asArray()->all();

        return $this->render('index',compact('provinceArray','cityArray','typeArray','hyArray'));
    }

    public function actionGetcity()
    {
        $id = $_GET['id'];
        $cityArray = Region::find()->where(['PARENT_ID'=>$id])->asArray()->all();
        return json_encode(['code'=> 200 , 'data' => $cityArray]);
    }

    public function actionGethy()
    {
        $id = $_GET['id'];
        $cityArray = Type::find()->where(['pid'=>$id])->asArray()->all();
        return json_encode(['code'=> 200 , 'data' => $cityArray]);
    }
}