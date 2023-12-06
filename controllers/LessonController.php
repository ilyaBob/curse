<?php

namespace app\controllers;

use app\models\Lesson;
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
        $lessons = Lesson::find()->all();

        return $this->render('index', compact('lessons'));
    }

    public function actionShow($id): string
    {
        $lesson = Lesson::findOne($id);

        return $this->render('show', compact('lesson'));
    }

    public function actionViewed($id): string
    {

        $lesson = Lesson::findOne($id);

        return $this->render('show', compact('lesson'));
    }




}
