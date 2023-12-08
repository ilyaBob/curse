<?php

namespace app\models;

use app\models\Enums\StatusLessonEnum;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property integer $id
 * @property integer $number
 * @property string $title
 * @property string $description
 * @property string $video
 *
 * @property User $users
 * @property LessonInformation $lessonInformation
 * @property LessonInformation $lessonsUser
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

    public function getUsers(): ActiveQuery
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('lesson_information', ['lesson_id'=>'id']);
    }

    public function getLessonInformation(): ActiveQuery
    {
        return $this->hasOne(LessonInformation::class, ['lesson_id' => 'id']);
    }

    public function getLessonsUser(): ActiveQuery
    {
        return $this->getLessonInformation()->where(['user_id' => Yii::$app->user->id]);
    }

    public function isComplete(): bool
    {
        return $this->lessonsUser->status == StatusLessonEnum::COMPLETED;
    }

}