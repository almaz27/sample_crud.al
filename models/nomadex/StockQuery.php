<?php

namespace app\models\nomadex;

/**
 * This is the ActiveQuery class for [[Stock]].
 *
 * @see Stock
 */
class StockQuery extends \yii\db\ActiveQuery
{
    
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Stock[]|array
     */
    public function all($ndb = null)
    {
        return parent::all($ndb);
    }

    /**
     * {@inheritdoc}
     * @return Stock|array|null
     */
    public function one($ndb = null)
    {
        return parent::one($ndb);
    }
    public function groupBy($db = null){
        return parent::groupBy($db);
    }
    
    public function choose($bound){
        // $subQuery = $this->select('COUNT(*) as total');
        $this->select(["client_id", "status_availability", $bound, "COUNT(*) as total"])->orderBy("total DESC");
        return $this;
    }

    public function statusAvailable($status){
        $this->andWhere(["status_availability"=>$status]);
        return $this;

   }
   public function client($id){
       $this->andWhere(["client_id"=>$id]);
       return $this;
   }
   public function addGroupBy($columns){
    $this->groupBy($columns);
    return $this;
   }
   



}
