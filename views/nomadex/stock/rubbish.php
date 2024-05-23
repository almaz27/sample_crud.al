<?php
use \yii\helpers\Html;
use \yii\widgets\ActiveForm;

?>
<p>
    <?= Html::a('Отчеты: коробка на отгрузке', ['list-filter'], ['class' => 'btn btn-primary']) ?>
</p>

<?php
    $form = ActiveForm::begin([
        'id' => 'stock-group',
        'options' => ['class' => 'form-horizontal'],
        'action' => [
            'client-bounds-total-available',
            // 'statusAvailable' =>yii\helpers\BaseHtml::getAttributeValue($model,'status_availability'),
            // 'client_id' =>yii\helpers\BaseHtml::getAttributeValue($model,'client_id'),
        ],
        'method' => 'POST'
    ]) ?>
    <?=
        $form->field($model, 'status_availability')->dropdownList(
            $status,
            ['prompt' => 'Select Status']
        )
            ->label('Availability status: ', ['class' => 'label-class'])
        ?>
    <?=
        $form->field($model, 'client_id')->dropdownList(
            $clients,
            ['prompt' => 'Select Client']
        )
            ->label('Client: ', ['class' => 'label-class'])
        ?>
    <?=
        $form->field($model, 'bound')->dropdownList(
            [
                'inbound_order_id' => 'Inbound Order Id',
                'outbound_order_id' => 'Outbound Order Id',
            ],
            ['prompt' => 'Select Type Of Bound']
        )
            ->label('Client: ', ['class' => 'label-class'])
        ?>

</div>

<div class="form-group">
    <div class="col-lg-offset-1 col-lg-11">
        <?= Html::submitButton('Show Result', ['class' => 'btn btn-primary']) ?>
    </div>
</div>
<div id="result-of-query">
</div>

<?php ActiveForm::end() ?>