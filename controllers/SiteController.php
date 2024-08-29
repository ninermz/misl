<?php

namespace app\controllers;

use app\models\Lesson;
use app\models\User;
use app\models\UserBookmarks;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;


class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['add-bookmark', 'bookmarks', 'logout'],
                'rules' => [
                    [
                        'actions' => ['add-bookmark', 'bookmarks'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->role == 1) {
                return $this->redirect(['admin/index']);
            } else {
                return $this->goBack();
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


//    public function actionLog()
//    {
//        return $this->render('login');
//    }

    public function actionReg()
    {
        return $this->render('reg');
    }

    public function actionAccount()
    {
        $user_id = Yii::$app->user->id; // Получаем ID текущего пользователя
        $user_info = User::findOne($user_id); // Находим пользователя по ID
        return $this->render('account', compact('user_info'));
    }


    public function actionAddBookmark($lessonId)
    {
        $userId = Yii::$app->user->id;

        if (!UserBookmarks::find()->where(['user_id' => $userId, 'lesson_id' => $lessonId])->exists()) {
            $bookmark = new UserBookmarks();
            $bookmark->user_id = $userId;
            $bookmark->lesson_id = $lessonId;
            $bookmark->save();
        }

        return $this->redirect(['site/lesson', 'lesson_id' => $lessonId]);
    }

    public function actionBookmarks()
    {
        $userId = Yii::$app->user->id;
        $bookmarks = UserBookmarks::find()->where(['user_id' => $userId])->all();

        return $this->render('bookmarks', ['bookmarks' => $bookmarks]);
    }

    public function actionRemoveBookmark($lessonId)
    {
        $userId = Yii::$app->user->id;
        $bookmark = UserBookmarks::find()->where(['user_id' => $userId, 'lesson_id' => $lessonId])->one();

        if ($bookmark) {
            $bookmark->delete();
        }

        // Возвращаем ответ в формате JSON, чтобы обработать его на клиенте
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return ['success' => true];
    }


    public function actionTuner()
    {
        return $this->render('tuner');
    }

    public function actionMetr()
    {
        return $this->render('metr');
    }

    public function actionPolicy()
    {
        return $this->render('policy');
    }
}
