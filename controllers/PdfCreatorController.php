<?php

namespace app\controllers;

use TCPDF;
use app\models\nomadex\StockForm;
use app\models\nomadex\Stock;

class PdfCreatorController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $stockForm = new StockForm();


        if ($stockForm->load($this->request->get('model'), '')) {

            $stock = (new Stock())->getWithTotalBound(
                $stockForm->client_id,
                $stockForm->status_availability,
                $stockForm->bound,
            );

            return $this->render(
                'index',
                [
                    'rows' => $stock,
                    'model' => $stockForm
                ]
            );
        } else {
            return $this->render('test');
        }



    }
}
