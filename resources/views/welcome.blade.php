<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Laravel</title>

</head>

<body class="antialiased bg-gradient-to-b from-blue-200 to-blue-500">
    <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
        <div class="fixed top-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ route('dashboard') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4 text-sm underline">Dashboard
            </button>
            </a>
            @else
            <a href="{{ route('login') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm underline">Log in
            </button>
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-4 text-sm underline">Register
            </button>
            </a>
            @endif
            @endauth
        </div>
        @endif

        <!--Slike i objašnjenje-->
        <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="flex flex-wrap -m-4">
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100">
                            <img class="w-full object-cover object-center" src="images/Upitnik.png" alt="blog">
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Što je cjepivo?</h1>
                                <p class="leading-relaxed mb-3">Cjepivo je vrsta biološkog preparata koja poboljšava odnosno pomaže stvaranju otpornosti prema nekoj bolesti. U cjepivu se obično nalaze tvari koje predstavljaju neku bolest, a te tvari mogu biti: oslabljeni ili mrtvi mikroorganizmi koji uzrokuju neku bolest, toksini ili dijelovi proteina omotača mikroorganizama ili RNK mikroorganizama. U organizam se mogu unositi injekcijom u kožu, pod kožu ili u mišić, u usta ili u nos.</p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100">
                            <img class="w-full object-cover object-center" src="images/ZastoCijepiti.png" alt="blog">
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Zašto se cijepiti?</h1>
                                <p class="leading-relaxed mb-3">Najprije cijepljenje nam pruža imunitet: pruža dugotrajnu, ponekad doživotnu zaštitu od bolesti. Cjepiva koja se preporučuju u programu cijepljenja u ranoj dječjoj dobi štite djecu od ospica, vodenih kozica i drugih bolesti. Sekundarna korist cijepljenja je "imunitet stada", također poznat kao imunitet zajednice. Imunitet stada nam svima pruža zaštitu kako je veći broj cijepljenih u zajednici. Uz dovoljno ljudi s imunitetom protiv određene bolesti, teško je da se bolest pojavi u zajednici.</p></p>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 md:w-1/3">
                        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100">
                            <img class="w-full object-cover object-center" src="images/KakoPrijaviti.png" alt="blog">
                            <div class="p-6">
                                <h1 class="title-font text-lg font-medium text-gray-900 mb-3">Kako se prijaviti za cijepljenje?</h1>
                                <p class="leading-relaxed mb-3">Jednostavno se prijavite na stranicu, ispunite odgovarajuća polja te pogledajte dostupne datume za cijepljenje!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
</body>

</html>