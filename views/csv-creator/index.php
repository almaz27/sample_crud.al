<?php
use yii\base\Model;




// Create an array of elements 
$rows = $dataProvider->getModels();

// Open a file in write mode ('w') 
$fp = fopen('\\csv\\stock'.$counter.'.csv', 'w');


  

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
   

//Enter headers of columns 
fputcsv($fp, $headers); 


// Loop through file pointer and a line 
foreach ($rows as $key => $row) {
    fputcsv($fp, [$row->outbound_picking_list_barcode,
    $row->product_name, 
    $row->product_barcode,
    $row->product_model,
    $row->box_barcode,
    $row->status,
    $row->status_availability,
    $row->primary_address,
    $row->secondary_address,
    $row->id]); 
}

  
fclose($fp); 


