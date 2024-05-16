<?php

namespace app\controllers\nomadex;

use app\models\nomadex\Stock;
use app\models\nomadex\StockSearch;
use app\models\nomadex\StockQuery;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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

        $statusArray = Stock::find()->select('status_availability')->distinct(true)->asArray()->all();
        $clientArray = Stock::find()->select('client_id')->distinct(true)->asArray()->all();
        $status = [];
        $clients = [];
        $bound = [
            '0' => 'inbound_order_id',
            '1' => 'outbound_order_id'
        ];
        foreach ($statusArray as $sta) {
            if ($sta['status_availability'] == 2) {
                $status[strval($sta['status_availability'])] = "Доступен";
            }
            if ($sta['status_availability'] == 3) {
                $status[strval($sta['status_availability'])] = "Не доступен";
            }

        }
        foreach ($clientArray as $sta) {
            $clients[strval($sta['client_id'])] = $sta['client_id'];

        }



        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model' => $model,
            'status' => $status,
            'clients' => $clients,
            'bounds' => $bound
        ]);
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

    public function actionClientIndoundsTotalAvailable()
    {

        if ($this->request->isPost) {
            $stock = $this->request->post('Stock');
            $stock['bound'] = $this->request->post('bound');

            if ($this->request->post('bound') == 'inbound_order_id') {
                $clientsInboundsTotalAvailable = Stock::find()
                    ->chooseInbound()
                    ->statusAvailable($stock['status_availability'])
                    ->client($stock['client_id'])
                    ->addGroupBy($stock['bound'])
                    ->all();
                if ($this->request->isAjax) {
                    return $this->renderAjax(
                        'groupajax',
                        [
                            'rows' => $clientsInboundsTotalAvailable
                        ]
                    );
                } else {
                    return $this->render(
                        'group',
                        [
                            'rows' => $clientsInboundsTotalAvailable
                        ]
                    );
                }
            }
            if ($this->request->post('bound') == 'outbound_order_id') {
                $clientsInboundsTotalAvailable = Stock::find()
                    ->chooseOutbound()
                    ->statusAvailable($stock['status_availability'])
                    ->client($stock['client_id'])
                    ->addGroupBy($stock['bound'])
                    ->all();

                    if ($this->request->isAjax) {
                        return $this->renderAjax(
                            'groupajax',
                            [
                                'rows' => $clientsInboundsTotalAvailable
                            ]
                        );
                    } else {
                        return $this->render(
                            'group',
                            [
                                'rows' => $clientsInboundsTotalAvailable
                            ]
                        );
                    }
            }


        }



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
