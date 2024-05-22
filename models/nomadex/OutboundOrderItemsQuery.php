<?php

namespace app\models\nomadex;

/**
 * This is the ActiveQuery class for [[OutboundOrderItems]].
 *
 * @see OutboundOrderItems
 */
class OutboundOrderItemsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OutboundOrderItems[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OutboundOrderItems|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function choose(){
        $this->select([
            "product_name",
            "SUM(accepted_qty) AS accepted_qity", 
            "SUM(expected_qty) AS expected_qity",
            "SUM(product_price) AS product_price_sum",
            "SUM(allocated_qty) as allocated_qty_sum",
            "SUM(accepted_number_places_qty) AS accepted_number_places_qty_sum",
            "status",
            "SUM(expected_number_places_qty) AS expected_number_places_qty_sum",
            "COUNT(*) AS ROWS "]);   
        return $this;
    }
   
    public function byProductAndStatus(){
        $this->groupBy("product_name");
        return $this;
    }
   
}
