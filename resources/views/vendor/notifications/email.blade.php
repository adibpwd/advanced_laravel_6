<style>
    .cards {
        position: relative;
        list-style-type: none;
        padding: 0;
        max-width: 34em;
        margin: 20% auto 0;
    }

    .card {
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
        background: #ccc;
        border-radius: 30px;
        padding: 40px;
        box-shadow: 0 0 40px #000;
        -webkit-transform: translateY(0) rotate(4deg) translateX(25px) scale(1);
        transform: translateY(0) rotate(4deg) translateX(25px) scale(1);
        -webkit-transform-origin: 0 0;
        transform-origin: 0 0;
        -webkit-transition: background 0.4s linear, -webkit-transform 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8) 0.1s;
        transition: background 0.4s linear, -webkit-transform 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8) 0.1s;
        transition: transform 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8) 0.1s, background 0.4s linear;
        transition: transform 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8) 0.1s, background 0.4s linear, -webkit-transform 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8) 0.1s;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    .card :last-child {
        margin-bottom: 0;
    }

    .card--next {
        z-index: 5;
        -webkit-transform: translateY(-25px) rotate(4deg) translateX(25px) scale(1);
        transform: translateY(-25px) rotate(4deg) translateX(25px) scale(1);
    }

    .card--out {
        -webkit-animation: card-out 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8);
        animation: card-out 0.6s cubic-bezier(0.8, 0.2, 0.1, 0.8);
        -webkit-transform: translateY(-50px) rotate(8deg) translateX(55px) scale(0.95);
        transform: translateY(-50px) rotate(8deg) translateX(55px) scale(0.95);
        z-index: 1;
        background: #bbb;
    }

    @-webkit-keyframes card-out {
        0% {
            z-index: 20;
            -webkit-transform: translateY(0px) rotate(-4deg);
            transform: translateY(0px) rotate(-4deg);
        }

        50% {
            -webkit-transform: translateY(-120%) rotate(-5deg) translateX(-40px);
            transform: translateY(-120%) rotate(-5deg) translateX(-40px);
        }

        80% {
            z-index: 1;
        }

        100% {
            -webkit-transform: translateY(-50px) rotate(8deg) translateX(55px) scale(0.95);
            transform: translateY(-50px) rotate(8deg) translateX(55px) scale(0.95);
        }
    }

    @keyframes card-out {
        0% {
            z-index: 20;
            -webkit-transform: translateY(0px) rotate(-4deg);
            transform: translateY(0px) rotate(-4deg);
        }

        50% {
            -webkit-transform: translateY(-120%) rotate(-5deg) translateX(-40px);
            transform: translateY(-120%) rotate(-5deg) translateX(-40px);
        }

        80% {
            z-index: 1;
        }

        100% {
            -webkit-transform: translateY(-50px) rotate(8deg) translateX(55px) scale(0.95);
            transform: translateY(-50px) rotate(8deg) translateX(55px) scale(0.95);
        }
    }

    .card--current {
        cursor: auto;
        -webkit-user-select: auto;
        -moz-user-select: auto;
        -ms-user-select: auto;
        user-select: auto;
        position: relative;
        z-index: 10;
        opacity: 1;
        background: #EEE;
        -webkit-transform: rotate(-1deg) translateX(0%) scale(1);
        transform: rotate(-1deg) translateX(0%) scale(1);
    }

    h1 {
        margin: 0;
    }

    html,
    body {
        height: 100%;
    }

    body {
        padding: 40px;
        background: #222232;
    }
</style>

@isset($post)
<ul class="cards">
    <li class="card">
        <h1 style="color: blue;">Post Baru</h1>
        <h1>{{ $title }}</h1>

        <p>{{ $content }}</p>
        <p style="bottom: 10px; right: 10px">{{ $create }}</p>
    </li>
</ul>
@endisset

@isset($comment)
<ul class="cards">

    <li class="card">

        <h1>{{ $title }}</h1>

        <p>{{ $content }}</p>
        <p style="bottom: 10px; right: 10px">{{ $create }}</p>
    </li>
</ul>
@endisset