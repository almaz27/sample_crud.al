<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programming $model */

$this->title = 'Update Programming: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Programmings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'code' => $model->code]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programming-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
