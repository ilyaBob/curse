<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer lesson_id
 * @property integer user_id
 * @property integer status
 */
class LessonInformation extends ActiveRecord
{

    public function rules(): array
    {
        return [
            [['lesson_id', 'user_id', 'status'], 'integer'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'lesson_id' => 'Урок',
            'user_id' => 'Пользователь',
            'status' => 'Статус',
        ];
    }

}