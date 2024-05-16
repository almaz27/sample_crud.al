<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrderItems $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outbound Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="outbound-order-items-view">

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
            'outbound_order_id',
            'product_id',
            'product_name',
            'product_barcode',
            'product_price',
            'product_model',
            'product_sku',
            'product_madein',
            'product_composition',
            'product_exporter:ntext',
            'product_importer:ntext',
            'product_description:ntext',
            'product_serialize_data:ntext',
            'field_extra1',
            'field_extra2',
            'field_extra3',
            'field_extra4:ntext',
            'field_extra5:ntext',
            'box_barcode',
            'status',
            'expected_qty',
            'accepted_qty',
            'allocated_qty',
            'expected_number_places_qty',
            'accepted_number_places_qty',
            'allocated_number_places_qty',
            'begin_datetime:datetime',
            'end_datetime:datetime',
            'created_user_id',
            'updated_user_id',
            'created_at',
            'updated_at',
            'deleted',
        ],
    ]) ?>

</div>
