<?php
use app\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ListView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var array $posts */

$this->title = 'Форум';
$this->params['breadcrumbs'][] = $this->title;
?>
<main class="main">
    <section class="lessons__top">
        <div class="banner">
            <h1 class="banner_top">ФОРУМ</h1>
        </div>
        <div class="post_plus">
            <?php
            if (Yii::$app->user->isGuest){
               echo '';
            } else{
                echo '<p>'.Html::a('Добавить пост', ['create'], ['class' => 'btn-acc add-post-button']).'</p>';
            }
            ?>
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
    <!-- КАРТОЧКА УРОКА -->
        <div class="page-container">
            <section class="post-cards" id="post-cards">
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
                    'itemView' => '_post', // представление для одного поста
                    'layout' => "{items}",
                    'itemOptions' => [
                        'tag' => false,
                    ],
                ]) ?>
            </section>
            <footer class="pagination-footer">
                <div class="pagination-border"></div>
                <?= \yii\widgets\LinkPager::widget([
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
        </div>

</main>
