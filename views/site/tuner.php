<?php
$this->title = 'Хроматический тюнер';
?>

<section class="lessons__top">
    <div class="banner">
        <h1 class="banner_top">ТЮНЕР</h1>
    </div>
    <div class="btn-icon-wrapper">
    <p class="btn-tuls">
        <a class="btn-acc-form" href="/site/metr">Метроном</a>
    </p>
        <div class="icon-container-metr_tuner">
            <a href="https://ru.wikipedia.org/wiki/Cookie">
                <img src="/images/svg/question.svg" alt="">
            </a>
        </div>
    </div>
    <div class="banner__border"></div>
</section>

<section class="tuner">

    <div id="detector">
        <div class="pitch"><span id="pitch">--</span>Hz</div>
        <div class="note"><span id="note">--</span></div>
        <canvas class="canvas-tuner" id="output" width="300" height="42"></canvas>
        <div id="detune"><span id="detune_amt">--</span><span id="flat">cents &#9837;</span><span id="sharp">cents &#9839;</span></div>
    </div>
        <p><button class="btn-tuner" onclick="startPitchDetect();">Начать</button></p>

</section>
