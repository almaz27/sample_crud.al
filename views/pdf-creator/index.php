    <?php 
     ob_start(); 
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
    // set document information
    $pdf->SetTitle('Объект Almaz' );

    $pdf->SetTextColor(68, 68, 68);

    // set default header data
    $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

    //set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

    // $pdf->SetFont(PDF_FONT_NAME_MAIN, '', 12, '', true);
    $pdf->SetFont('dejavusans', '', 12);

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
    $html = '
    <div class="stock-group" id="test">
        <table class="table  table-hover">
            <thead>
                <tr>
                    <th scope="col">'.$model->getAttributeLabel('client_id').'</th>
                    <th scope="col">'.$model->getAttributeLabel('status_availability').'</th>
                    <th scope="col">'.$model->bound.'</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            
                <tbody>';

    foreach ($rows as $row){
            $html.='<tr><td>'.$row->client_id.'</td>';
            if($row->status_availability == 2){
                $html.='<td>Доступен</td>';
            }elseif($row->status_availability == 3){
                $html.='<td>Не доступен</td>';
            }
            if($row->inbound_order_id == null){
                $html.='<td>'. $row->outbound_order_id.'</td>';
            }else{
                $html.='<td>'. $row->inbound_order_id.'</td>';
            }
            $html.='<td>'.$row->total.'</td></tr>';
            
    }
    
    $html.='</tbody></table></div>';

    $pdf->WriteHTML($html, true, false, false);

    $pdf->Output('test.pdf', 'I');
    die();
    // /Applications/MAMP/htdocs/yii_crud/web/JavaScript comments .pdf
    // exit;


    


    ?>