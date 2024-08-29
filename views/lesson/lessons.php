<?php
use app\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

use yii\widgets\ListView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $lessons */
/** @var array $selectedLessonId */
/** @var array $bookmarkedLessons */



$this->title = 'Уроки';
?>

<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">УРОКИ</h1>
        </div>
        <div class="dropdown">
            <button class="dropbtn" id="dropdownBtn">Сортировать по
                <img class="dropSvg" src="/images/svg/chevron-down.svg" alt="">
            </button>
            <div class="dropdownContent" id="dropdownContent">
                <a href="#" data-sort="date" data-url="#">Дате</a>
                <a href="#" data-sort="visits" data-url="#">Посещаемости</a>
            </div>
        </div>
        <div class="banner__border"></div>
    </section>

    <!-- КАРТОЧКИ УРОКОВ -->
    <div class="page-container">
        <section class="lesson-cards" id="lesson-cards">
            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_lesson', // представление для одного урока
                'layout' => "{items}\n{pager}",
                'itemOptions' => [
                    'tag' => false,
                ],
                'viewParams' => [
                    'bookmarkedLessons' => $bookmarkedLessons,
                ],
                'pager' => [
                    'class' => \yii\widgets\LinkPager::class,
                    'pagination' => $dataProvider->pagination,
                    'options' => [
                        'class' => 'pagination',
                    ],
                    'linkOptions' => [
                        'class' => 'page-link',
                    ],
                    'activePageCssClass' => 'active',
                    'disabledPageCssClass' => 'disabled',
                ],
            ]) ?>
        </section>
        <!-- ПАГИНАЦИЯ -->
        <?php if ($dataProvider->totalCount > 5): ?>
            <footer class="pagination-footer">
                <div class="pagination-border"></div>
                <?= LinkPager::widget([
                    'pagination' => $dataProvider->pagination,
                    'options' => [
                        'class' => 'pagination',
                    ],
                    'linkOptions' => [
                        'class' => 'page-link',
                    ],
                    'activePageCssClass' => 'active',
                    'disabledPageCssClass' => 'disabled',
                ]) ?>
            </footer>
        <?php endif; ?>
    </div>
</main>
