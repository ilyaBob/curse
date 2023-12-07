<?php

namespace app\controllers;

use app\models\Enums\StatusLessonEnum;
use app\models\Lesson;
use app\models\LessonInformation;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class LessonController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }


    public function actionIndex(): string
    {
        $lessons = Lesson::find()->with('lessonInformation')->all();

        return $this->render('index', compact('lessons'));
    }

    public function actionShow($id): string
    {
        $lesson = Lesson::findOne($id);

        return $this->render('show', compact('lesson'));
    }

    public function actionViewed($id): Response
    {
        $lesson = Lesson::findOne($id);
        $lessonStatus = $lesson->lessonsUser->status;

            $LessonInformation = LessonInformation::findOne(['lesson_id' => $lesson->id, 'user_id' => Yii::$app->user->id]);
            $LessonInformation->status = StatusLessonEnum::COMPLETED;
            $LessonInformation->save();

            $nextLesson = Lesson::find()
                ->where(['>', 'number', $lesson->number])
                ->orderBy(['number' => SORT_ASC])
                ->one();

        if ($nextLesson && $lessonStatus != StatusLessonEnum::COMPLETED) {
            $nextLessonInformation = new LessonInformation([
                'lesson_id' => $nextLesson->id,
                'user_id' => Yii::$app->user->id,
                'status' => StatusLessonEnum::ALLOW,
            ]);

            $nextLessonInformation->save();
        }


        return $this->redirect('index');
    }


}
