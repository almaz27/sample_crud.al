<?php

use yii\helpers\Html;
// use yii\bootstrap5\ActiveForm;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\StockSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-search">
<p>Искать товар из склада</p>
    <?php $form = ActiveForm::begin([

        'action' => ['index'],
        'method' => 'get',
        'options' => ['class' => ['form-horizontal','container-fluid']],


        

    ]); ?>
   
    <div class="row">
        <div class="col-xs-6 col-sm-2 col-md-4">
            <?=  $form->field($model, 'inbound_order_number', ) ?>
        </div>     
        <div class="col-xs-6 col-sm-2 col-md-4">
                <?= $form->field($model, 'product_name',) ?>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-4">
                <?= $form->field($model, 'outbound_order_number',) ?>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-4">
                <?= $form->field($model, 'box_barcode',) ?>
        </div>
        <div class="col-xs-6 col-sm-2 col-md-4">
                <?= $form->field($model, 'status',) ?>
        </div>
                
    </div>
    <div class="form-group row">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary col-xs-6 col-md-2']) ?>
            <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary col-xs-6 col-md-2']) ?>
    </div>
    <?= Html::a('Convert to csv', ['csv-creator/index', 
                                'model'=>$model
                            ],
                            ['class' => ['btn', 'btn-info', 'btn-sm']]) ?>
    <?= Html::a('Convert to excel', ['csv-creator/export-to-excel', 
                                'model'=>$model
                            ],
                            ['class' => ['btn', 'btn-info', 'btn-sm']]) ?>            


    <?php //$form->field($model, 'id') ?>

    <?php // $form->field($model, 'scan_in_employee_id') ?>

    <?php // $form->field($model, 'scan_out_employee_id') ?>

    <?php // $form->field($model, 'client_id') ?>

    <?php // $form->field($model, 'inbound_order_id') ?>

    <?php // echo $form->field($model, 'consignment_inbound_id') ?>

    <?php // echo $form->field($model, 'inbound_order_item_id') ?>

    

    <?php // echo $form->field($model, 'outbound_order_id') ?>

    <?php // echo $form->field($model, 'consignment_outbound_id') ?>

    <?php // echo $form->field($model, 'outbound_order_item_id') ?>

    <?php // echo $form->field($model, 'outbound_picking_list_id') ?>

    <?php // echo $form->field($model, 'outbound_picking_list_barcode') ?>

    <?php // echo $form->field($model, 'stock_adjustment_id') ?>

    <?php // echo $form->field($model, 'stock_adjustment_status') ?>

    

    <?php // echo $form->field($model, 'warehouse_id') ?>

    <?php // echo $form->field($model, 'zone') ?>

    <?php // echo $form->field($model, 'product_id') ?>

    

    <?php // echo $form->field($model, 'product_barcode') ?>

    <?php // echo $form->field($model, 'product_model') ?>

    <?php // echo $form->field($model, 'product_sku') ?>

    <?php // echo $form->field($model, 'is_product_type') ?>

    

    <?php // echo $form->field($model, 'box_size_barcode') ?>

    <?php // echo $form->field($model, 'box_size_m3') ?>

    <?php // echo $form->field($model, 'box_kg') ?>

    <?php // echo $form->field($model, 'condition_type') ?>

    

    <?php // echo $form->field($model, 'pick_list_status') ?>

    <?php // echo $form->field($model, 'status_availability') ?>

    <?php // echo $form->field($model, 'status_lost') ?>

    <?php // echo $form->field($model, 'inventory_id') ?>

    <?php // echo $form->field($model, 'inventory_primary_address') ?>

    <?php // echo $form->field($model, 'inventory_secondary_address') ?>

    <?php // echo $form->field($model, 'status_inventory') ?>

    <?php // echo $form->field($model, 'primary_address') ?>

    

    <?php // echo $form->field($model, 'address_pallet_qty') ?>

    <?php // echo $form->field($model, 'address_sort_order') ?>

    <?php // echo $form->field($model, 'kpi_value') ?>

    <?php // echo $form->field($model, 'scan_out_datetime') ?>

    <?php // echo $form->field($model, 'scan_in_datetime') ?>

    <?php // echo $form->field($model, 'inbound_client_box') ?>

    <?php // echo $form->field($model, 'system_status') ?>

    <?php // echo $form->field($model, 'system_status_description') ?>

    <?php // echo $form->field($model, 'field_extra1') ?>

    <?php // echo $form->field($model, 'field_extra2') ?>

    <?php // echo $form->field($model, 'field_extra3') ?>

    <?php // echo $form->field($model, 'field_extra4') ?>

    <?php // echo $form->field($model, 'field_extra5') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'updated_user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    

    <?php ActiveForm::end(); ?>

</div>
