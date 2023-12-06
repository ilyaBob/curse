<?php

/**
 * @var yii\web\View $this
 * @var \app\models\Lesson $lesson
 */

use yii\helpers\Html;

$this->title = $lesson->title;
?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                              <p> <?= $lesson->description ?> </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="timeline-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="<?= $lesson->video ?>" allowfullscreen></iframe>
                                </div>
                                <div class="timeline-footer">
                                    <?= Html::a('Урок просмотрен', ['lesson/viewed', 'id'=> $lesson->id], ['class' => 'btn btn-success mt-3']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
