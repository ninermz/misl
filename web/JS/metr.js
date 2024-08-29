document.addEventListener('DOMContentLoaded', function() {
    const bpmDisplay = document.getElementById('bpmDisplay');
    const bpmRange = document.getElementById('bpmRange');
    const startStopButton = document.getElementById('startStopButton');
    const timeSignatureSelect = document.getElementById('timeSignature');

    let isRunning = false;
    let audioContext = new (window.AudioContext || window.webkitAudioContext)();
    let currentBeat = 0;
    let nextNoteTime = 0.0;
    let lookahead = 25.0;
    let scheduleAheadTime = 0.1;
    let intervalID;
    let beatsPerMeasure = 4;

    function nextNote() {
        const secondsPerBeat = 60.0 / bpmRange.value;
        nextNoteTime += secondsPerBeat;
        currentBeat++;
        if (currentBeat >= beatsPerMeasure) {
            currentBeat = 0;
        }
    }

    function scheduleNote(beatNumber, time) {
        const osc = audioContext.createOscillator();
        const envelope = audioContext.createGain();

        osc.connect(envelope);
        envelope.connect(audioContext.destination);

        if (beatNumber % beatsPerMeasure === 0) {
            osc.frequency.value = 1000;
            osc.type = 'square';  // Измените тип волны на 'square'
        } else {
            osc.frequency.value = 800;
            osc.type = 'sine';  // Измените тип волны на 'sine'
        }

        envelope.gain.setValueAtTime(1, time);
        envelope.gain.exponentialRampToValueAtTime(0.001, time + 0.1);  // Эффект огибающей

        osc.start(time);
        osc.stop(time + 0.1);
    }

    function scheduler() {
        while (nextNoteTime < audioContext.currentTime + scheduleAheadTime) {
            scheduleNote(currentBeat, nextNoteTime);
            nextNote();
        }
    }

    function startStop() {
        if (isRunning) {
            clearInterval(intervalID);
            isRunning = false;
            startStopButton.textContent = 'Начать';
        } else {
            currentBeat = 0;
            nextNoteTime = audioContext.currentTime;
            intervalID = setInterval(scheduler, lookahead);
            isRunning = true;
            startStopButton.textContent = 'Остановить';
        }
    }

    bpmRange.addEventListener('input', function() {
        bpmDisplay.textContent = `${bpmRange.value} BPM`;
    });

    startStopButton.addEventListener('click', startStop);

    timeSignatureSelect.addEventListener('change', function() {
        const timeSignature = timeSignatureSelect.value;
        if (timeSignature === '4/4') {
            beatsPerMeasure = 4;
        } else if (timeSignature === '3/4') {
            beatsPerMeasure = 3;
        }
    });
});