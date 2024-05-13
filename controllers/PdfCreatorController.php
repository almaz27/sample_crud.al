<?php

namespace app\controllers;

use TCPDF;

class PdfCreatorController extends \yii\web\Controller
{
    public function actionIndex()
    {

        // \Yii::$app->get('tcpdf');
        if (Yii::$app->request->isAjax) {
            if (isset($_POST["html_t"])) {
                $from_client = $this->request->post("html_t");
                $without_br = str_replace("<br>", " ", $from_client);


                // create new PDF document
                $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

                // set document information
                $pdf->SetCreator(PDF_CREATOR);
                $pdf->SetAuthor('Nicola Asuni');
                $pdf->SetTitle('TCPDF Example 001');
                $pdf->SetSubject('TCPDF Tutorial');
                $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

                // set default header data
                $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
                $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

                // set header and footer fonts
                $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

                // set default monospaced font
                $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

                // set margins
                $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

                // set auto page breaks
                $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

                // set image scale factor
                $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

                // set some language-dependent strings (optional)
                if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
                    require_once (dirname(__FILE__) . '/lang/eng.php');
                    $pdf->setLanguageArray($l);
                }

                // ---------------------------------------------------------

                // set default font subsetting mode
                $pdf->setFontSubsetting(true);

                // Set font
                // dejavusans is a UTF-8 Unicode font, if you only need to
                // print standard ASCII chars, you can use core fonts like
                // helvetica or times to reduce file size.
                $pdf->SetFont('dejavusans', '', 14, '', true);

                // Add a page
                // This method has several options, check the source code documentation for more information.
                $pdf->AddPage();

                // set text shadow effect
                $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

                // Set some content to print
                $html = <<<EOD
                <table border="1" cellspacing="3" cellpadding="4"><tr><th>ID</th><th>Status</th><th>Body</th><th>Publish Date</th><th>Publisher ID</th></tr>
                <tr data-key="4"><td>4</td><td>ANOTHER</td><td>2024-05-01 12:02:312024-05-01 12:02:312024-05-01 12:02:312024-05-01 12:02:31</td><td>2024-05-01 12:02:31</td><td>1</td></tr>
                <tr data-key="2"><td>2</td><td>NOT_SOLVED</td><td>Ожидаемое исключение генерируемое в тесте<br>
                Ниже приведен очень простой тест, который ожидает, что исключение NumberFormatException будет сгенерировано при выполнении предоставленного блока кода.</td><td>2024-05-01 12:03:31</td><td>2</td></tr>
                <tr data-key="1"><td>1</td><td>SOLVED</td><td>What Causes ArrayIndexOutOfBoundsException. The ArrayIndexOutOfBoundsException is one of the most common errors in Java. It occurs when a program attempts to access an invalid index in an array i.e. an index that is less than 0, or equal to or greater than the length of the array.</td><td>2024-05-01 12:02:31</td><td>1</td></tr>
                </table>
                EOD;

                // Print text using writeHTMLCell()
                $pdf->writeHTMLCell(0, 0, '', '', $without_br, 0, 1, 0, true, '', true);
                // $pdf->writeHTML($this->renderPartial('programming/commentindex.php'), true, false, true, false,'');

                // ---------------------------------------------------------

                // Close and output PDF document
                // This method has several options, check the source code documentation for more information.
                $pdf->Output('example_almaz.pdf', 'I');
                exit;
            }
            return $this->redirect(['index']);
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

                $strHtml = $textHtml;

                $pdf->WriteHTML($strHtml, true, false, false);

                $pdf->Output($title. '.pdf', 'F');
                // /Applications/MAMP/htdocs/yii_crud/web/JavaScript comments .pdf
                // exit;

                if (file_exists($_SERVER['DOCUMENT_ROOT'] . $title . '.pdf')) {
                    $arResult['NAME'] = 'print';
                    $arResult['PATH'] = $title . '.pdf';
                    echo json_encode($arResult);
                }

            return $this->render('index');
            }

            // return Yii::$app->response->sendFile($completePath, $title . '.pdf', ['inline'=>true]);
        }
    }

}
