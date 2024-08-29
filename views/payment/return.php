<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $paymentId string */

$this->title = 'Возврат после оплаты';
?>
<div class="site-return-payment">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Оплата успешно завершена. ID платежа: <?= Html::encode($paymentId) ?></p>


    <br><link rel="stylesheet" href="https://yookassa.ru/integration/simplepay/css/yookassa_construct_form.css">
    <form class="yoomoney-payment-form" action="https://yookassa.ru/integration/simplepay/payment" method="post" accept-charset="utf-8" >
</div>
