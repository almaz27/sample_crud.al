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
    <?php foreach($rows as $row): ?>
    <tr>
        <th><?= $row->attributeLabels()['client_id']?></th>
        <th><?= $row->attributeLabels()['status_availability']?></th>
        <th><?= $row->attributeLabels()['inbound_order_id']?></th>
        
        <th>Total</th>
    </tr>
    
    <tr>
        <td><?= $row->client_id; ?></td>
        <td><?= $row->a; ?></td>
        <td><?= $row->inbound_order_id; ?></td>
        
        <td><?= $row->total; ?></td>
        

    </tr>
    <?php endforeach; ?>
    </table>

</div>