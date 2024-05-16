<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\nomadex\Stock $model */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outbound Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-group" id="test">
    <table class="table table-striped table-bordered">
    
    <tr>
        <th><?= Html::encode($rows[0]->attributeLabels()['product_name'])?></th>
        <th><?= Html::encode($rows[0]->attributeLabels()['status'])?></th>
        <th>Accepted Quantity</th>
        <th>Expected Quantity</th>
    </tr>
    <?php foreach($rows as $row): ?>
    <tr>
        <td><?= Html::encode($row->product_name)?></td>
        <td><?= Html::encode($row->status=='11')?'Не доступен':'Доступен' ?></td>
        <td><?= Html::encode($row->accepted_qity)?></td>
        <td><?= Html::encode($row->expected_qity)?></td>
        

    </tr>
    <?php endforeach; ?>
    </table>

</div>