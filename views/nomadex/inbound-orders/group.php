<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\Stock $model */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inbound Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="inbound-orders-group">

    <p>Hello</p>

    <table class="table table-striped table-bordered">
  
    <tr>
        <th>client_id</th>
        <th>status</th>
        <th>order number</th>
        <th>Quantity</th>
    </tr>
    <?php foreach($groups as $model): ?>
    <tr>
        <td><?= $model->client_id; ?></td>
        <td><?= $model->status; ?></td>
        <td><?= $model->order_number; ?></td>
        <td><?= $model->quantity; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>

</div>