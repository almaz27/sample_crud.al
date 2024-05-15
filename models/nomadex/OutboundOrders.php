<?php

namespace app\models\nomadex;

use Yii;

/**
 * This is the model class for table "outbound_orders".
 *
 * @property int $id
 * @property int|null $outbound_registry_id Outbound registry id
 * @property string|null $client_order_id ID client order
 * @property int|null $client_id Client store id
 * @property int|null $supplier_id Supplier store id
 * @property int|null $warehouse_id Warehouse store id
 * @property int|null $from_point_id Internal from point id
 * @property int|null $to_point_id Internal to point id
 * @property string|null $to_point_title Internal from point text value
 * @property string|null $from_point_title Internal from point text value
 * @property string|null $order_number
 * @property string|null $parent_order_number
 * @property int|null $zone Zone outbound: good, bad, defect
 * @property int|null $consignment_outbound_order_id Consignment outbound order id
 * @property int|null $order_type Order type: stock, cross-doc, etc
 * @property int|null $delivery_type CROSS-DOCK, RPT, etc ... 
 * @property int|null $status Status new, in process, complete, etc
 * @property int|null $cargo_status
 * @property string|null $extra_status Специальный статус
 * @property float|null $mc Volume
 * @property float|null $kg Weight
 * @property int|null $expected_qty Expected product quantity in order
 * @property int|null $accepted_qty Accepted product quantity in order
 * @property int|null $allocated_qty Allocate quantity
 * @property int|null $accepted_number_places_qty Accepted number places quantity in order
 * @property int|null $expected_number_places_qty Expected number places quantity in order
 * @property int|null $allocated_number_places_qty Allocate number places quantity
 * @property int|null $expected_datetime The expected date of delivery in stock
 * @property int|null $begin_datetime The start time of the scan order
 * @property int|null $end_datetime The end time of the scan order
 * @property int|null $date_confirm Confirmation timestamp
 * @property int|null $data_created_on_client Client order creation ts
 * @property string|null $extra_fields Example JSON: order_number, who received order, etc ...
 * @property string|null $title
 * @property string|null $description
 * @property int|null $packing_date Print label ts
 * @property int|null $date_left_warehouse Print TTN ts
 * @property int|null $date_delivered Delivery ts
 * @property string|null $fail_delivery_status Fail delivery status
 * @property string|null $api_send_data Данне которые отправляем по апи
 * @property string|null $api_complete_status Накладная закрыта по апи
 * @property int|null $created_user_id
 * @property int|null $updated_user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted
 */
class OutboundOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'outbound_orders';
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
            [['outbound_registry_id', 'client_id', 'supplier_id', 'warehouse_id', 'from_point_id', 'to_point_id', 'zone', 'consignment_outbound_order_id', 'order_type', 'delivery_type', 'status', 'cargo_status', 'expected_qty', 'accepted_qty', 'allocated_qty', 'accepted_number_places_qty', 'expected_number_places_qty', 'allocated_number_places_qty', 'expected_datetime', 'begin_datetime', 'end_datetime', 'date_confirm', 'data_created_on_client', 'packing_date', 'date_left_warehouse', 'date_delivered', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['mc', 'kg'], 'number'],
            [['extra_fields', 'description', 'fail_delivery_status', 'api_send_data'], 'string'],
            [['client_order_id'], 'string', 'max' => 64],
            [['to_point_title', 'from_point_title', 'extra_status'], 'string', 'max' => 256],
            [['order_number', 'parent_order_number', 'title', 'api_complete_status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'outbound_registry_id' => 'Outbound Registry ID',
            'client_order_id' => 'Client Order ID',
            'client_id' => 'Client ID',
            'supplier_id' => 'Supplier ID',
            'warehouse_id' => 'Warehouse ID',
            'from_point_id' => 'From Point ID',
            'to_point_id' => 'To Point ID',
            'to_point_title' => 'To Point Title',
            'from_point_title' => 'From Point Title',
            'order_number' => 'Order Number',
            'parent_order_number' => 'Parent Order Number',
            'zone' => 'Zone',
            'consignment_outbound_order_id' => 'Consignment Outbound Order ID',
            'order_type' => 'Order Type',
            'delivery_type' => 'Delivery Type',
            'status' => 'Status',
            'cargo_status' => 'Cargo Status',
            'extra_status' => 'Extra Status',
            'mc' => 'Mc',
            'kg' => 'Kg',
            'expected_qty' => 'Expected Qty',
            'accepted_qty' => 'Accepted Qty',
            'allocated_qty' => 'Allocated Qty',
            'accepted_number_places_qty' => 'Accepted Number Places Qty',
            'expected_number_places_qty' => 'Expected Number Places Qty',
            'allocated_number_places_qty' => 'Allocated Number Places Qty',
            'expected_datetime' => 'Expected Datetime',
            'begin_datetime' => 'Begin Datetime',
            'end_datetime' => 'End Datetime',
            'date_confirm' => 'Date Confirm',
            'data_created_on_client' => 'Data Created On Client',
            'extra_fields' => 'Extra Fields',
            'title' => 'Title',
            'description' => 'Description',
            'packing_date' => 'Packing Date',
            'date_left_warehouse' => 'Date Left Warehouse',
            'date_delivered' => 'Date Delivered',
            'fail_delivery_status' => 'Fail Delivery Status',
            'api_send_data' => 'Api Send Data',
            'api_complete_status' => 'Api Complete Status',
            'created_user_id' => 'Created User ID',
            'updated_user_id' => 'Updated User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OutboundOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OutboundOrdersQuery(get_called_class());
    }
}
