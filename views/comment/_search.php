<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CommentSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comment-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Id') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'body') ?>

    <?= $form->field($model, 'publish_date') ?>

    <?= $form->field($model, 'publisher_id') ?>

    <?php // echo $form->field($model, 'rate') ?>

    <?php // echo $form->field($model, 'post_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
