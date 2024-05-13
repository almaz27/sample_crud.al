<?php

namespace app\controllers;

use app\models\CommentSearch;
use app\models\Programming;
use app\models\Comment;
use app\models\ProgrammingSearch;
use TCPDF_FONTS;
use yii\db\JsonExpression;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

use TCPDF_COLORS;

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
        // create new PDF document
        

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
            'sort'=>false,
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
// public function actionTcpdf(){
       
//     if($this->request->isAjax){

//         $text = $this->request->post('text');
//         $without_br = str_replace("<br>", " ", $text);

//        // create new PDF document
//         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//         // set document information
//         $pdf->SetCreator(PDF_CREATOR);

//         // set default header data
//         $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH);
//         $pdf->setFooterData(array(0,64,0), array(0,64,128));

//         // set header and footer fonts
//         $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
//         $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

//         // set default monospaced font
//         $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//         // set margins
//         $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
//         $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//         $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//         // set auto page breaks
//         $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//         // set image scale factor
//         $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//         // set some language-dependent strings (optional)
//         if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
//             require_once(dirname(__FILE__).'/lang/eng.php');
//             $pdf->setLanguageArray($l);
//         }

//         // ---------------------------------------------------------

//         // set default font subsetting mode
//         $pdf->setFontSubsetting(true);

//         // Set font
//         // dejavusans is a UTF-8 Unicode font, if you only need to
//         // print standard ASCII chars, you can use core fonts like
//         // helvetica or times to reduce file size.
//         $pdf->SetFont('dejavusans', '', 14, '', true);

//         // Add a page
//         // This method has several options, check the source code documentation for more information.
//         $pdf->AddPage();


//         // Set some content to print
//         $html = <<<EOD
//         <h1>Student  list</h1>
        // <table cellspacing="0" cellpadding="1" border="1" style="border-color:gray;">
        //     <tr style="background-color:green;color:white;">
        //         <td>SL no</td>
        //         <td>Name</td>
        //         <td>Roll No</td>
        //         <td>City</td>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>Divyasundar</td>
        //         <td>001</td>
        //         <td>Pune</td>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>Milan</td>
        //         <td>002</td>
        //         <td>Pune</td>
        //     </tr>
        //     <tr>
        //         <td>1</td>
        //         <td>Hritika</td>
        //         <td>003</td>
        //         <td>Pune</td>
        //     </tr>
        // </table>
//         EOD;

//         // Print text using writeHTMLCell()
//         $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

//         // ---------------------------------------------------------

//         // Close and output PDF document
//         // This method has several options, check the source code documentation for more information.
//         $pdf->Output('helo_world.pdf', 'F');
        
   
//     return $without_br;
//     }
    
// }
