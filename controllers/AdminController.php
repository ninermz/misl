<?php

namespace app\controllers;

use Yii;
use app\models\Lesson;
use app\models\User;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
class AdminController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index'],
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role == 1;
                        },
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        // Ваш код для админ-панели
        return $this->render('index');
    }

    public function actionError()
    {
        return $this->render('error', [
            'name' => '403 Forbidden',
            'message' => 'У вас нет доступа к этой странице.',
        ]);
    }

    public function beforeAction($action)
    {
        if (parent::beforeAction($action)) {
            if (Yii::$app->user->identity->role != 1) {
                throw new ForbiddenHttpException('У вас нет доступа к этой странице.');
            }
            return true;
        }
        return false;
    }


}