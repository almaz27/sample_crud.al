<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrderItems $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="outbound-order-items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'outbound_order_id')->textInput() ?>

    <?= $form->field($model, 'product_id')->textInput() ?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_model')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_sku')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_madein')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_composition')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_exporter')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_importer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'product_serialize_data')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'field_extra1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_extra2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_extra3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_extra4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'field_extra5')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'box_barcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'expected_qty')->textInput() ?>

    <?= $form->field($model, 'accepted_qty')->textInput() ?>

    <?= $form->field($model, 'allocated_qty')->textInput() ?>

    <?= $form->field($model, 'expected_number_places_qty')->textInput() ?>

    <?= $form->field($model, 'accepted_number_places_qty')->textInput() ?>

    <?= $form->field($model, 'allocated_number_places_qty')->textInput() ?>

    <?= $form->field($model, 'begin_datetime')->textInput() ?>

    <?= $form->field($model, 'end_datetime')->textInput() ?>

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
