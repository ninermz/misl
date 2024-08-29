<?php

use app\models\Courses;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\Courses[] $courses_info */

$this->title = 'Курсы';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">КУРСЫ</h1>
        </div>
        <div class="banner__border"></div>
    </section>
    <!-- КАРТОЧКА УРОКА -->
    <div class="page-container">
        <section class="post-cards" id="post-cards">
            <?php foreach ($courses_info as $course): ?>
                <div class="lesson__card">
                    <div class="card-c">
                        <img src="/<?= Html::encode($course->photo) ?>" alt="Course Image" class="course-image">
                        <div class="course-card--info">
                            <h1><?= Html::encode($course->name) ?></h1>
                            <p>Описание курса:</p>
                            <p><span><?= Html::encode($course->description) ?></span></p>
                            <p class="course-price">Цена курса: <span><?= Html::encode($course->price) ?></span></p>
                            <div class="course-buttons">
                                <a href="/payment/create" class="btn-acc-form">Купить курс</a>
                                <a href="/comment-courses/index?id=<?= Html::encode($course->id) ?>" class="btn-acc-form">Отзывы о курсе</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</main>