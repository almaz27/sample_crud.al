<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrders $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Outbound Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="outbound-orders-view">

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
            'outbound_registry_id',
            'client_order_id',
            'client_id',
            'supplier_id',
            'warehouse_id',
            'from_point_id',
            'to_point_id',
            'to_point_title',
            'from_point_title',
            'order_number',
            'parent_order_number',
            'zone',
            'consignment_outbound_order_id',
            'order_type',
            'delivery_type',
            'status',
            'cargo_status',
            'extra_status',
            'mc',
            'kg',
            'expected_qty',
            'accepted_qty',
            'allocated_qty',
            'accepted_number_places_qty',
            'expected_number_places_qty',
            'allocated_number_places_qty',
            'expected_datetime:datetime',
            'begin_datetime:datetime',
            'end_datetime:datetime',
            'date_confirm',
            'data_created_on_client',
            'extra_fields:ntext',
            'title',
            'description:ntext',
            'packing_date',
            'date_left_warehouse',
            'date_delivered',
            'fail_delivery_status:ntext',
            'api_send_data:ntext',
            'api_complete_status',
            'created_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
            'deleted',
        ],
    ]) ?>

</div>
