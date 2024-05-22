<?php

namespace app\models\nomadex;

/**
 * This is the ActiveQuery class for [[InboundOrders]].
 *
 * @see InboundOrders
 */
class InboundOrdersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return InboundOrders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return InboundOrders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function groupProductNameStatus(){
        $this->select(["product_name", 
            "status", 
            "SUM(product_price) AS product_price_sum",  
            "SUM(`expected_qty`) AS expected_qty_sum ", 
            "SUM(`accepted_qty`) AS accepted_qty_sum", 
            "SUM(`allocated_qty`) AS allocated_qty_sum", 
            "SUM(`accepted_number_places_qty`) AS accepted_number_places_qty_sum", 
            "SUM(`expected_number_places_qty`) AS expected_number_places_qty_sum",
            "COUNT(*) AS ROWS" ]);     
        return $this;    
    }

    // SELECT `product_name`,`status`, 
        //     SUM(product_price) AS product_price_sum,  
        //     SUM(`expected_qty`) as expected_qty_sum , 
        //     SUM(`accepted_qty`) as accepted_qty_sum, 
        //     SUM(`allocated_qty`) as allocated_qty_sum, 
        //     SUM(`accepted_number_places_qty`) AS accepted_number_places_qty_sum, 
        //     SUM(`expected_number_places_qty`) AS expected_number_places_qty_sum,
        //     COUNT(*) AS ROWS 
        // FROM `inbound_order_items` 
        // GROUP by product_name, status; 
    
}
