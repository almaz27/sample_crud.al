<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\nomadex\InboundOrders $model */

$this->title = 'Create Inbound Orders';
$this->params['breadcrumbs'][] = ['label' => 'Inbound Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inbound-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
