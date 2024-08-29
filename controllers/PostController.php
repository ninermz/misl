<?php

namespace app\controllers;

use Yii;
use app\models\Post;
use app\models\Category;
use app\models\Comment;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Post models.
     *
     * @return string
     */
    public function actionIndex($sort = null, $direction = null)
    {
        // Проверка входящих параметров
        Yii::info("Sort: $sort, Direction: $direction", __METHOD__);

        $query = Post::find()->with('user', 'category');

        if ($sort == 'date') {
            $query->orderBy(['date' => ($direction === 'asc') ? SORT_ASC : SORT_DESC]);
        } elseif ($sort == 'visits') {
            $query->orderBy(['visits_count' => ($direction === 'asc') ? SORT_ASC : SORT_DESC]);
        }

        Yii::info($query->createCommand()->getRawSql(), __METHOD__); // Логирование SQL запроса

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }



    public function actionView()
    {
        $postId = Yii::$app->request->get('post_id');
        if ($postId === null) {
            throw new \yii\web\NotFoundHttpException('Пост не найден.');
        }

        $post = Post::findOne($postId);
        if ($post === null) {
            throw new \yii\web\NotFoundHttpException('Пост не найден.');
        }
        $this->recordView($post);

        $newComment = new Comment();
        $newComment->post_id = $postId; // Устанавливаем post_id для нового комментария

        $comments = Comment::find()->where(['post_id' => $postId])->all();

        if ($newComment->load(Yii::$app->request->post()) && $newComment->save()) {
            return $this->refresh(); // Перезагрузка страницы после успешного добавления комментария
        }

        return $this->render('view', [
            'post' => $post,
            'newComment' => $newComment,
            'comments' => $comments,
        ]);
    }

    protected function recordView($post)
    {
        if (Yii::$app->user->isGuest) {
            return; // Не записываем посещения для гостей
        }

        $userId = Yii::$app->user->id;
        $cacheKey = "post_viewed_{$post->id}_{$userId}";
        $cache = Yii::$app->cache;

        if ($cache->get($cacheKey) === false) {
            $post->updateCounters(['visits_count' => 1]);
            $cache->set($cacheKey, true, 86400); // Кеш на 24 часа
        }
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Post();
        $categories = Category::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $categories = Category::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionComment($id)
    {
        $comment = new Comment();
        $post = $this->findModel($id);

        if ($comment->load(Yii::$app->request->post())) {
            $comment->post_id = $post->id;
            if ($comment->save()) {
                return $this->redirect(['view', 'id' => $post->id]);
            }
        }

        return $this->render('comment', [
            'model' => $comment,
        ]);
    }


    public function actionAddComment($id)
    {
        $post = $this->findModel($id);
        $newComment = new Comment();

        if ($newComment->load(Yii::$app->request->post())) {
            $newComment->post_id = $id;
            $newComment->user_id = Yii::$app->user->id;
            $newComment->date = date('Y-m-d H:i:s');

            if ($newComment->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        }

        return $this->render('view', [
            'post' => $post,
            'newComment' => $newComment,
            'comments' => Comment::find()->where(['post_id' => $id])->all(),
        ]);
    }

}
