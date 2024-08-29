<?php
/** @var yii\web\View $this */
/** @var array $lessons */
/** @var \app\models\Lesson $lesson */

$this->title = $lesson->name;
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <?php if ($lesson !== null): ?>
                <h1 class="banner_top"><?= $lesson->name ?></h1>
            <?php endif; ?>
        </div>
        <div class="card--bottom">
            <div class="bottom-1">
                <img class="lesson--popular" id="LessonPop" src="/images/svg/eye.svg" alt="посещения">
                <p><?= $lesson->visits_count ?></p>
            </div>
            <div class="bottom-2">
                <img class="lesson--date" src="/images/svg/calendar.svg" alt="дата публикации">
                <p><?= Yii::$app->formatter->asDate($lesson->date) ?></p>
            </div>
        </div>
        <div class="banner__border"></div>
    </section>

    <!-- УРОК -->
    <section class="lesson">
        <div class="lesson__main">
            <div class="lesson--video">
                <!-- Здесь помещается видео -->
                <?php if (!empty($lesson->video_url)): ?>
                    <?php
                    // Преобразование URL для встраивания видео
                    $videoUrl = str_replace('watch?v=', 'embed/', $lesson->video_url);
                    ?>
                    <iframe width="760" height="515" src="<?= $videoUrl ?>" frameborder="0" allowfullscreen></iframe>
                <?php else: ?>
                    <p>Видео не доступно</p>
                <?php endif; ?>
                <p class="video--name"><?= $lesson->video_name ?></p>
            </div>
            <div class="lesson--content">
                <h2><?= $lesson->subtitle ?></h2>
                <p><?= $lesson->description ?></p>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var bannerTop = document.querySelector('.banner_top');
        if (bannerTop) {
            var lessonName = bannerTop.textContent.trim();
            if (lessonName.length > 30) {
                bannerTop.style.fontSize = '50px'; // Уменьшаем размер шрифта
            }
        }
    });
</script>
