<?php

namespace app\models\nomadex;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\nomadex\OutboundOrderItems;

/**
 * OutboundOrderItemsSearch represents the model behind the search form of `app\models\nomadex\OutboundOrderItems`.
 */
class OutboundOrderItemsSearch extends OutboundOrderItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'outbound_order_id', 'product_id', 'status', 'expected_qty', 'accepted_qty', 'allocated_qty', 'expected_number_places_qty', 'accepted_number_places_qty', 'allocated_number_places_qty', 'begin_datetime', 'end_datetime', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['product_name', 'product_barcode', 'product_model', 'product_sku', 'product_madein', 'product_composition', 'product_exporter', 'product_importer', 'product_description', 'product_serialize_data', 'field_extra1', 'field_extra2', 'field_extra3', 'field_extra4', 'field_extra5', 'box_barcode'], 'safe'],
            [['product_price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = OutboundOrderItems::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'outbound_order_id' => $this->outbound_order_id,
            'product_id' => $this->product_id,
            'product_price' => $this->product_price,
            'status' => $this->status,
            'expected_qty' => $this->expected_qty,
            'accepted_qty' => $this->accepted_qty,
            'allocated_qty' => $this->allocated_qty,
            'expected_number_places_qty' => $this->expected_number_places_qty,
            'accepted_number_places_qty' => $this->accepted_number_places_qty,
            'allocated_number_places_qty' => $this->allocated_number_places_qty,
            'begin_datetime' => $this->begin_datetime,
            'end_datetime' => $this->end_datetime,
            'created_user_id' => $this->created_user_id,
            'updated_user_id' => $this->updated_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_barcode', $this->product_barcode])
            ->andFilterWhere(['like', 'product_model', $this->product_model])
            ->andFilterWhere(['like', 'product_sku', $this->product_sku])
            ->andFilterWhere(['like', 'product_madein', $this->product_madein])
            ->andFilterWhere(['like', 'product_composition', $this->product_composition])
            ->andFilterWhere(['like', 'product_exporter', $this->product_exporter])
            ->andFilterWhere(['like', 'product_importer', $this->product_importer])
            ->andFilterWhere(['like', 'product_description', $this->product_description])
            ->andFilterWhere(['like', 'product_serialize_data', $this->product_serialize_data])
            ->andFilterWhere(['like', 'field_extra1', $this->field_extra1])
            ->andFilterWhere(['like', 'field_extra2', $this->field_extra2])
            ->andFilterWhere(['like', 'field_extra3', $this->field_extra3])
            ->andFilterWhere(['like', 'field_extra4', $this->field_extra4])
            ->andFilterWhere(['like', 'field_extra5', $this->field_extra5])
            ->andFilterWhere(['like', 'box_barcode', $this->box_barcode]);

        return $dataProvider;
    }
}
