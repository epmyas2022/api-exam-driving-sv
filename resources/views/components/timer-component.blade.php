<div>

    <h1 id="timer">{{$time}}</h1>
</div>

<script>
    let time = {!! $time !!};
    let timer = document.getElementById('timer');

    let interval = setInterval(() => {
        time--;
        timer.innerHTML = time;
        if (time == 0) {
            clearInterval(interval);
            window.location.reload();
        }
    }, 1000);
</script>
