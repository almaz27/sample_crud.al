<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programming".
 *
 * @property string $code
 * @property string $name
 * @property float $ratings
 * @property int $Id
 *
 * @property Comment[] $comments
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
            [['code', 'name', 'Id'], 'required'],
            [['ratings'], 'number'],
            [['Id'], 'integer'],
            [['code'], 'string', 'max' => 5],
            [['name'], 'string', 'max' => 52],
            [['Id'], 'unique'],
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
            'Id' => 'ID',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'Id']);
    }
}
