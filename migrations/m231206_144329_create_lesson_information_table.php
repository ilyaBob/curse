<?php

use yii\db\Migration;

class m231206_144329_create_lesson_information_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lesson_information}}', [
            'id' => $this->primaryKey(),
            'lesson_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lesson_information}}');
    }
}
