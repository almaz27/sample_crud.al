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
    <table class="table  table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $model->getAttributeLabel('client_id') ?></th>
                <th scope="col"><?= $model->getAttributeLabel('status_availability') ?></th>
                <th scope="col"><?= $model->bound ?></th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <?php foreach ($rows as $row): ?>
            <tbody>
                <tr>
                    <td><?= $row->client_id ?></td>
                    <td><?= ($row->status_availability == 2) ? 'Доступен' : 'Не Доступен' ?></td>
                    <td><?= ($row->inbound_order_id == null) ? $row->outbound_order_id : $row->inbound_order_id ?></td>
                    <td><?= $row->total ?></td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
    <?= Html::a('Профиль', ['pdf-creator/index', 
                                'model'=>$model
                            ],
                            ['class' => ['btn', 'btn-info', 'btn-sm']]) ?>

</div>