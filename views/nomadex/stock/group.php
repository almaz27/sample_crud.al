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
<div class="stock-group" id="test">
    <table class="table table-striped table-bordered">
    <tr>
        <th><?= Html::encode($rows[0]->attributeLabels()['client_id'])?></th>
        <th><?= Html::encode($rows[0]->attributeLabels()['status_availability'])?></th>
        <th><?= Html::encode(($rows[0]->inbound_order_id != null)? 'Inbound Order ID' : 'Outbound Order ID') ?></th>

        
        <th>Total</th>
    </tr>
    <?php foreach($rows as $row): ?>
    <tr>
        <td><?= Html::encode($row->client_id)?></td>
        <td><?= Html::encode(($row->status_availability==2)? 'Доступен': 'Не Доступен') ?></td>
        <td><?= Html::encode(($row->inbound_order_id == null)? $row->outbound_order_id:$row->inbound_order_id) ?></td>
        <td><?= Html::encode($row->total)?></td>
        

    </tr>
    <?php endforeach; ?>
    </table>

</div>