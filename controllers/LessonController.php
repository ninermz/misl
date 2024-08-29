<?php

namespace app\controllers;

use app\models\Lesson;
use app\models\LessonPreview;
use app\models\Post;
use app\models\UserBookmarks;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LessonController implements the CRUD actions for Lesson model.
 */
class LessonController extends Controller
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
     * Lists all Lesson models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Lesson::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Lesson model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Lesson model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Lesson();
        $lesson_preview = LessonPreview::find()->select(['name', 'id'])->indexBy('id')->column();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'lesson_preview' => $lesson_preview,
        ]);
    }

    /**
     * Updates an existing Lesson model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Lesson model.
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
     * Finds the Lesson model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Lesson the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Lesson::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionLessons($preview_id, $sort = null, $direction = 'desc')
    {
        $query = Lesson::find()->where(['lesson_preview_id' => $preview_id]);

        // Сортировка
        if ($sort == 'date') {
            $query->orderBy(['date' => ($direction === 'asc') ? SORT_ASC : SORT_DESC]);
        } elseif ($sort == 'visits') {
            $query->orderBy(['visits_count' => ($direction === 'asc') ? SORT_ASC : SORT_DESC]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5, // задаем количество элементов на страницу
                'forcePageParam' => true,
                'pageSizeParam' => false,
            ],
        ]);

        $userId = Yii::$app->user->id;
        $bookmarkedLessons = UserBookmarks::find()
            ->select('lesson_id')
            ->where(['user_id' => $userId])
            ->column();

        return $this->render('lessons', [
            'dataProvider' => $dataProvider,
            'bookmarkedLessons' => $bookmarkedLessons,
        ]);
    }

    public function actionLesson($lesson_id)
    {
        $lesson = Lesson::findOne($lesson_id);
        if ($lesson === null) {
            throw new NotFoundHttpException('Урок не найден.');
        }

        // Запись уникального посещения
        $this->recordView($lesson);

        return $this->render('lesson', [
            'lesson' => $lesson,
        ]);
    }

    protected function recordView($lesson)
    {
        if (Yii::$app->user->isGuest) {
            return; // Не записываем посещения для гостей
        }

        $userId = Yii::$app->user->id;
        $cacheKey = "lesson_viewed_{$lesson->id}_{$userId}";
        $cache = Yii::$app->cache;

        if ($cache->get($cacheKey) === false) {
            $lesson->updateCounters(['visits_count' => 1]);
            $cache->set($cacheKey, true, 86400); // Кеш на 24 часа
        }


    }
}
