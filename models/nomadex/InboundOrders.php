<?php

namespace app\models\nomadex;

use Yii;

/**
 * This is the model class for table "inbound_orders".
 *
 * @property int $id
 * @property string|null $client_order_id ID client order
 * @property int|null $client_id Client store id
 * @property int|null $supplier_id Supplier store id
 * @property int|null $warehouse_id Warehouse store id
 * @property int|null $from_point_id Internal from point id
 * @property int|null $to_point_id Internal to point id
 * @property string|null $from_point_title Internal from point title
 * @property string|null $to_point_title Internal to point title
 * @property string|null $order_number Order number, received from the client
 * @property string|null $parent_order_number Parent order number
 * @property string|null $client_box_barcode Client barcode box
 * @property int|null $consignment_inbound_order_id Consignment order internal id
 * @property int|null $order_type Order type: stock, cross-doc, etc
 * @property int|null $delivery_type CROSS-DOCK, RPT, etc ... 
 * @property int|null $status Status new, in process, complete, etc
 * @property int|null $cargo_status
 * @property int|null $expected_qty Expected product quantity in order
 * @property int|null $accepted_qty Accepted product quantity in order
 * @property int|null $allocated_qty
 * @property int|null $accepted_number_places_qty Accepted number places quantity in order
 * @property int|null $expected_number_places_qty Expected number places quantity in order
 * @property int|null $zone Zone inbound: good, bad, defect
 * @property int|null $expected_datetime The expected date of delivery in stock
 * @property int|null $begin_datetime The start time of the scan order
 * @property int|null $end_datetime The end time of the scan order
 * @property int|null $date_confirm Confirmation timestamp
 * @property string|null $extra_fields Example JSON: order_number, who received order, etc ...
 * @property int|null $data_created_on_client Date time created order on client system
 * @property string|null $comments Comments
 * @property int|null $created_user_id
 * @property int|null $updated_user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted
 */
class InboundOrders extends \yii\db\ActiveRecord
{
    public $quantity = 0;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inbound_orders';
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
            [['client_id', 'supplier_id', 'warehouse_id', 'from_point_id', 'to_point_id', 'consignment_inbound_order_id', 'order_type', 'delivery_type', 'status', 'cargo_status', 'expected_qty', 'accepted_qty', 'allocated_qty', 'accepted_number_places_qty', 'expected_number_places_qty', 'zone', 'expected_datetime', 'begin_datetime', 'end_datetime', 'date_confirm', 'data_created_on_client', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['extra_fields', 'comments'], 'string'],
            [['client_order_id', 'order_number', 'parent_order_number'], 'string', 'max' => 64],
            [['from_point_title', 'to_point_title'], 'string', 'max' => 255],
            [['client_box_barcode'], 'string', 'max' => 128],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_order_id' => 'Client Order ID',
            'client_id' => 'Client ID',
            'supplier_id' => 'Supplier ID',
            'warehouse_id' => 'Warehouse ID',
            'from_point_id' => 'From Point ID',
            'to_point_id' => 'To Point ID',
            'from_point_title' => 'From Point Title',
            'to_point_title' => 'To Point Title',
            'order_number' => 'Order Number',
            'parent_order_number' => 'Parent Order Number',
            'client_box_barcode' => 'Client Box Barcode',
            'consignment_inbound_order_id' => 'Consignment Inbound Order ID',
            'order_type' => 'Order Type',
            'delivery_type' => 'Delivery Type',
            'status' => 'Status',
            'cargo_status' => 'Cargo Status',
            'expected_qty' => 'Expected Qty',
            'accepted_qty' => 'Accepted Qty',
            'allocated_qty' => 'Allocated Qty',
            'accepted_number_places_qty' => 'Accepted Number Places Qty',
            'expected_number_places_qty' => 'Expected Number Places Qty',
            'zone' => 'Zone',
            'expected_datetime' => 'Expected Datetime',
            'begin_datetime' => 'Begin Datetime',
            'end_datetime' => 'End Datetime',
            'date_confirm' => 'Date Confirm',
            'extra_fields' => 'Extra Fields',
            'data_created_on_client' => 'Data Created On Client',
            'comments' => 'Comments',
            'created_user_id' => 'Created User ID',
            'updated_user_id' => 'Updated User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * {@inheritdoc}
     * @return InboundOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InboundOrdersQuery(get_called_class());
    }
}
