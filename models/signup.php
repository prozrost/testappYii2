<?php
namespace app\models;
use yii\base\Model;
class Signup extends Model
{
    public $email;
    public $password;
    public $name;
    public function rules()
    {
        return [
            [['email', 'password','name'],'required'],
            ['email','email'],
            ['email','unique','targetClass'=>'app\models\User'],
            ['password','string','min'=>2,'max'=>10],
            ['name','string','min'=>3,'max'=>15]
        ];
    }
    public function signup()
    {
        $user = new User();
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->name = $this->name;
        return $user->save();
    }
}
 ?>
