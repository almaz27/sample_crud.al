<?php

use app\models\Programming;
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\CommentSearch;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */

$this->title = $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Id' => $model->Id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Id' => $model->Id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id',
            'status',
            'body:ntext',
            'publish_date',
            [                      // the owner name of the model
                'label' => 'Post',
                'value' => $model->post->name,
            ],
            'publisher_id',
            'rate',
            // 'post_id',
        ],
    ]) ?>

</div>
