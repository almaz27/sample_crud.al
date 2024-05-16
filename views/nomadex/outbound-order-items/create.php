<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrderItems $model */

$this->title = 'Create Outbound Order Items';
$this->params['breadcrumbs'][] = ['label' => 'Outbound Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbound-order-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
