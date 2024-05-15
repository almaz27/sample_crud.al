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
    
    <tr>
        <th><?= Html::encode($rows[0]->attributeLabels()['client_id'])?></th>
        <th><?= Html::encode($rows[0]->attributeLabels()['status_availability'])?></th>
        <th><?= Html::encode($rows[0]->attributeLabels()['inbound_order_id'])?></th>

        
        <th>Total</th>
    </tr>
    <?php foreach($rows as $row): ?>
    <tr>
        <td><?= Html::encode($row->client_id)?></td>
        <td><?= Html::encode(($row->status_availability==2)? 'Доступен': 'Не Доступен') ?></td>
        <td><?= Html::encode($row->inbound_order_id) ?></td>
        <td><?= Html::encode($row->total)?></td>
        

    </tr>
    <?php endforeach; ?>
    </table>

</div>