<?php

namespace app\models\nomadex;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class OutboundForm extends Model
{
    public $status;
    

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['status'], 'required'],
            [['status'],'integer'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'status' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return bool whether the model passes validation
     */
   
}
