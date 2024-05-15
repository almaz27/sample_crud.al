<?php

namespace app\models\nomadex;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\nomadex\OutboundOrders;

/**
 * OutboundOrdersSearch represents the model behind the search form of `app\models\nomadex\OutboundOrders`.
 */
class OutboundOrdersSearch extends OutboundOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'outbound_registry_id', 'client_id', 'supplier_id', 'warehouse_id', 'from_point_id', 'to_point_id', 'zone', 'consignment_outbound_order_id', 'order_type', 'delivery_type', 'status', 'cargo_status', 'expected_qty', 'accepted_qty', 'allocated_qty', 'accepted_number_places_qty', 'expected_number_places_qty', 'allocated_number_places_qty', 'expected_datetime', 'begin_datetime', 'end_datetime', 'date_confirm', 'data_created_on_client', 'packing_date', 'date_left_warehouse', 'date_delivered', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['client_order_id', 'to_point_title', 'from_point_title', 'order_number', 'parent_order_number', 'extra_status', 'extra_fields', 'title', 'description', 'fail_delivery_status', 'api_send_data', 'api_complete_status'], 'safe'],
            [['mc', 'kg'], 'number'],
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
        $query = OutboundOrders::find();

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
            'outbound_registry_id' => $this->outbound_registry_id,
            'client_id' => $this->client_id,
            'supplier_id' => $this->supplier_id,
            'warehouse_id' => $this->warehouse_id,
            'from_point_id' => $this->from_point_id,
            'to_point_id' => $this->to_point_id,
            'zone' => $this->zone,
            'consignment_outbound_order_id' => $this->consignment_outbound_order_id,
            'order_type' => $this->order_type,
            'delivery_type' => $this->delivery_type,
            'status' => $this->status,
            'cargo_status' => $this->cargo_status,
            'mc' => $this->mc,
            'kg' => $this->kg,
            'expected_qty' => $this->expected_qty,
            'accepted_qty' => $this->accepted_qty,
            'allocated_qty' => $this->allocated_qty,
            'accepted_number_places_qty' => $this->accepted_number_places_qty,
            'expected_number_places_qty' => $this->expected_number_places_qty,
            'allocated_number_places_qty' => $this->allocated_number_places_qty,
            'expected_datetime' => $this->expected_datetime,
            'begin_datetime' => $this->begin_datetime,
            'end_datetime' => $this->end_datetime,
            'date_confirm' => $this->date_confirm,
            'data_created_on_client' => $this->data_created_on_client,
            'packing_date' => $this->packing_date,
            'date_left_warehouse' => $this->date_left_warehouse,
            'date_delivered' => $this->date_delivered,
            'created_user_id' => $this->created_user_id,
            'updated_user_id' => $this->updated_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'client_order_id', $this->client_order_id])
            ->andFilterWhere(['like', 'to_point_title', $this->to_point_title])
            ->andFilterWhere(['like', 'from_point_title', $this->from_point_title])
            ->andFilterWhere(['like', 'order_number', $this->order_number])
            ->andFilterWhere(['like', 'parent_order_number', $this->parent_order_number])
            ->andFilterWhere(['like', 'extra_status', $this->extra_status])
            ->andFilterWhere(['like', 'extra_fields', $this->extra_fields])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'fail_delivery_status', $this->fail_delivery_status])
            ->andFilterWhere(['like', 'api_send_data', $this->api_send_data])
            ->andFilterWhere(['like', 'api_complete_status', $this->api_complete_status]);

        return $dataProvider;
    }
}
