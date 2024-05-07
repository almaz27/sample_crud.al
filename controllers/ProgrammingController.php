<?php

namespace app\controllers;

use app\models\CommentSearch;
use app\models\Programming;
use app\models\Comment;
use app\models\ProgrammingSearch;
use yii\db\JsonExpression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ProgrammingController implements the CRUD actions for Programming model.
 */
class ProgrammingController extends Controller
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
     * Lists all Programming models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgrammingSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programming model.
     * @param string $code Code
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($code)
    {
        return $this->render('view', [
            'model' => $this->findModel($code),
        ]);
    }

    /**
     * Creates a new Programming model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Programming();


        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'code' => $model->code]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programming model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $code Code
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($code)
    {
        $model = $this->findModel($code);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'code' => $model->code]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programming model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $code Code
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($code)
    {
        $this->findModel($code)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Programming model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $code Code
     * @return Programming the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($code)
    {
        if (($model = Programming::findOne(['code' => $code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionComments($Id){
        if($this->request->isAjax){
            $model = Programming::findOne(['Id'=>$Id]);
            $dataProvider = new ActiveDataProvider([
            'query' => Comment::find()->where(['post_id' => $Id])->orderBy('id DESC'),
            'pagination' => [
            'pageSize' => 10,
            ],
            ]);

            // $searchModel = new CommentSearch();
            // $dataProvider = $searchModel->search($this->request->queryParams);
            // $json = new JsonExpression(['a' => 1, 'b' => 2]);
            return $this->renderAjax('commentindex',['dataProvider'=>$dataProvider,'model'=>$model]);
        }
        // $searchModel = new CommentSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);
        // return $this->renderAjax('_table',['model' => $dataProvider]);
            // $dataProvider = new ActiveDataProvider([
            // 'query' => Comment::find()->where(['post_id' => $Id])->orderBy('id DESC'),
            // 'pagination' => [
            // 'pageSize' => 10,
            // ],
            // ]);

            //     return $this->renderAjax('_table',[
            //         'model'=>$dataProvider,
            //     ]);

           
            // $this->view->title = 'Comments List';
            // return $this->render('_table', ['listDataProvider' => $dataProvider]);
            
        
    }
    public function actionTest()
    {
        return  $this->asJson([
            'name' => $this->request->post('name'),   
            'surname' => $this->request->post('surname'),  
            'text' => $this->request->post('text'),    
        ]);


    }

    
}
