<?php

namespace app\controllers\nomadex;

use app\models\nomadex\OutboundOrderItems;
use app\models\nomadex\OutboundOrderItemsSearch;
use app\models\nomadex\OutboundForm;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OutboundOrderItemsController implements the CRUD actions for OutboundOrderItems model.
 */
class OutboundOrderItemsController extends Controller
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
     * Lists all OutboundOrderItems models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OutboundOrderItemsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $model = new OutboundForm();    

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'model'=> $model,
        ]);
    }

    /**
     * Displays a single OutboundOrderItems model.
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
     * Creates a new OutboundOrderItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OutboundOrderItems();

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
     * Updates an existing OutboundOrderItems model.
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
     * Deletes an existing OutboundOrderItems model.
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
    // SELECT product_name, SUM(accepted_qty) as accepted_qty, SUM(expected_qty) as expected_qty, status 
    // from outbound_order_items 
    // WHERE status=11 
    // GROUP by product_name;
    public function actionProductNameQuantityStatus()
    {
        
        $post = $this->request->post();
        // return $this->render('group',['post'=>$post]);
        if ($this->request->isPost) {
            // $post['OutboundForm']['status']
            if ($post['OutboundForm']['status'] == '1') {
                $productsOutboundAvailableQuantity = OutboundOrderItems::find()
                    ->choose()
                    ->available()
                    ->byProduct()
                    ->all();
                if ($this->request->isAjax) {
                    return $this->renderAjax(
                        'groupajax',
                        [
                            'rows' => $productsOutboundAvailableQuantity]
                    );
                } else {
                    return $this->render(
                        'group',
                        [
                            'rows' => $productsOutboundAvailableQuantity]
                    );
                }
            }elseif ($post['OutboundForm']['status']=='0') {
                $productsOutboundAvailableQuantity = OutboundOrderItems::find()
                    ->choose()
                    ->notAvailable()
                    ->byProduct()
                    ->all();
                if ($this->request->isAjax) {
                    return $this->renderAjax(
                        'groupajax',
                        [
                            'rows' => $productsOutboundAvailableQuantity]
                    );
                } else {
                    return $this->render(
                        'group',
                        [
                            'rows' => $productsOutboundAvailableQuantity]
                    );
                }

        }

    
    }
}
    /**
     * Finds the OutboundOrderItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return OutboundOrderItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OutboundOrderItems::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
