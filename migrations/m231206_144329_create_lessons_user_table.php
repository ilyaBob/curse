<?php

use yii\db\Migration;

class m231206_144329_create_lessons_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%lessons_user}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'lesson_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%lessons_user}}');
    }
}
