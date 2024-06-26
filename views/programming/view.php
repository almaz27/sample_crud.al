<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Programming $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Programmings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerJsFile(
    'js/script'
);
?>

<div class="programming-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'code' => $model->code], ['class' => 'btn btn-primary','id'=>'T']) ?>
        <?= Html::a('Delete', ['delete', 'code' => $model->code], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::tag('p', Html::encode(''), ['id' => 'content']) ?> 
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'code',
            'name',
            'ratings',
            
        ],
    ]) ?>

</div>
