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

    

 <?php $this->registerJs("
    
    ")?>
  
   






    





</div>
