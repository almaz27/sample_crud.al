<?php

namespace app\models\nomadex;

/**
 * This is the ActiveQuery class for [[OutboundOrders]].
 *
 * @see OutboundOrders
 */
class OutboundOrdersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OutboundOrders[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OutboundOrders|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
