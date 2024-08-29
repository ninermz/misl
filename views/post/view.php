<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Post $post */
/** @var app\models\Comment $newComment */
/** @var app\models\Comment[] $comments */

$this->title = $post->name;
?>
<!-- КОНТЕНТ -->
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top"><?= Html::encode($post->name) ?></h1>
        </div>
        <div class="card--bottom">
            <div class="bottom-1">
                <img class="lesson--popular" id="LessonPop" src="/images/svg/eye.svg" alt="посещения">
                <p><?= Html::encode($post->visits_count) ?></p>
            </div>
            <div class="bottom-2">
                <img class="lesson--date" src="/images/svg/calendar.svg" alt="дата публикации">
                <p><?= Yii::$app->formatter->asDate($post->date) ?></p>
            </div>
        </div>
        <div class="banner__border"></div>
    </section>

    <!-- УРОК -->
    <section class="post">
        <div class="lesson__main">
            <div class="lesson--video">
                <?php if (!empty($post->post_video_url)): ?>
                    <?php
                    $videoUrl = str_replace('watch?v=', 'embed/', $post->post_video_url);
                    ?>
                    <iframe width="760" height="515" src="<?= Html::encode($videoUrl) ?>" frameborder="0" allowfullscreen></iframe>
                <?php endif; ?>
            </div>
            <div class="lesson--content">
                <p><?= Html::encode($post->description) ?></p>
            </div>
        </div>
    </section>

    <?php if (!Yii::$app->user->isGuest): ?>
        <!-- ФОРМА ДЛЯ НОВЫХ КОММЕНТАРИЕВ -->
        <section class="new-comment">
            <h2>Оставить комментарий</h2>
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($newComment, 'description', ['template' => "{input}"])->textarea(['rows' => 6, 'class' => 'comment-textarea'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn-acc']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </section>
    <?php endif; ?>

    <!-- КОММЕНТАРИИ -->
    <section class="comments">
        <h2>Комментарии</h2>
        <?php foreach ($comments as $comment): ?>
            <div class="comment" id="comment-<?= Html::encode($comment->id) ?>">
                <?php if (Yii::$app->user->id === $comment->user_id): ?>
                    <form id="delete-comment-form-<?= Html::encode($comment->id) ?>" action="/comment/delete?id=<?= Html::encode($comment->id) ?>" method="post">
                        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                        <a href="#" onclick="event.preventDefault(); deleteComment(<?= Html::encode($comment->id) ?>);" class="delete-icon">
                            <img src="/images/svg/trash.svg" alt="Удалить комментарий">
                        </a>
                    </form>
                <?php endif; ?>
                <p>
                    <strong><?= Html::encode($comment->user->username) ?>:</strong>
                </p>
                <p><?= Html::encode($comment->description) ?></p>
                <p>
                    <small><?= Yii::$app->formatter->asDate($comment->date, 'yyyy-MM-dd') ?></small>
                </p>
            </div>
        <?php endforeach; ?>
    </section>

    <script>
        function deleteComment(id) {
            if (confirm('Вы уверены, что хотите удалить этот комментарий?')) {
                let form = document.getElementById('delete-comment-form-' + id);
                let formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }).then(response => response.json())
                    .then(data => {
                        if (data.status === 'success') {
                            let commentElement = document.getElementById('comment-' + id);
                            if (commentElement) {
                                commentElement.remove();
                            }
                        } else {
                            alert('Произошла ошибка при удалении комментария: ' + data.message);
                        }
                    }).catch(error => {
                    console.error('Ошибка при выполнении запроса:', error);
                });
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
            const postElement = document.querySelector('.post');
            const videoElement = postElement.querySelector('.lesson--video iframe');

            function updateMinHeight() {
                if (videoElement) {
                    postElement.style.minHeight = 'calc(100vh - 80px)';
                } else {
                    postElement.style.minHeight = 'calc(40vh - 80px)';
                }
            }

            updateMinHeight();

            window.addEventListener('beforeunload', function () {
                postElement.style.minHeight = '';
            });
        });


    </script>

</main>