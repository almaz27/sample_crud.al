<?php

use app\models\Programming;
use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;


/** @var yii\web\View $this */
/** @var app\models\ProgrammingSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Programmings';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="programming-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Programming', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div id="content">

    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'Id',
            'code',
            'name',
            'ratings',
            // [
            //     'attribute' => 'comments',
            //     'format' => 'raw',
            //     'value' => function ($data) {
            //         if($data->getComments()->exists()) {
            //             return Html::tag('p',$data->getComments()->all()[0]->body);
            //         }
            //         return Html::tag('p', 'nothing');
            //     },
            // ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Programming $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'code' => $model->code]);
                 }
            ],
        ],
        'rowOptions' => function ($model) {
            if($model->getComments()->exists()) {
                return ['id' => $model->Id];
            }else{
                return ['data-pjax'=>0];
            }
            
        }
    ]); ?>
   <!-- <form method = "post" id = "mailForm">
        <input type = "text" name = "name" id = "name">
        <input type = "text" name = "surname" id = "surname">
        <p>As salam</p>
        <button type = "button" id = "sendmail">Send</button>
   </form> -->
   <div id="result">
   
   </div>
   <p>
        <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Download PDF', ['pdf-creator/index'], ['class' => 'btn btn-primary',]) ?>
        <!-- <button type="submit" id='pdf'>JS</button> -->
        

    </p>
    <?php $this->registerJs("
        var thead = $('#result table thead tr');

        $(thead).each(function (index) {
            $(this).find('th').each(function () {
                let t = $(this).text();
                $(this).remove('a');
                $(this).html(t);
            });


        });
        // collect rows
        var tbody = $('#result table tbody');
        var html_t = '<table border=\"1\" cellspacing=\"3\" cellpadding=\"4\">'+'<tr>' + thead.html() + '</tr>' + tbody.html()+'</table>';

        $('#pdf').on(
            'click',
            function () {
                // $.post('pdf-creator/', html_t, function(data){console.log('data')});
                console.log(html_t);
            }
        );
        ", yii\web\View::POS_READY);
        ?>

  

</div>

