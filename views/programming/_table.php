<?php 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
?>
<div>
    <p>TEST</p>
</div>

    <?= 
    // ListView::widget([
    //  'dataProvider' => $model,
    //  'options' => [
    //     'tag' => 'div',
    //     'class' => 'list-wrapper',
    //     'id' => 'list-wrapper',
    //     ],
    //     'layout' => "{pager}\n{items}\n{summary}",
        // 'itemView' => function ($model, $key, $index, $widget) {
        //     return $this->render('_list_item',['model' => $model]);
           
        //     // or just do some echo
        //     // return $model->title . ' posted by ' . $model->author;
        //     },
           
    // ]); 
    // DetailView::widget([
    //     'model' => $model,
    //     'attributes' => [
    //         'publish_date',
    //         'body',
    //         'publisher_id',
            
    //     ],
    // ]) 
    GridView::widget([
        'dataProvider' => $model,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id',
            'status',
            'body:ntext',
            'publish_date',
            'publisher_id',
            //'rate',
            //'post_id',
            // [
            //     'class' => ActionColumn::className(),
            //     'urlCreator' => function ($action, Comment $model, $key, $index, $column) {
            //         return Url::toRoute([$action, 'Id' => $model->Id]);
            //      }
            // ],
        ],
    ]); 
    ?>