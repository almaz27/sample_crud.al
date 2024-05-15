<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrders $model */

$this->title = 'Update Outbound Orders: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Outbound Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="outbound-orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
