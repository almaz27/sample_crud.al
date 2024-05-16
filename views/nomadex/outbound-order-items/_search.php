<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrderItemsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="outbound-order-items-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'outbound_order_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_barcode') ?>

    <?php // echo $form->field($model, 'product_price') ?>

    <?php // echo $form->field($model, 'product_model') ?>

    <?php // echo $form->field($model, 'product_sku') ?>

    <?php // echo $form->field($model, 'product_madein') ?>

    <?php // echo $form->field($model, 'product_composition') ?>

    <?php // echo $form->field($model, 'product_exporter') ?>

    <?php // echo $form->field($model, 'product_importer') ?>

    <?php // echo $form->field($model, 'product_description') ?>

    <?php // echo $form->field($model, 'product_serialize_data') ?>

    <?php // echo $form->field($model, 'field_extra1') ?>

    <?php // echo $form->field($model, 'field_extra2') ?>

    <?php // echo $form->field($model, 'field_extra3') ?>

    <?php // echo $form->field($model, 'field_extra4') ?>

    <?php // echo $form->field($model, 'field_extra5') ?>

    <?php // echo $form->field($model, 'box_barcode') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'expected_qty') ?>

    <?php // echo $form->field($model, 'accepted_qty') ?>

    <?php // echo $form->field($model, 'allocated_qty') ?>

    <?php // echo $form->field($model, 'expected_number_places_qty') ?>

    <?php // echo $form->field($model, 'accepted_number_places_qty') ?>

    <?php // echo $form->field($model, 'allocated_number_places_qty') ?>

    <?php // echo $form->field($model, 'begin_datetime') ?>

    <?php // echo $form->field($model, 'end_datetime') ?>

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
