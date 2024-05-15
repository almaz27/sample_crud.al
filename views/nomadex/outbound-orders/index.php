<?php

use app\models\nomadex\OutboundOrders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Outbound Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbound-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Outbound Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'outbound_registry_id',
            'client_order_id',
            'client_id',
            'supplier_id',
            //'warehouse_id',
            //'from_point_id',
            //'to_point_id',
            //'to_point_title',
            //'from_point_title',
            //'order_number',
            //'parent_order_number',
            //'zone',
            //'consignment_outbound_order_id',
            //'order_type',
            //'delivery_type',
            //'status',
            //'cargo_status',
            //'extra_status',
            //'mc',
            //'kg',
            //'expected_qty',
            //'accepted_qty',
            //'allocated_qty',
            //'accepted_number_places_qty',
            //'expected_number_places_qty',
            //'allocated_number_places_qty',
            //'expected_datetime:datetime',
            //'begin_datetime:datetime',
            //'end_datetime:datetime',
            //'date_confirm',
            //'data_created_on_client',
            //'extra_fields:ntext',
            //'title',
            //'description:ntext',
            //'packing_date',
            //'date_left_warehouse',
            //'date_delivered',
            //'fail_delivery_status:ntext',
            //'api_send_data:ntext',
            //'api_complete_status',
            //'created_user_id',
            //'updated_user_id',
            //'created_at',
            //'updated_at',
            //'deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OutboundOrders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
