<?php

namespace app\models;

use yii\db\ActiveRecord;

/***
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $video
 */
class Lesson extends ActiveRecord
{

    public function rules(): array
    {
        return [
            [['title', 'description', 'video'], 'string'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'title' => 'Заголовок',
            'description' => 'Описание',
            'video' => 'Видео',
        ];
    }

}