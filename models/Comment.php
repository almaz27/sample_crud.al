<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Comment".
 *
 * @property int $Id
 * @property string $status
 * @property string $body
 * @property string $publish_date
 * @property int $publisher_id
 * @property float $rate
 * @property int $post_id
 *
 * @property Programming $post
 * @property BackendUser $publisher
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'body', 'publish_date', 'publisher_id', 'rate', 'post_id'], 'required'],
            [['status', 'body'], 'string'],
            [['publish_date'], 'safe'],
            [['publisher_id', 'post_id'], 'integer'],
            [['rate'], 'number'],
            [['publisher_id'], 'exist', 'skipOnError' => true, 'targetClass' => BackendUser::class, 'targetAttribute' => ['publisher_id' => 'Id']],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Programming::class, 'targetAttribute' => ['post_id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'status' => 'Status',
            'body' => 'Body',
            'publish_date' => 'Publish Date',
            'publisher_id' => 'Publisher ID',
            'rate' => 'Rate',
            'post_id' => 'Post ID',
        ];
    }

    /**
     * Gets query for [[Post]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Programming::class, ['Id' => 'post_id']);
    }

    /**
     * Gets query for [[Publisher]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublisher()
    {
        return $this->hasOne(BackendUser::class, ['Id' => 'publisher_id']);
    }
}
