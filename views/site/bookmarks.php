<?php
/** @var array $bookmarks */

use yii\helpers\Html;

$this->title = 'Закладки';
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">ЗАКЛАДКИ</h1>
        </div>
        <div class="banner__border"></div>
    </section>

    <!-- КАРТОЧКА УРОКА -->
    <section class="lesson-cards" id="lesson-cards">

        <?php foreach ($bookmarks as $bookmark): ?>
            <div class="lesson__card">
                <div class="card">
                    <div class="card--info">
                        <h1><?= $bookmark->lesson->name ?></h1></a>
                        <p><?= $bookmark->lesson->brief ?></p>
                    </div>
                    <div class="card--bottom">
                        <a class="bottom-bookmark" href="<?= \yii\helpers\Url::to(['lesson/lesson', 'lesson_id' => $bookmark->lesson->id]) ?>">Подробнее</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</main>
