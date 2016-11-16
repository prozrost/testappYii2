<?php
namespace app\models;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;
class Posts extends ActiveRecord
{
    public function getUser()
    {
        return $this->hasOne(User::classname(),['user_id'=>'id']);
    }
}
?>
