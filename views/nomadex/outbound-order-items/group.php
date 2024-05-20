<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap5\Button;

/** @var yii\web\View $this */
/** @var app\models\nomadex\Stock $model */

// $this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Outbound Order Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="stock-group" id="test">
    
    <div class="d-flex flex-row-reverse">
    <!-- Html::a('PDF', ['/outbound-order-items/action'], ['class'=>'btn btn-primary'])  -->
    <?= Html::a('<span class="btn-label">Convert to PDF </span>', ['topdf', 'rows' => $rows], ['class' => 'btn btn-primary']) ?>
</div>

</div>
    <table class="table table-striped table-bordered">
    <tr>
        <th><?= Html::encode($rows[0]->attributeLabels()['product_name'])?></th>
        <th><?= Html::encode($rows[0]->attributeLabels()['status'])?></th>
        <th>Accepted Quantity</th>
        <th>Expected Quantity</th>
    </tr>
    <?php foreach($rows as $row): ?>
    <tr>
        <td><?= $row->product_name ?></td>
        <td><?= ($row->status=='11')? 'Не доступен' : 'Доступен' ?></td>
        <td><?= $row->accepted_qity?></td>
        <td><?= $row->expected_qity?></td>
        

    </tr>
    <?php endforeach; ?>
    </table>

</div>