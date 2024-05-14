<?php

namespace app\models\nomadex;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\nomadex\InboundOrders;

/**
 * InboundOrdersSearch represents the model behind the search form of `app\models\nomadex\InboundOrders`.
 */
class InboundOrdersSearch extends InboundOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'supplier_id', 'warehouse_id', 'from_point_id', 'to_point_id', 'consignment_inbound_order_id', 'order_type', 'delivery_type', 'status', 'cargo_status', 'expected_qty', 'accepted_qty', 'allocated_qty', 'accepted_number_places_qty', 'expected_number_places_qty', 'zone', 'expected_datetime', 'begin_datetime', 'end_datetime', 'date_confirm', 'data_created_on_client', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['client_order_id', 'from_point_title', 'to_point_title', 'order_number', 'parent_order_number', 'client_box_barcode', 'extra_fields', 'comments'], 'safe'],
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
        $query = InboundOrders::find();

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
            'client_id' => $this->client_id,
            'supplier_id' => $this->supplier_id,
            'warehouse_id' => $this->warehouse_id,
            'from_point_id' => $this->from_point_id,
            'to_point_id' => $this->to_point_id,
            'consignment_inbound_order_id' => $this->consignment_inbound_order_id,
            'order_type' => $this->order_type,
            'delivery_type' => $this->delivery_type,
            'status' => $this->status,
            'cargo_status' => $this->cargo_status,
            'expected_qty' => $this->expected_qty,
            'accepted_qty' => $this->accepted_qty,
            'allocated_qty' => $this->allocated_qty,
            'accepted_number_places_qty' => $this->accepted_number_places_qty,
            'expected_number_places_qty' => $this->expected_number_places_qty,
            'zone' => $this->zone,
            'expected_datetime' => $this->expected_datetime,
            'begin_datetime' => $this->begin_datetime,
            'end_datetime' => $this->end_datetime,
            'date_confirm' => $this->date_confirm,
            'data_created_on_client' => $this->data_created_on_client,
            'created_user_id' => $this->created_user_id,
            'updated_user_id' => $this->updated_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'client_order_id', $this->client_order_id])
            ->andFilterWhere(['like', 'from_point_title', $this->from_point_title])
            ->andFilterWhere(['like', 'to_point_title', $this->to_point_title])
            ->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'parent_order_number', $this->parent_order_number])
            ->andFilterWhere(['like', 'client_box_barcode', $this->client_box_barcode])
            ->andFilterWhere(['like', 'extra_fields', $this->extra_fields])
            ->andFilterWhere(['like', 'comments', $this->comments]);

        return $dataProvider;
    }
}
