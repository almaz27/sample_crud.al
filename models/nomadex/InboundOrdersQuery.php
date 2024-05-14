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
}
