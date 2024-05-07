<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BackendUser $model */

$this->title = 'Update Backend User: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Backend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'Id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="backend-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
