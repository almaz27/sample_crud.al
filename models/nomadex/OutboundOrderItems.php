<?php

namespace app\models\nomadex;

use Yii;

/**
 * This is the model class for table "outbound_order_items".
 *
 * @property int $id
 * @property int $outbound_order_id Internal outbound order id
 * @property int|null $product_id Internal product id
 * @property string|null $product_name Scanned product name
 * @property string|null $product_barcode Scanned product barcode
 * @property float|null $product_price Product price
 * @property string|null $product_model Product model
 * @property string|null $product_sku Product sku
 * @property string|null $product_madein Product made in
 * @property string|null $product_composition Product composition
 * @property string|null $product_exporter Product exporter
 * @property string|null $product_importer Product importer
 * @property string|null $product_description Product importer
 * @property string|null $product_serialize_data Product serialize data
 * @property string|null $field_extra1 Extra field 1
 * @property string|null $field_extra2 Extra field 2
 * @property string|null $field_extra3 Extra field 3
 * @property string|null $field_extra4 Extra field 4
 * @property string|null $field_extra5 Extra field 5
 * @property string|null $box_barcode Box barcode
 * @property int|null $status Status new, scanned
 * @property int|null $expected_qty Expected product quantity in order
 * @property int|null $accepted_qty Accepted product quantity in order
 * @property int|null $allocated_qty Allocate number places quantity
 * @property int|null $expected_number_places_qty Expected number places
 * @property int|null $accepted_number_places_qty Accepted number places quantity
 * @property int|null $allocated_number_places_qty Allocate number places quantity
 * @property int|null $begin_datetime The start time of the scan order
 * @property int|null $end_datetime The end time of the scan order
 * @property int|null $created_user_id
 * @property int|null $updated_user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $deleted
 */
class OutboundOrderItems extends \yii\db\ActiveRecord
{
    public $accepted_qity;
    public $expected_qity;
    public $product_name;
    public $status;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'outbound_order_items';
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
            [['outbound_order_id'], 'required'],
            [['outbound_order_id', 'product_id', 'status', 'expected_qty', 'accepted_qty', 'allocated_qty', 'expected_number_places_qty', 'accepted_number_places_qty', 'allocated_number_places_qty', 'begin_datetime', 'end_datetime', 'created_user_id', 'updated_user_id', 'created_at', 'updated_at', 'deleted'], 'integer'],
            [['product_price'], 'number'],
            [['product_exporter', 'product_importer', 'product_description', 'product_serialize_data', 'field_extra4', 'field_extra5'], 'string'],
            [['product_name', 'product_model', 'product_sku', 'product_madein', 'product_composition', 'field_extra2'], 'string', 'max' => 128],
            [['product_barcode', 'box_barcode'], 'string', 'max' => 54],
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
            'outbound_order_id' => 'Outbound Order ID',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'product_barcode' => 'Product Barcode',
            'product_price' => 'Product Price',
            'product_model' => 'Product Model',
            'product_sku' => 'Product Sku',
            'product_madein' => 'Product Madein',
            'product_composition' => 'Product Composition',
            'product_exporter' => 'Product Exporter',
            'product_importer' => 'Product Importer',
            'product_description' => 'Product Description',
            'product_serialize_data' => 'Product Serialize Data',
            'field_extra1' => 'Field Extra1',
            'field_extra2' => 'Field Extra2',
            'field_extra3' => 'Field Extra3',
            'field_extra4' => 'Field Extra4',
            'field_extra5' => 'Field Extra5',
            'box_barcode' => 'Box Barcode',
            'status' => 'Status',
            'expected_qty' => 'Expected Qty',
            'accepted_qty' => 'Accepted Qty',
            'allocated_qty' => 'Allocated Qty',
            'expected_number_places_qty' => 'Expected Number Places Qty',
            'accepted_number_places_qty' => 'Accepted Number Places Qty',
            'allocated_number_places_qty' => 'Allocated Number Places Qty',
            'begin_datetime' => 'Begin Datetime',
            'end_datetime' => 'End Datetime',
            'created_user_id' => 'Created User ID',
            'updated_user_id' => 'Updated User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * {@inheritdoc}
     * @return OutboundOrderItemsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OutboundOrderItemsQuery(get_called_class());
    }
}
