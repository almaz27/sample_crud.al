<?php 
namespace app\controllers;
use Yii;
use app\models\nomadex\StockSearch;

class CsvCreatorController extends \yii\web\Controller{

    public function actionIndex(){
        static $counter = 0;
        $searchModel = new StockSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $counter+=1;
        return $this->render("index",["dataProvider"=>$dataProvider, "counter"=>$counter]);
    }
}
