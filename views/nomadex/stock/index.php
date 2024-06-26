<?php

use app\models\nomadex\Stock;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap5\Dropdown;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\StockSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Client Grouped Info', ['group'], ['class' => 'btn btn-primary']) ?>
    </p>
    <p>
        <?= Html::a('Client Grouped Inbound Info', ['client-indounds-total-available','client_id'=>103,'statusAvailable'=>3], ['class' => 'btn btn-primary']) ?>
    </p>

<ul>
    <?php foreach($status as $value): ?>
    <li><label>Name</label>: <?= Html::encode($value)?></li>
    <?php endforeach;?>

</ul>
<
    
</div>

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'scan_in_employee_id',
            'scan_out_employee_id',
            'client_id',
            'inbound_order_id',
            //'consignment_inbound_id',
            //'inbound_order_item_id',
            //'inbound_order_number',
            //'outbound_order_id',
            //'consignment_outbound_id',
            //'outbound_order_item_id',
            //'outbound_picking_list_id',
            //'outbound_picking_list_barcode',
            //'stock_adjustment_id',
            //'stock_adjustment_status',
            //'outbound_order_number',
            //'warehouse_id',
            //'zone',
            //'product_id',
            //'product_name',
            //'product_barcode',
            //'product_model',
            //'product_sku',
            //'is_product_type',
            //'box_barcode',
            //'box_size_barcode',
            //'box_size_m3',
            //'box_kg',
            //'condition_type',
            //'status',
            //'pick_list_status',
            //'status_availability',
            //'status_lost',
            //'inventory_id',
            //'inventory_primary_address',
            //'inventory_secondary_address',
            //'status_inventory',
            //'primary_address',
            //'secondary_address',
            //'address_pallet_qty',
            //'address_sort_order',
            //'kpi_value',
            //'scan_out_datetime:datetime',
            //'scan_in_datetime:datetime',
            //'inbound_client_box',
            //'system_status',
            //'system_status_description:ntext',
            //'field_extra1',
            //'field_extra2',
            //'field_extra3',
            //'field_extra4:ntext',
            //'field_extra5:ntext',
            //'created_user_id',
            //'updated_user_id',
            //'created_at',
            //'updated_at',
            //'deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Stock $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>

