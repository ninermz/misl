<?php
$this->title = 'Метроном';
?>


<section class="lessons__top">
    <div class="banner">
        <h1 class="banner_top">МЕТРОНОМ</h1>
    </div>
    <div class="btn-icon-wrapper">

        <p class="btn-tuls">
            <a class="btn-acc-form" href="/site/tuner">Тюнер</a>
        </p>
        <div class="icon-container-metr_tuner">
            <a href="https://ru.wikipedia.org/wiki/Cookie">
                <img src="/images/svg/question.svg" alt="">
            </a>
        </div>
    </div>
    <div class="banner__border"></div>
</section>



<div class="metronome-container">
    <div class="metronome">
        <div class="bpm-display" id="bpmDisplay">60 BPM</div>
        <input type="range" id="bpmRange" min="40" max="240" value="60">
        <button class="btn-acc" id="startStopButton">Начать</button>
        <div class="time-signature">
            <label for="timeSignature">Размер:</label>
            <select id="timeSignature">
                <option value="4/4">4/4</option>
                <option value="3/4">3/4</option>
            </select>
        </div>
    </div>
</div>

