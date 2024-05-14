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
  <?php foreach($groups as $model): ?>
    <tr>
        <th><?= $model->attributeLabels()['client_id']?></th>
        <th><?= $model->attributeLabels()['status']?></th>
        <th><?= $model->attributeLabels()['order_number']?></th>
    </tr>
    <tr>
        <td><?= $model->client_id; ?></td>
        <td><?= $model->status; ?></td>
        <td><?= $model->order_number; ?></td>

    </tr>
    <?php endforeach; ?>
    </table>

</div>