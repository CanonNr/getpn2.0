<?php


namespace app\controllers;


use yii\web\Controller;

class ShowController extends Controller
{
    public function actionIndex()
    {

        if (!isset($_GET['cityId']) || !isset($_GET['typeId'])) return $this->render('error',['msg'=>'缺少必要参数，请重新选择搜索条件']);
        $cityId = $_GET['cityId'];
        $typeId = $_GET['typeId'];
        $hyId = $_GET['hyId'];
        $page = $_GET['page'];
        if($hyId == 'null')  $hyId = $typeId;
        if(!isset($page))  $page = 1;
        $data = file_get_contents("http://restapi.amap.com/v3/place/text?parameters&key=f38ab40b387c97c182caa1c4bb96c08e&types={$typeId}&city={$cityId}&offset=25&page={$page}");
        $result = json_decode($data,true);
        return $this->render('index',compact('result'));
    }
}