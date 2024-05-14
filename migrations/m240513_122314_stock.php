<?php

use yii\db\Schema;
use yii\db\Migration;

class m240513_122314_stock extends Migration
{

    public function init()
    {
        $this->db = 'ndb';
        parent::init();
    }

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%stock}}',
            [
                'id'=> $this->primaryKey(11),
                'scan_in_employee_id'=> $this->integer(11)->null()->defaultValue(0)->comment('scanning inbound employee id'),
                'scan_out_employee_id'=> $this->integer(11)->null()->defaultValue(0)->comment('scanning outbound employee id'),
                'client_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Client id'),
                'inbound_order_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Internal inbound order id'),
                'consignment_inbound_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Consignment inbound id'),
                'inbound_order_item_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Inbound order item id'),
                'inbound_order_number'=> $this->string(32)->null()->defaultValue('')->comment('Inbound order number'),
                'outbound_order_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Internal outbound order id'),
                'consignment_outbound_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Consignment outbound id'),
                'outbound_order_item_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Outbound order item id'),
                'outbound_picking_list_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Internal outbound picking list id'),
                'outbound_picking_list_barcode'=> $this->string(32)->null()->defaultValue('')->comment('Internal outbound picking list barcode'),
                'stock_adjustment_id'=> $this->integer(11)->null()->defaultValue(0)->comment('stock adjustment id'),
                'stock_adjustment_status'=> $this->integer(11)->null()->defaultValue(0)->comment('stock adjustment status'),
                'outbound_order_number'=> $this->string(32)->null()->defaultValue('')->comment('Outbound order number'),
                'warehouse_id'=> $this->integer(11)->null()->defaultValue(0)->comment('Internal warehouse order id'),
                'zone'=> $this->smallInteger(6)->null()->defaultValue(0)->comment('Zone: good, bad, defect'),
                'product_id'=> $this->integer(11)->null()->defaultValue(null)->comment('Internal product id'),
                'product_name'=> $this->string(128)->null()->defaultValue(null)->comment('Scanned product name'),
                'product_barcode'=> $this->string(54)->null()->defaultValue(null)->comment('Scanned product barcode'),
                'product_model'=> $this->string(128)->null()->defaultValue(null)->comment('Product model'),
                'product_sku'=> $this->string(128)->null()->defaultValue(null)->comment('Product sku'),
                'is_product_type'=> $this->integer(11)->null()->defaultValue(0)->comment('Product type return or one lot box'),
                'box_barcode'=> $this->string(54)->null()->defaultValue(null)->comment('Box barcode'),
                'box_size_barcode'=> $this->string(32)->null()->defaultValue(null)->comment('Box size barcode'),
                'box_size_m3'=> $this->string(32)->null()->defaultValue('0')->comment('Box size m3'),
                'box_kg'=> $this->string(32)->null()->defaultValue('')->comment('kg box'),
                'condition_type'=> $this->smallInteger(6)->null()->defaultValue(0)->comment('1=good,2=totally damaged, 3=partially damaged, 4 = lost item, 5 = par lost'),
                'status'=> $this->smallInteger(6)->null()->defaultValue(0)->comment('Status new, scanned'),
                'pick_list_status'=> $this->smallInteger(6)->null()->defaultValue(1)->comment('Pick list scan status'),
                'status_availability'=> $this->tinyInteger(2)->null()->defaultValue(0)->comment('1 - Yes, 0 - No'),
                'status_lost'=> $this->integer(11)->null()->defaultValue(0)->comment('Lost status'),
                'inventory_id'=> $this->integer(11)->null()->defaultValue(0),
                'inventory_primary_address'=> $this->string(25)->null()->defaultValue('')->comment('старый шк короба'),
                'inventory_secondary_address'=> $this->string(24)->null()->defaultValue(''),
                'status_inventory'=> $this->smallInteger(6)->null()->defaultValue(0),
                'primary_address'=> $this->string(25)->null()->defaultValue('')->comment('Box or pallet'),
                'secondary_address'=> $this->string(25)->null()->defaultValue('')->comment('Polka'),
                'address_pallet_qty'=> $this->smallInteger(6)->null()->defaultValue(1)->comment('Address pallet qty'),
                'address_sort_order'=> $this->integer(11)->null()->defaultValue(0)->comment('Address sort order'),
                'kpi_value'=> $this->string(512)->null()->defaultValue('')->comment('kpi value'),
                'scan_out_datetime'=> $this->integer(11)->null()->defaultValue(0)->comment('datetime scanning outbound'),
                'scan_in_datetime'=> $this->integer(11)->null()->defaultValue(0)->comment(' datetime scanning inbound'),
                'inbound_client_box'=> $this->string(32)->null()->defaultValue('')->comment('Короб в котором тавор прибыл к нас на склад от клиента'),
                'system_status'=> $this->string(32)->null()->defaultValue('')->comment('Системный статус: используется только для бизнес логики'),
                'system_status_description'=> $this->text()->null()->defaultValue(null)->comment('Описание системных статусов'),
                'field_extra1'=> $this->string(64)->null()->defaultValue('')->comment('Extra field 1'),
                'field_extra2'=> $this->string(128)->null()->defaultValue('')->comment('Extra field 2'),
                'field_extra3'=> $this->string(256)->null()->defaultValue('')->comment('Extra field 3'),
                'field_extra4'=> $this->text()->null()->defaultValue(null)->comment('Extra field 4'),
                'field_extra5'=> $this->text()->null()->defaultValue(null)->comment('Extra field 5'),
                'created_user_id'=> $this->integer(11)->null()->defaultValue(null),
                'updated_user_id'=> $this->integer(11)->null()->defaultValue(null),
                'created_at'=> $this->integer(11)->null()->defaultValue(null),
                'updated_at'=> $this->integer(11)->null()->defaultValue(null),
                'deleted'=> $this->smallInteger(6)->null()->defaultValue(0),
            ],$tableOptions
        );
        $this->createIndex('deleted','{{%stock}}',['deleted'],false);
        $this->createIndex('inbound_order_id','{{%stock}}',['inbound_order_id'],false);
        $this->createIndex('outbound_order_id','{{%stock}}',['outbound_order_id'],false);
        $this->createIndex('product_id','{{%stock}}',['product_id'],false);
        $this->createIndex('status','{{%stock}}',['status'],false);
        $this->createIndex('box_barcode','{{%stock}}',['box_barcode'],false);
        $this->createIndex('secondary_address','{{%stock}}',['secondary_address'],false);
        $this->createIndex('outbound_picking_list_id','{{%stock}}',['outbound_picking_list_id'],false);
        $this->createIndex('client_id','{{%stock}}',['client_id'],false);
        $this->createIndex('product_barcode','{{%stock}}',['product_barcode'],false);
        $this->createIndex('primary_address','{{%stock}}',['primary_address'],false);
        $this->createIndex('scan_in_datetime','{{%stock}}',['scan_in_datetime'],false);
        $this->createIndex('scan_out_datetime','{{%stock}}',['scan_out_datetime'],false);
        $this->createIndex('is_product_type','{{%stock}}',['is_product_type'],false);
        $this->createIndex('inventory_primary_address','{{%stock}}',['inventory_primary_address'],false);
        $this->createIndex('inventory_secondary_address','{{%stock}}',['inventory_secondary_address'],false);
        $this->createIndex('outbound_order_item_id','{{%stock}}',['outbound_order_item_id'],false);
        $this->createIndex('inbound_client_box','{{%stock}}',['inbound_client_box'],false);
        $this->createIndex('client_id_field_extra1_deleted','{{%stock}}',['client_id','field_extra1','deleted'],false);
        $this->createIndex('field_extra1','{{%stock}}',['field_extra1'],false);
        $this->createIndex('outbound_picking_list_barcode','{{%stock}}',['outbound_picking_list_barcode'],false);

    }

    public function safeDown()
    {
        $this->dropIndex('deleted', '{{%stock}}');
        $this->dropIndex('inbound_order_id', '{{%stock}}');
        $this->dropIndex('outbound_order_id', '{{%stock}}');
        $this->dropIndex('product_id', '{{%stock}}');
        $this->dropIndex('status', '{{%stock}}');
        $this->dropIndex('box_barcode', '{{%stock}}');
        $this->dropIndex('secondary_address', '{{%stock}}');
        $this->dropIndex('outbound_picking_list_id', '{{%stock}}');
        $this->dropIndex('client_id', '{{%stock}}');
        $this->dropIndex('product_barcode', '{{%stock}}');
        $this->dropIndex('primary_address', '{{%stock}}');
        $this->dropIndex('scan_in_datetime', '{{%stock}}');
        $this->dropIndex('scan_out_datetime', '{{%stock}}');
        $this->dropIndex('is_product_type', '{{%stock}}');
        $this->dropIndex('inventory_primary_address', '{{%stock}}');
        $this->dropIndex('inventory_secondary_address', '{{%stock}}');
        $this->dropIndex('outbound_order_item_id', '{{%stock}}');
        $this->dropIndex('inbound_client_box', '{{%stock}}');
        $this->dropIndex('client_id_field_extra1_deleted', '{{%stock}}');
        $this->dropIndex('field_extra1', '{{%stock}}');
        $this->dropIndex('outbound_picking_list_barcode', '{{%stock}}');
        $this->dropTable('{{%stock}}');
    }
}
