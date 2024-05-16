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
            "status"]);
        return $this;

    }
    public function available(){
        $this->andWhere(["status"=> 19]);
        return $this;
    }
    public function notAvailable(){
        $this->andWhere(["status"=> 11]);
        return $this;
    }
    public function byProduct(){
        $this->groupBy("product_name");
        return $this;
    }
}
