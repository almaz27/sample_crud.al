<?php

use app\models\nomadex\OutboundOrderItems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\nomadex\OutboundOrderItemsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Outbound Order Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outbound-order-items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Outbound Order Items', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php 
        $form = ActiveForm::begin([
            'id'=> 'outbound-product-group',
            'options' => ['class' => 'form-horizontal'],
            'action'=> ['product-name-quantity-status', 
                        'status' =>yii\helpers\BaseHtml::getAttributeValue($model,'status'),
                        ],
            'method'=>'POST']) ?>
        <?= 
        $form->field($model, 'status')->dropdownList(
                                                        ['1'=>"Available",
                                                         '0'=>"Not Available"],
                                                        ['prompt'=>'Select Status'])
                                                        ->label('Availability status: ',['class'=>'label-class'])
                                                    ?>
                                               
   
    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Show Result', ['class' => 'btn btn-primary']) ?>

        </div>
    </div>
    <div id="result-of-query">

    </div>

<?php ActiveForm::end() ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'outbound_order_id',
            'product_id',
            'product_name',
            'product_barcode',
            //'product_price',
            //'product_model',
            //'product_sku',
            //'product_madein',
            //'product_composition',
            //'product_exporter:ntext',
            //'product_importer:ntext',
            //'product_description:ntext',
            //'product_serialize_data:ntext',
            //'field_extra1',
            //'field_extra2',
            //'field_extra3',
            //'field_extra4:ntext',
            //'field_extra5:ntext',
            //'box_barcode',
            //'status',
            //'expected_qty',
            //'accepted_qty',
            //'allocated_qty',
            //'expected_number_places_qty',
            //'accepted_number_places_qty',
            //'allocated_number_places_qty',
            //'begin_datetime:datetime',
            //'end_datetime:datetime',
            //'created_user_id',
            //'updated_user_id',
            //'created_at',
            //'updated_at',
            //'deleted',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OutboundOrderItems $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
