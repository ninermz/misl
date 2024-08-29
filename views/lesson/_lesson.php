<?php
/** @var app\models\Lesson $model */
/** @var array $bookmarkedLessons */

$isBookmarked = in_array($model->id, $bookmarkedLessons);
?>
<div class="lesson__card">
    <div class="card">
        <div class="card--info">
            <?php if ($isBookmarked): ?>
                <a class="bookmarks--on" href="#" data-lesson-id="<?= $model->id ?>">
                    <img class="lesson--addToBookmarks" src="/images/svg/bookmark--on.svg" alt="Удалить из избранного">
                </a>
                <a class="bookmarks--off" href="#" data-lesson-id="<?= $model->id ?>" style="display: none;">
                    <img class="lesson--addToBookmarks" src="/images/svg/bookmark.svg" alt="Добавить в избранное">
                </a>
            <?php else: ?>
                <a class="bookmarks--off" href="#" data-lesson-id="<?= $model->id ?>">
                    <img class="lesson--addToBookmarks" src="/images/svg/bookmark.svg" alt="Добавить в избранное">
                </a>
                <a class="bookmarks--on" href="#" data-lesson-id="<?= $model->id ?>" style="display: none;">
                    <img class="lesson--addToBookmarks" src="/images/svg/bookmark--on.svg" alt="Удалить из избранного">
                </a>
            <?php endif; ?>
            <a href="/lesson/lesson<?= '?lesson_id=' . $model->id ?>"><h1><?= $model->name ?></h1></a>
            <p><?= $model->brief ?></p>
        </div>
        <div class="card--bottom">
            <div class="bottom-1">
                <img class="lesson--popular" src="/images/svg/eye.svg" alt="">
                <p><?= $model->visits_count ?></p>
            </div>
            <div class="bottom-2">
                <img class="lesson--date" src="/images/svg/calendar.svg" alt="">
                <p><?= $model->date ?></p>
            </div>
        </div>
    </div>
</div>
