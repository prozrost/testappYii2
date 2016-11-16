<?php
namespace app\models;
use yii\base\Model;
class Insert extends Model
{
    public $user_id;
    public $post_title;
    public $post_text;
    public function rules()
    {
        return [
            [['post_title','post_text'],'required'],
            ['post_title','string','min'=>2,'max'=>15],
            ['post_text','string','min'=>10,'max'=>255]
        ];
    }
    public function insertPost()
    {
        $userId = \Yii::$app->user->identity->id;
        $posts = new Posts();
        $posts->user_id = $userId;
        $posts->post_title = $this->post_title;
        $posts->post_text = $this->post_text;
        return $posts->save();
    }
}
