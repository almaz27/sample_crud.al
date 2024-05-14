<?php

use app\models\nomadex\InboundOrders;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\InboundOrdersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Inbound Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbound-orders-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Inbound Orders', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Group Inbound Orders', ['group'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_order_id',
            'client_id',
            'supplier_id',
            'warehouse_id',
            //'from_point_id',
            //'to_point_id',
            //'from_point_title',
            //'to_point_title',
            //'order_number',
            //'parent_order_number',
            //'client_box_barcode',
            //'consignment_inbound_order_id',
            //'order_type',
            //'delivery_type',
            //'status',
            //'cargo_status',
            //'expected_qty',
            //'accepted_qty',
            //'allocated_qty',
            //'accepted_number_places_qty',
            //'expected_number_places_qty',
            //'zone',
            //'expected_datetime:datetime',
            //'begin_datetime:datetime',
            //'end_datetime:datetime',
            //'date_confirm',
            //'extra_fields:ntext',
            //'data_created_on_client',
            //'comments:ntext',
            //'created_user_id',
            //'updated_user_id',
            //'created_at',
            //'updated_at',
            //'deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InboundOrders $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
