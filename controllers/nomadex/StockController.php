<?php

namespace app\controllers\nomadex;

use app\models\nomadex\Stock;
use app\models\nomadex\StockSearch;
use app\models\nomadex\StockQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;

/**
 * StockController implements the CRUD actions for Stock model.
 */
class StockController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Stock models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new StockSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new Stock();


        $status_availability = $model->find()->select('status_availability')->distinct()->all();
        $arr = array();
        $i=0;
        foreach ($status_availability as $key => $value) {
            # code...
            $arr[$i] = $value->status_availability;
            $i++;
        }

        $clients = $model->find()->select('client_id')->distinct()->all();
        $bounds = ['outbound_order_id','inbound_order_id'];
        if($this->request->isGet){
            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
                'status'=> $arr,
                'clients_id'=> $clients,
                'bounds'=> $bounds,
                'model'=>$model

                
            ]);
        }
        
    }

    /**
     * Displays a single Stock model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Stock model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Stock();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Stock model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Stock model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    public function actionGroup($status=null){
        $queryModel = Stock::find()->select(['status', 'COUNT(*) AS cnt', 'client_id'])->groupBy('status, client_id')->all();

        // $model = Stock::findOne(['id' => $id])
        return $this->render('group',[
            'model' => $queryModel,
        ]);
        
    }
    public function actionClientIndoundsTotalAvailable($client_id,$statusAvailable,$bound){
        
        
        // $clientsInboundsTotalAvailable = Stock::find()
        //                                     ->choose()
        //                                     ->client($client_id)
        //                                     ->statusAvailable($statusAvailable)
        //                                     ->addGroupBy('inbound_order_id')
        //                                     ->all();
        $clientsInboundsTotalAvailable = Stock::find()
                                                ->select(["client_id",
                                                            "status_availability",
                                                            strval($bound),
                                                            "COUNT(*) AS total"])
                                                ->andWhere(["client_id"=> $client_id,
                                                            "status_availability"=>$statusAvailable])
                                                ->groupBy(strval($bound))->all();
                                            return $this->render('client-group',
                                            ['rows' => $clientsInboundsTotalAvailable,'bound'=>$bound]);

    }

    /**
     * Finds the Stock model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Stock the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Stock::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
