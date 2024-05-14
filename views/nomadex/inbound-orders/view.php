<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\InboundOrders $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inbound Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inbound-orders-view">

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
            'client_order_id',
            'client_id',
            'supplier_id',
            'warehouse_id',
            'from_point_id',
            'to_point_id',
            'from_point_title',
            'to_point_title',
            'order_number',
            'parent_order_number',
            'client_box_barcode',
            'consignment_inbound_order_id',
            'order_type',
            'delivery_type',
            'status',
            'cargo_status',
            'expected_qty',
            'accepted_qty',
            'allocated_qty',
            'accepted_number_places_qty',
            'expected_number_places_qty',
            'zone',
            'expected_datetime:datetime',
            'begin_datetime:datetime',
            'end_datetime:datetime',
            'date_confirm',
            'extra_fields:ntext',
            'data_created_on_client',
            'comments:ntext',
            'created_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
            'deleted',
        ],
    ]) ?>

</div>
