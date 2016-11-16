<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $post_title
 * @property string $post_text
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['post_title'], 'string', 'max' => 50],
            [['post_text'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'post_title' => 'Post Title',
            'post_text' => 'Post Text',
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
    public function getUser()
    {
        return $this->hasOne(User::classname(),['id'=>'user_id']);
    }
}
