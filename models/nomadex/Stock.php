<?php

namespace app\models\nomadex;

use Yii;

/**
 * This is the model class for table "stock".
 *
 * @property int $id
 * @property int|null $scan_in_employee_id scanning inbound employee id
 * @property int|null $scan_out_employee_id scanning outbound employee id
 * @property int|null $client_id Client id
 * @property int|null $inbound_order_id Internal inbound order id
 * @property int|null $consignment_inbound_id Consignment inbound id
 * @property int|null $inbound_order_item_id Inbound order item id
 * @property string|null $inbound_order_number Inbound order number
 * @property int|null $outbound_order_id Internal outbound order id
 * @property int|null $consignment_outbound_id Consignment outbound id
 * @property int|null $outbound_order_item_id Outbound order item id
 * @property int|null $outbound_picking_list_id Internal outbound picking list id
 * @property string|null $outbound_picking_list_barcode Internal outbound picking list barcode
 * @property int|null $stock_adjustment_id stock adjustment id
 * @property int|null $stock_adjustment_status stock adjustment status
 * @property string|null $outbound_order_number Outbound order number
 * @property int|null $warehouse_id Internal warehouse order id
 * @property int|null $zone Zone: good, bad, defect
 * @property int|null $product_id Internal product id
 * @property string|null $product_name Scanned product name
 * @property string|null $product_barcode Scanned product barcode
 * @property string|null $product_model Product model
 * @property string|null $product_sku Product sku
 * @property int|null $is_product_type Product type return or one lot box
 * @property string|null $box_barcode Box barcode
 * @property string|null $box_size_barcode Box size barcode
 * @property string|null $box_size_m3 Box size m3
 * @property string|null $box_kg kg box
 * @property int|null $condition_type 1=good,2=totally damaged, 3=partially damaged, 4 = lost item, 5 = par lost
 * @property int|null $status Status new, scanned
 * @property int|null $pick_list_status Pick list scan status
 * @property int|null $status_availability 1 - Yes, 0 - No
 * @property int|null $status_lost Lost status
 * @property int|null $inventory_id
 * @property string|null $inventory_primary_address старый шк короба
 * @property string|null $inventory_secondary_address
 * @property int|null $status_inventory
 * @property string|null $primary_address Box or pallet
 * @property string|null $secondary_address Polka
 * @property int|null $address_pallet_qty Address pallet qty
 * @property int|null $address_sort_order Address sort order
 * @property string|null $kpi_value kpi value
 * @property int|null $scan_out_datetime datetime scanning outbound
 * @property int|null $scan_in_datetime  datetime scanning inbound
 * @property string|null $inbound_client_box Короб в котором тавор прибыл к нас на склад от клиента
 * @property string|null $system_status Системный статус: используется только для бизнес логики
 * @property string|null $system_status_description Описание системных статусов
 * @property string|null $field_extra1 Extra field 1
 * @property string|null $field_extra2 Extra field 2
 * @property string|null $field_extra3 Extra field 3
 * @property string|null $field_extra4 Extra field 4
 * @property string|null $field_extra5 Extra field 5
 * @property int|null $created_user_id
 * @property int|null $updated_user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted
 */
class Stock extends \yii\db\ActiveRecord
{
    public $cnt = 0;
    /**
     * {@inheritdoc}
     * @return StockQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StockQuery(get_called_class());
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stock';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('ndb');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['scan_in_employee_id', 'scan_out_employee_id', 'client_id', 'inbound_order_id', 'consignment_inbound_id', 'inbound_order_item_id', 'outbound_order_id', 'consignment_outbound_id', 'outbound_order_item_id', 'outbound_picking_list_id', 'stock_adjustment_id', 'stock_adjustment_status', 'warehouse_id', 'zone', 'product_id', 'is_product_type', 'condition_type', 'status', 'pick_list_status', 'status_availability', 'status_lost', 'inventory_id', 'status_inventory', 'address_pallet_qty', 'address_sort_order', 'scan_out_datetime', 'scan_in_datetime', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['system_status_description', 'field_extra4', 'field_extra5'], 'string'],
            [['inbound_order_number', 'outbound_picking_list_barcode', 'outbound_order_number', 'box_size_barcode', 'box_size_m3', 'box_kg', 'inbound_client_box', 'system_status'], 'string', 'max' => 32],
            [['product_name', 'product_model', 'product_sku', 'field_extra2'], 'string', 'max' => 128],
            [['product_barcode', 'box_barcode'], 'string', 'max' => 54],
            [['inventory_primary_address', 'primary_address', 'secondary_address'], 'string', 'max' => 25],
            [['inventory_secondary_address'], 'string', 'max' => 24],
            [['kpi_value'], 'string', 'max' => 512],
            [['field_extra1'], 'string', 'max' => 64],
            [['field_extra3'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'scan_in_employee_id' => 'Scan In Employee ID',
            'scan_out_employee_id' => 'Scan Out Employee ID',
            'client_id' => 'Client ID',
            'inbound_order_id' => 'Inbound Order ID',
            'consignment_inbound_id' => 'Consignment Inbound ID',
            'inbound_order_item_id' => 'Inbound Order Item ID',
            'inbound_order_number' => 'Inbound Order Number',
            'outbound_order_id' => 'Outbound Order ID',
            'consignment_outbound_id' => 'Consignment Outbound ID',
            'outbound_order_item_id' => 'Outbound Order Item ID',
            'outbound_picking_list_id' => 'Outbound Picking List ID',
            'outbound_picking_list_barcode' => 'Outbound Picking List Barcode',
            'stock_adjustment_id' => 'Stock Adjustment ID',
            'stock_adjustment_status' => 'Stock Adjustment Status',
            'outbound_order_number' => 'Outbound Order Number',
            'warehouse_id' => 'Warehouse ID',
            'zone' => 'Zone',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_barcode' => 'Product Barcode',
            'product_model' => 'Product Model',
            'product_sku' => 'Product Sku',
            'is_product_type' => 'Is Product Type',
            'box_barcode' => 'Box Barcode',
            'box_size_barcode' => 'Box Size Barcode',
            'box_size_m3' => 'Box Size M3',
            'box_kg' => 'Box Kg',
            'condition_type' => 'Condition Type',
            'status' => 'Status',
            'pick_list_status' => 'Pick List Status',
            'status_availability' => 'Status Availability',
            'status_lost' => 'Status Lost',
            'inventory_id' => 'Inventory ID',
            'inventory_primary_address' => 'Inventory Primary Address',
            'inventory_secondary_address' => 'Inventory Secondary Address',
            'status_inventory' => 'Status Inventory',
            'primary_address' => 'Primary Address',
            'secondary_address' => 'Secondary Address',
            'address_pallet_qty' => 'Address Pallet Qty',
            'address_sort_order' => 'Address Sort Order',
            'kpi_value' => 'Kpi Value',
            'scan_out_datetime' => 'Scan Out Datetime',
            'scan_in_datetime' => 'Scan In Datetime',
            'inbound_client_box' => 'Inbound Client Box',
            'system_status' => 'System Status',
            'system_status_description' => 'System Status Description',
            'field_extra1' => 'Field Extra1',
            'field_extra2' => 'Field Extra2',
            'field_extra3' => 'Field Extra3',
            'field_extra4' => 'Field Extra4',
            'field_extra5' => 'Field Extra5',
            'created_user_id' => 'Created User ID',
            'updated_user_id' => 'Updated User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    
}
