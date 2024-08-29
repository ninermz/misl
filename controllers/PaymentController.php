<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use YooKassa\Client;

class PaymentController extends Controller
{
    public function actionCreate()
    {
        $client = new Client();
        $client->setAuth('403882','test_W9T-CZRsDpyIU2P6imxX1XFC86jz-Pw5s_EY2u59yjs');

        $idempotenceKey = uniqid('', true);

        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => '5499.00',
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => Url::to(['/courses/courses'], true),
                ],
                'capture' => true,
                'description' => 'Курс Мастерство Музыкальной Импровизации',
            ],
            $idempotenceKey
        );

        return $this->redirect($payment->getConfirmation()->getConfirmationUrl());
    }

    public function actionReturn()
    {
        $request = Yii::$app->request;

        // Обработка возвращения пользователя после оплаты
        $paymentId = $request->get('paymentId');

        // Здесь вы можете проверить статус платежа и обновить статус заказа в вашей базе данных
        // $client = new Client();
        // $client->setAuth(Yii::$app->params['yookassa']['shopId'], Yii::$app->params['yookassa']['secretKey']);
        // $payment = $client->getPaymentInfo($paymentId);

        return $this->render('return', [
            'paymentId' => $paymentId,
        ]);
    }

    public function actionNewPay()
    {
        return $this->render('newpay');
    }
}