<?php

use yii\db\Migration;

/**
 * Handles the creation of table `posts`.
 */
class m161115_092137_create_posts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('posts', [
            'id' => $this->primaryKey(),
            'user_id'=>$this->integer(50),
            'post_title'=>$this->string(50),
            'post_text'=>$this->string(255)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('posts');
    }
}
