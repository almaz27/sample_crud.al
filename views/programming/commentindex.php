<?php

use app\models\Comment;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\CommentSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

// $this->title = 'Comments';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($model->name.' comments ') ?></h1>

    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


   <?= GridView::widget([
        'id' => 'table',
        'dataProvider' => $dataProvider,
        
        // 'filterModel' => $searchModel,
        // 'rowOptions'=>function ($model, $index, $widget, $grid) {

        //     if (count($model->comments) == 0) {
        //         return ['data-pjax'=> '0'];
        //     }
        //  },
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

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
   ?><p>
   <?= Html::a('Create Comment', ['create'], ['class' => 'btn btn-success']) ?>
    <!-- Html::a('Download PDF', ['pdf-creator/index'], ['class' => 'btn btn-primary',])  -->
   <button type="submit" id='pdf'>JS</button>
   

</p>
<?php $this->registerJs("



$('#pdf').on('click',function(){
    var obj = new Object();
    var title = $('.comment-index h1').html()
    var textHtml = $('#table').html();
    
    if (textHtml !== '' && title !== '') {
        // showSpinner();
        obj.title=title;
        obj.textHtml=textHtml;

        $.ajax(
            {
                url: '/yii_crud/web/index.php/pdf-creator/ajax',
                dataType: 'text',
                data: obj,
                type: 'post',
                success: function (ans) {

                    // var result = JSON.parse(ans);
                    // var name = ans.NAME;
                    // var path = ans.PATH;
                    // console.log(ans);
                    console.log(result.NAME);

                    // setTimeout(function () {
                    //     if(name === 'send'){

                    //     }else if(name === 'print'){
                    //         var file = window.open(path);
                    //         file.print();
                    //     }else{
                    //         window.open(path);
                    //     }
                    //     // hideSpinner();
                    // }, 1000);
                },
                error:function(data){
                    console.log('Fail');
                    console.log(data);
                }
            });
    }
});
", yii\web\View::POS_READY);
?>

   
   
   

  
</div>


 
