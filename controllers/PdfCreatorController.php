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


        if ($stockForm->load($this->request->get('model'),'')) {

            $stock = (new Stock())->getWithTotalBound(
                $stockForm->client_id,
                $stockForm->status_availability,
                $stockForm->bound,
            );

            return $this->render(
                'index',
                [
                    'rows' => $stock,
                    'model'=>$stockForm
                ]
            );
        } else {
            return $this->render('test');
        }



    }
    public function actionAjax()
    {
        if ($this->request->isAjax) {
            $title = $this->request->post('title');
            $textHtml = $this->request->post('textHtml');
            if (!empty($textHtml) && !empty($title)) {

                ob_end_clean();
                // create new PDF document
                $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
                // set document information
                $pdf->SetTitle('Объект ' . $title);

                $pdf->SetTextColor(68, 68, 68);

                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

                //set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                $pdf->SetFont(PDF_FONT_NAME_MAIN, '', 12, '', true);

                //set auto page breaks
                $pdf->SetHeaderFont(
                    array(
                        PDF_FONT_NAME_MAIN,
                        'B',
                        10
                    )
                );

                $pdf->SetFooterFont(
                    array(
                        PDF_FONT_NAME_MAIN,
                        'B',
                        10
                    )
                );


                // add a page
                $pdf->AddPage();

                $strHtml = mb_convert_encoding($textHtml, 'UTF-8');
                $without_br = str_replace("<br>", " ", $strHtml);
                // $without_br = <<<EOF
                // <div style="background-color:#880000;color:white;">
                // Hello World!<br />
                // Hello
                // </div>
                // <pre style="background-color:#336699;color:white;">
                // int main() {
                //     printf("HelloWorld");
                //     return 0;
                // }
                // </pre>
                // <tt>Monospace font</tt>, normal font, <tt>monospace font</tt>, normal font.
                // <br />
                // <div style="background-color:#880000;color:white;">DIV LEVEL 1<div style="background-color:#008800;color:white;">DIV LEVEL 2</div>DIV LEVEL 1</div>
                // <br />
                // <span style="background-color:#880000;color:white;">SPAN LEVEL 1 <span style="background-color:#008800;color:white;">SPAN LEVEL 2</span> SPAN LEVEL 1</span>
                // EOF;

                $pdf->WriteHTML($without_br, true, false, false);

                $pdf->Output($title . '.pdf', 'F');
                // /Applications/MAMP/htdocs/yii_crud/web/JavaScript comments .pdf
                // exit;

                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $title . '.pdf')) {
                    $arResult['NAME'] = 'print';
                    $arResult['PATH'] = '/Applications/MAMP/htdocs/yii_crud/web/JavaScript comments .pdf';
                    echo json_encode($arResult);
                }


            }

            // return Yii::$app->response->sendFile($completePath, $title . '.pdf', ['inline'=>true]);
        }
    }

}
