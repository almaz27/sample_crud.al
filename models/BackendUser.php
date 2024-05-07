<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "backendUser".
 *
 * @property int $Id
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $userName
 * @property string $password
 * @property string $authKey
 *
 * @property Comment[] $comments
 */
class BackendUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'backendUser';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'authKey'], 'required'],
            [['firstName', 'userName'], 'string', 'max' => 15],
            [['lastName'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 30],
            [['authKey'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'userName' => 'User Name',
            'password' => 'Password',
            'authKey' => 'Auth Key',
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['publisher_id' => 'Id']);
    }

    /**
     * {@inheritdoc}
     * @return BackendUserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BackendUserQuery(get_called_class());
    }
}
