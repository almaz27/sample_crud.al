<?php 
namespace app\models\nomadex;

use Yii;
use yii\base\Model;

class StockForm extends Model
{
    public $client_id;
    public $status_availability;
    public $bound;
    public function rules(){
        return [
            [[ 'client_id', 'status_availability'], 'integer'],
            [['bound'], 'string'],
            [[ 'client_id', 'status_availability','bound'], 'required'],
        ];
    }
    public function attributeLabels(){
        return [
            'client_id' => 'Client ID',
            'status_availability' => 'Status Availability',
            'bound' => 'Type of bound',
        ];
    }
}   

?>