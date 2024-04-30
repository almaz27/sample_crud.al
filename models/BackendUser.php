<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "backendUser".
 *
 * @property int $Id
 * @property string|null $firstName
 * @property string|null $lastName
 * @property string|null $userName
 * @property string $password
 * @property string $authKey
 */
class BackendUser extends \yii\db\ActiveRecord implements IdentityInterface
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
    public function getAuthKey(){
        return $this->authKey;
    }
    public function getId(){
        return $this->Id;
    }
    public function validateAuthKey($authKey){
        return $this->authKey === $authKey;
    }
    public static function findIdentity($id){
        return static::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null){
        throw new NotSupportedException('Token coming ..');
    }
    public static function findByUsername($username){
        return static::findOne(['userName'=> $username]);
    }
    public function validatePassword(string $password){
        return $this->password === $password;
    }
}
