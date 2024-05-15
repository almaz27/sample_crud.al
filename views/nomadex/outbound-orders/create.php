<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrders $model */

$this->title = 'Create Outbound Orders';
$this->params['breadcrumbs'][] = ['label' => 'Outbound Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbound-orders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
