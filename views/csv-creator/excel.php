<?php 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


// Create an array of elements 
$rows = $dataProvider->getModels();
$headers = ['outbound_picking_list_barcode', 
            'product_name', 
            'product_barcode',
            'product_model',
            'box_barcode',
            'status',
            'status_availability',
            'primary_address',
            'secondary_address',
            'id'];


$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()
    ->setCreator("Maarten Balliauw")
    ->setLastModifiedBy("Maarten Balliauw")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

$activeWorksheet = $spreadsheet->getActiveSheet();
$activeWorksheet
    ->setCellValue('A1', 'outbound_picking_list_barcode')
    ->setCellValue('B1', 'product_name')
    ->setCellValue('C1', 'product_barcode')
    ->setCellValue('D1', 'product_model')
    ->setCellValue('E1', 'box_barcode')
    ->setCellValue('F1', 'status')
    ->setCellValue('G1', 'status_availability')
    ->setCellValue('H1', 'primary_address')
    ->setCellValue('I1', 'secondary_address')
    ->setCellValue('J1', 'id');

// $activeWorksheet->setCellValue('A1', 'Hello World !');
$i=1;
foreach ($rows as $model) {
    $i++;
    $activeWorksheet
    ->setCellValue('A'.$i, $model->outbound_picking_list_barcode)
    ->setCellValue('B1'.$i, $model->product_name)
    ->setCellValue('C1'.$i, $model->product_barcode)
    ->setCellValue('D1'.$i, $model->product_model)
    ->setCellValue('E1'.$i, $model->box_barcode)
    ->setCellValue('F1'.$i, $model->status)
    ->setCellValue('G1'.$i, $model->status_availability)
    ->setCellValue('H1'.$i, $model->primary_address)
    ->setCellValue('I1'.$i, $model->secondary_address)
    ->setCellValue('J1'.$i, $model->id);
    
}
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="outbound-orders-' . date('d-m-Y_H-i-s') . '.xlsx"');
      header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);

$writer->save('outbound-orders-' . date('d-m-Y_H-i-s') . '.xlsx');

?>
<p>Hello From Excell</p>