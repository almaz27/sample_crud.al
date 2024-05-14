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

    <table>
  <?php foreach($model as $key): ?>
    <tr>
        <th>Status</th>
        <th>CLient ID</th>
    </tr>
    <tr>
        <td><?= $key->status; ?></td>
        <td><?= $key->client_id; ?></td>

    </tr>
    <?php endforeach; ?>
    </table>

</div>