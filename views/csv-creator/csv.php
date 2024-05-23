<?php

use PhpOffice\PhpSpreadsheet\Reader\Csv as CsvReader;
use PhpOffice\PhpSpreadsheet\Writer\Csv as CsvWriter;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$rows = $dataProvider->getModels();

$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();
// ['outbound_picking_list_barcode', 
//             'product_name', 
//             'product_barcode',
//             'product_model',
//             'box_barcode',
//             'status',
//             'status_availability',
//             'primary_address',
//             'secondary_address',
//             'id'];
$i=1;
$worksheet->setCellValue("A".$i, 'outbound_picking_list_barcode');
$worksheet->setCellValue("B".$i, 'product_name');
$worksheet->setCellValue("C".$i, 'product_barcode');
$worksheet->setCellValue("D".$i, 'product_model');
$worksheet->setCellValue("E".$i, 'box_barcode');
$worksheet->setCellValue("F".$i, 'status');
$worksheet->setCellValue("G".$i, 'status_availability');
$worksheet->setCellValue("H".$i, 'primary_address');
$worksheet->setCellValue("I".$i, 'secondary_address');
$worksheet->setCellValue("J".$i, 'id');

foreach ($rows as $row) {
    ++$i;
    $worksheet->setCellValue("A".$i, $row->outbound_picking_list_barcode);
    $worksheet->setCellValue("B".$i, $row->product_name);
    $worksheet->setCellValue("C".$i, $row->product_barcode);
    $worksheet->setCellValue("D".$i, $row->product_model);
    $worksheet->setCellValue("E".$i, $row->box_barcode);
    $worksheet->setCellValue("F".$i, $row->status);
    $worksheet->setCellValue("G".$i, $row->status_availability);
    $worksheet->setCellValue("H".$i, $row->primary_address);
    $worksheet->setCellValue("I".$i, $row->secondary_address);
    $worksheet->setCellValue("J".$i, $row->id);
    

}

$writer = new CsvWriter($spreadsheet);

$writer->setDelimiter(',');
$writer->setEnclosure('"');
$writer->setLineEnding("\r\n");
$writer->setSheetIndex(0);
$writer->setUseBOM(true);
$filename = "outbound-orders".date('d-m-Y_H-i-s') .".csv";

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment;filename="outbound-orders-' . date('d-m-Y_H-i-s') . '.csv"');
      header('Cache-Control: max-age=0');

$writer->save("php://output"); 
die;