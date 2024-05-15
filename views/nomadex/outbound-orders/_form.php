<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrders $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="outbound-orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'outbound_registry_id')->textInput() ?>

    <?= $form->field($model, 'client_order_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'client_id')->textInput() ?>

    <?= $form->field($model, 'supplier_id')->textInput() ?>

    <?= $form->field($model, 'warehouse_id')->textInput() ?>

    <?= $form->field($model, 'from_point_id')->textInput() ?>

    <?= $form->field($model, 'to_point_id')->textInput() ?>

    <?= $form->field($model, 'to_point_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'from_point_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_order_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zone')->textInput() ?>

    <?= $form->field($model, 'consignment_outbound_order_id')->textInput() ?>

    <?= $form->field($model, 'order_type')->textInput() ?>

    <?= $form->field($model, 'delivery_type')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'cargo_status')->textInput() ?>

    <?= $form->field($model, 'extra_status')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'expected_qty')->textInput() ?>

    <?= $form->field($model, 'accepted_qty')->textInput() ?>

    <?= $form->field($model, 'allocated_qty')->textInput() ?>

    <?= $form->field($model, 'accepted_number_places_qty')->textInput() ?>

    <?= $form->field($model, 'expected_number_places_qty')->textInput() ?>

    <?= $form->field($model, 'allocated_number_places_qty')->textInput() ?>

    <?= $form->field($model, 'expected_datetime')->textInput() ?>

    <?= $form->field($model, 'begin_datetime')->textInput() ?>

    <?= $form->field($model, 'end_datetime')->textInput() ?>

    <?= $form->field($model, 'date_confirm')->textInput() ?>

    <?= $form->field($model, 'data_created_on_client')->textInput() ?>

    <?= $form->field($model, 'extra_fields')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'packing_date')->textInput() ?>

    <?= $form->field($model, 'date_left_warehouse')->textInput() ?>

    <?= $form->field($model, 'date_delivered')->textInput() ?>

    <?= $form->field($model, 'fail_delivery_status')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'api_send_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'api_complete_status')->textInput(['maxlength' => true]) ?>

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
