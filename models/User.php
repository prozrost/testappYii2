<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $name
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'name' => 'Name',
        ];
    }
    public function setPassword($password)
    {
        $this->password = sha1($password);
    }
    public function validatePassword($password)
    {
        return $this->password === sha1($password);
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }
    public function getId()
    {
        return $this->id;
    }
    public function getAuthKey()
    {

    }
    public function validateAuthKey($authKey)
    {

    }
    public function getPosts()
    {
        return $this->hasMany(Posts::classname(),['user_id'=>'id']);
    }
}
