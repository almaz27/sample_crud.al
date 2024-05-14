<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\Stock $model */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-group">

    <p>Hello</p>

    <table class="table table-striped table-bordered">
  <?php foreach($model as $key): ?>
    <tr>
        <th><?= $key->attributeLabels()['client_id']?></th>
        <th><?= $key->attributeLabels()['status']?></th>
        <th>Quantity</th>
    </tr>
    <tr>
        <td><?= $key->client_id; ?></td>
        <td><?= $key->status; ?></td>
        <td><?= $key->cnt; ?></td>

    </tr>
    <?php endforeach; ?>
    </table>

</div>