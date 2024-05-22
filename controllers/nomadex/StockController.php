<?php

namespace app\controllers\nomadex;

use app\models\nomadex\Stock;
use app\models\nomadex\StockForm;
use app\models\nomadex\StockSearch;
use app\models\nomadex\StockQuery;
use PHPUnit\Util\Type;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * StockController implements the CRUD actions for Stock model.
 */
class StockController extends Controller
{
    // public function __construct(Type $var = null) {
    //     $this->rep = $var;
    // }
    public function actionClientBoundsTotalAvailable()
    {
        if (!$this->request->isPost) {
            return "";
        }
        $stockForm = new StockForm();

        if ($stockForm->load($this->request->post())) {
            $stock = (new Stock())->getWithTotalBound(
                $stockForm->client_id,
                $stockForm->status_availability,
                $stockForm->bound,
            );
            return $this->renderAjax(
                'groupajax',
                [
                    'rows' => $stock,
                    'model' => $stockForm
                ]
            );
        }
    }


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
        $model = new StockForm();

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
    public function actionGridView()
    {

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
    public function actionListFilter(){
        return $this->render('list', 
                                ['list'=>
                                ['index 1','index 2','index 3','index 4','index 5']]
                            );
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
