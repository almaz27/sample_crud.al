<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrderItems $model */

$this->title = 'Update Outbound Order Items: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outbound Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="outbound-order-items-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
