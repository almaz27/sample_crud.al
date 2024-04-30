<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programming".
 *
 * @property string $code
 * @property string $name
 * @property float $ratings
 */
class Programming extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programming';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required'],
            [['ratings'], 'number'],
            [['code'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 52],
            [['code'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'code' => 'Code',
            'name' => 'Name',
            'ratings' => 'Ratings',
        ];
    }
}
