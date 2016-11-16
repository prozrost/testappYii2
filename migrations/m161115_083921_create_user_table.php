<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m161115_083921_create_user_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' =>$this->string(100),
            'password'=>$this->string(25),
            'name'=>$this->string(25)
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('user');
    }
}
