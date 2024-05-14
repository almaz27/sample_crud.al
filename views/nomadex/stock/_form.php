<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\Stock $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'scan_in_employee_id')->textInput() ?>

    <?= $form->field($model, 'scan_out_employee_id')->textInput() ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'inbound_order_id')->textInput() ?>

    <?= $form->field($model, 'consignment_inbound_id')->textInput() ?>

    <?= $form->field($model, 'inbound_order_item_id')->textInput() ?>

    <?= $form->field($model, 'inbound_order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'outbound_order_id')->textInput() ?>

    <?= $form->field($model, 'consignment_outbound_id')->textInput() ?>

    <?= $form->field($model, 'outbound_order_item_id')->textInput() ?>

    <?= $form->field($model, 'outbound_picking_list_id')->textInput() ?>

    <?= $form->field($model, 'outbound_picking_list_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stock_adjustment_id')->textInput() ?>

    <?= $form->field($model, 'stock_adjustment_status')->textInput() ?>

    <?= $form->field($model, 'outbound_order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warehouse_id')->textInput() ?>

    <?= $form->field($model, 'zone')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_product_type')->textInput() ?>

    <?= $form->field($model, 'box_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'box_size_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'box_size_m3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'box_kg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'condition_type')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'pick_list_status')->textInput() ?>

    <?= $form->field($model, 'status_availability')->textInput() ?>

    <?= $form->field($model, 'status_lost')->textInput() ?>

    <?= $form->field($model, 'inventory_id')->textInput() ?>

    <?= $form->field($model, 'inventory_primary_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'inventory_secondary_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_inventory')->textInput() ?>

    <?= $form->field($model, 'primary_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'secondary_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address_pallet_qty')->textInput() ?>

    <?= $form->field($model, 'address_sort_order')->textInput() ?>

    <?= $form->field($model, 'kpi_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'scan_out_datetime')->textInput() ?>

    <?= $form->field($model, 'scan_in_datetime')->textInput() ?>

    <?= $form->field($model, 'inbound_client_box')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'system_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'system_status_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'field_extra1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_extra2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_extra3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_extra4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'field_extra5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'created_user_id')->textInput() ?>

    <?= $form->field($model, 'updated_user_id')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'deleted')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
