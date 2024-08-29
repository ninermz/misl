<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var app\models\LessonPreview[] $preview_info */

$this->title = 'Уроки';
$this->params['breadcrumbs'][] = $this->title;
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">Уроки</h1>
        </div>
        <div class="banner__border"></div>
    </section>
    <!-- КАРТОЧКА УРОКА -->
    <div class="page-container">
        <section class="post-cards" id="post-cards">
            <?php foreach ($preview_info as $preview): ?>
                <div class="lesson__card">
                    <div class="card-c">
                        <img src="/<?= Html::encode($preview->photo) ?>" alt="Course Image" class="course-image">
                        <div class="course-card--info">
                            <a href="<?= Url::to(['lesson/lessons', 'preview_id' => $preview->id]) ?>">
                                <h1><?= Html::encode($preview->name) ?></h1>
                            </a>
                            <p>Описание цикла уроков:</p>
                            <p> <span><?= Html::encode($preview->description) ?> </span></p>
                            <div class="course-buttons">
                                <?= Html::a('Перейти', ['lesson/lessons', 'preview_id' => $preview->id], ['class' => 'btn-acc-form']) ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>
    </div>
</main>