<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\Stock $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'scan_in_employee_id',
            'scan_out_employee_id',
            'client_id',
            'inbound_order_id',
            'consignment_inbound_id',
            'inbound_order_item_id',
            'inbound_order_number',
            'outbound_order_id',
            'consignment_outbound_id',
            'outbound_order_item_id',
            'outbound_picking_list_id',
            'outbound_picking_list_barcode',
            'stock_adjustment_id',
            'stock_adjustment_status',
            'outbound_order_number',
            'warehouse_id',
            'zone',
            'product_id',
            'product_name',
            'product_barcode',
            'product_model',
            'product_sku',
            'is_product_type',
            'box_barcode',
            'box_size_barcode',
            'box_size_m3',
            'box_kg',
            'condition_type',
            'status',
            'pick_list_status',
            'status_availability',
            'status_lost',
            'inventory_id',
            'inventory_primary_address',
            'inventory_secondary_address',
            'status_inventory',
            'primary_address',
            'secondary_address',
            'address_pallet_qty',
            'address_sort_order',
            'kpi_value',
            'scan_out_datetime:datetime',
            'scan_in_datetime:datetime',
            'inbound_client_box',
            'system_status',
            'system_status_description:ntext',
            'field_extra1',
            'field_extra2',
            'field_extra3',
            'field_extra4:ntext',
            'field_extra5:ntext',
            'created_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
            'deleted',
        ],
    ]) ?>

</div>
