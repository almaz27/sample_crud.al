<?php

namespace app\models\nomadex;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\nomadex\Stock;

/**
 * StockSearch represents the model behind the search form of `app\models\nomadex\Stock`.
 */
class StockSearch extends Stock
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'scan_in_employee_id', 'scan_out_employee_id', 'client_id', 'inbound_order_id', 'consignment_inbound_id', 'inbound_order_item_id', 'outbound_order_id', 'consignment_outbound_id', 'outbound_order_item_id', 'outbound_picking_list_id', 'stock_adjustment_id', 'stock_adjustment_status', 'warehouse_id', 'zone', 'product_id', 'is_product_type', 'condition_type', 'status', 'pick_list_status', 'status_availability', 'status_lost', 'inventory_id', 'status_inventory', 'address_pallet_qty', 'address_sort_order', 'scan_out_datetime', 'scan_in_datetime', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['inbound_order_number', 'outbound_picking_list_barcode', 'outbound_order_number', 'product_name', 'product_barcode', 'product_model', 'product_sku', 'box_barcode', 'box_size_barcode', 'box_size_m3', 'box_kg', 'inventory_primary_address', 'inventory_secondary_address', 'primary_address', 'secondary_address', 'kpi_value', 'inbound_client_box', 'system_status', 'system_status_description', 'field_extra1', 'field_extra2', 'field_extra3', 'field_extra4', 'field_extra5'], 'safe'],
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
        $query = Stock::find();

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
            'scan_in_employee_id' => $this->scan_in_employee_id,
            'scan_out_employee_id' => $this->scan_out_employee_id,
            'client_id' => $this->client_id,
            'inbound_order_id' => $this->inbound_order_id,
            'consignment_inbound_id' => $this->consignment_inbound_id,
            'inbound_order_item_id' => $this->inbound_order_item_id,
            'outbound_order_id' => $this->outbound_order_id,
            'consignment_outbound_id' => $this->consignment_outbound_id,
            'outbound_order_item_id' => $this->outbound_order_item_id,
            'outbound_picking_list_id' => $this->outbound_picking_list_id,
            'stock_adjustment_id' => $this->stock_adjustment_id,
            'stock_adjustment_status' => $this->stock_adjustment_status,
            'warehouse_id' => $this->warehouse_id,
            'zone' => $this->zone,
            'product_id' => $this->product_id,
            'is_product_type' => $this->is_product_type,
            'condition_type' => $this->condition_type,
            'status' => $this->status,
            'pick_list_status' => $this->pick_list_status,
            'status_availability' => $this->status_availability,
            'status_lost' => $this->status_lost,
            'inventory_id' => $this->inventory_id,
            'status_inventory' => $this->status_inventory,
            'address_pallet_qty' => $this->address_pallet_qty,
            'address_sort_order' => $this->address_sort_order,
            'scan_out_datetime' => $this->scan_out_datetime,
            'scan_in_datetime' => $this->scan_in_datetime,
            'created_user_id' => $this->created_user_id,
            'updated_user_id' => $this->updated_user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted' => $this->deleted,
        ]);

        $query->andFilterWhere(['like', 'inbound_order_number', $this->inbound_order_number])
            ->andFilterWhere(['like', 'outbound_picking_list_barcode', $this->outbound_picking_list_barcode])
            ->andFilterWhere(['like', 'outbound_order_number', $this->outbound_order_number])
            ->andFilterWhere(['like', 'product_name', $this->product_name])
            ->andFilterWhere(['like', 'product_barcode', $this->product_barcode])
            ->andFilterWhere(['like', 'product_model', $this->product_model])
            ->andFilterWhere(['like', 'product_sku', $this->product_sku])
            ->andFilterWhere(['like', 'box_barcode', $this->box_barcode])
            ->andFilterWhere(['like', 'box_size_barcode', $this->box_size_barcode])
            ->andFilterWhere(['like', 'box_size_m3', $this->box_size_m3])
            ->andFilterWhere(['like', 'box_kg', $this->box_kg])
            ->andFilterWhere(['like', 'inventory_primary_address', $this->inventory_primary_address])
            ->andFilterWhere(['like', 'inventory_secondary_address', $this->inventory_secondary_address])
            ->andFilterWhere(['like', 'primary_address', $this->primary_address])
            ->andFilterWhere(['like', 'secondary_address', $this->secondary_address])
            ->andFilterWhere(['like', 'kpi_value', $this->kpi_value])
            ->andFilterWhere(['like', 'inbound_client_box', $this->inbound_client_box])
            ->andFilterWhere(['like', 'system_status', $this->system_status])
            ->andFilterWhere(['like', 'system_status_description', $this->system_status_description])
            ->andFilterWhere(['like', 'field_extra1', $this->field_extra1])
            ->andFilterWhere(['like', 'field_extra2', $this->field_extra2])
            ->andFilterWhere(['like', 'field_extra3', $this->field_extra3])
            ->andFilterWhere(['like', 'field_extra4', $this->field_extra4])
            ->andFilterWhere(['like', 'field_extra5', $this->field_extra5]);

        return $dataProvider;
    }
}
