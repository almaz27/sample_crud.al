<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrdersSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="outbound-orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'outbound_registry_id') ?>

    <?= $form->field($model, 'client_order_id') ?>

    <?= $form->field($model, 'client_id') ?>

    <?= $form->field($model, 'supplier_id') ?>

    <?php // echo $form->field($model, 'warehouse_id') ?>

    <?php // echo $form->field($model, 'from_point_id') ?>

    <?php // echo $form->field($model, 'to_point_id') ?>

    <?php // echo $form->field($model, 'to_point_title') ?>

    <?php // echo $form->field($model, 'from_point_title') ?>

    <?php // echo $form->field($model, 'order_number') ?>

    <?php // echo $form->field($model, 'parent_order_number') ?>

    <?php // echo $form->field($model, 'zone') ?>

    <?php // echo $form->field($model, 'consignment_outbound_order_id') ?>

    <?php // echo $form->field($model, 'order_type') ?>

    <?php // echo $form->field($model, 'delivery_type') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'cargo_status') ?>

    <?php // echo $form->field($model, 'extra_status') ?>

    <?php // echo $form->field($model, 'mc') ?>

    <?php // echo $form->field($model, 'kg') ?>

    <?php // echo $form->field($model, 'expected_qty') ?>

    <?php // echo $form->field($model, 'accepted_qty') ?>

    <?php // echo $form->field($model, 'allocated_qty') ?>

    <?php // echo $form->field($model, 'accepted_number_places_qty') ?>

    <?php // echo $form->field($model, 'expected_number_places_qty') ?>

    <?php // echo $form->field($model, 'allocated_number_places_qty') ?>

    <?php // echo $form->field($model, 'expected_datetime') ?>

    <?php // echo $form->field($model, 'begin_datetime') ?>

    <?php // echo $form->field($model, 'end_datetime') ?>

    <?php // echo $form->field($model, 'date_confirm') ?>

    <?php // echo $form->field($model, 'data_created_on_client') ?>

    <?php // echo $form->field($model, 'extra_fields') ?>

    <?php // echo $form->field($model, 'title') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'packing_date') ?>

    <?php // echo $form->field($model, 'date_left_warehouse') ?>

    <?php // echo $form->field($model, 'date_delivered') ?>

    <?php // echo $form->field($model, 'fail_delivery_status') ?>

    <?php // echo $form->field($model, 'api_send_data') ?>

    <?php // echo $form->field($model, 'api_complete_status') ?>

    <?php // echo $form->field($model, 'created_user_id') ?>

    <?php // echo $form->field($model, 'updated_user_id') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
