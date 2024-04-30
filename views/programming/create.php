<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Programming $model */

$this->title = 'Create Programming';
$this->params['breadcrumbs'][] = ['label' => 'Programmings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programming-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
