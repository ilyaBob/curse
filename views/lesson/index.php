<?php

/**
 * @var yii\web\View $this
 * @var \app\models\Lesson $lessons
 */

use yii\helpers\Html;

$this->title = 'Список уроков';
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                               <div class="alert-success p-2">Вы успешно прошли курс</div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Наименование урока</th>
                                    <th>Прогресс</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($lessons as $lesson):?>
                                <tr>
                                    <td><?=$lesson->title?></td>
                                    <td>

                                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="green" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>


                                    </td>
                                    <td>
                                        <?= Html::a('Перейти к уроку', ['lesson/show', 'id'=> $lesson->id], ['class' => 'btn btn-primary',  'disabled'=>'disabled']) ?>
                                    </td>
                                </tr>
                                <?php endforeach;?>

                                </tbody>
                            </table>

                            <?php

                            var_dump(yii::$app->user->identity->getLessons()->count());

                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
