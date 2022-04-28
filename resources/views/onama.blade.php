<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('O nama') }}
        </h2>
    </x-slot>


    <!--Mi-->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-6 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100 text-center">
                        <img class="w-full object-cover object-center" src="{{ asset('images/David.png') }}">
                        <div class="p-6">
                            <h1 class="title-font text-xl font-bold text-gray-900 mb-3 underline">David</h1>
                            <p class="leading-relaxed mb-3 text-black">Pozdrav, ja sam David Miličić. Imam 21 godinu i živim u Ugljari. Student sam treće godine Informatike u Orašju. Slobodno vrijeme provodim igrajući igre i družeći se sa prijateljima.</p>
                            <a href="https://github.com/DavidMilicic">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm underline">GitHub
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100 text-center">
                        <img class="w-full object-cover object-center" src="{{ asset('images/Kruno.png') }}">
                        <div class="p-6">
                            <h1 class="title-font text-xl font-bold text-gray-900 mb-3 underline">Kruno</h1>
                            <p class="leading-relaxed mb-3 text-black">Pozdrav, ja sam Krunoslav Knežević. Imam 22 godine i živim u Jenjiću. Student sam treće godine Informatike u Orašju. U slobodno vrijeme igram nogomet,igre i čitam knjige.</p>
                            </p>
                            <a href="https://github.com/knez99">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm underline">GitHub
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="p-4 md:w-1/3">
                    <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100 text-center">
                        <img class="w-full object-cover object-center" src="{{ asset('images/Mario.png') }}">
                        <div class="p-6">
                            <h1 class="title-font text-xl font-bold text-gray-900 mb-3 underline">Mario</h1>
                            <p class="leading-relaxed mb-3 text-black">Pozdrav, ja sam Mario Nedić. Imam 21 godinu i živim u Tolisi. Trenutno sam student treće godine Informatike u Orašju. Uz faks, slobodno vrijeme provodim s prijateljima, s bratom se bavim izradom namještaja te vikednom radim u diskoteci. 😄</p>
                            <a href="https://github.com/MarioNedic">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm underline">GitHub
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Informacije-->
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-6 mx-auto">
            <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6 bg-gray-100">
                <div class="p-4 md:w-1/3 flex">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>
                    </div>
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-bold mb-2">O projektu</h2>
                        <p class="leading-relaxed text-base text-black">Svrha dokumenta je omogućiti korisnicima stranice prijavu za vakciniranje. Bilo koji korisnik će se moći prijaviti na stranicu sapotrebnim dokumentima (osobna iskaznica) te se tako prijaviti za vakciniranje u bolnici. Radni naziv projekta je „Cijepi se“ i ono također potiče ljude na cijepljenje protiv virusa.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                        </svg>
                    </div>
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-bold mb-2">Tehnologije</h2>
                        <p class="leading-relaxed text-base text-black">Koristit ćemo tehnologije kao: Laravel, Tailwind css i javascript, MySQL.</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/3 flex">
                    <div class="w-12 h-12 inline-flex items-center justify-center rounded-full bg-blue-100 text-blue-500 mb-4 flex-shrink-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <div class="flex-grow pl-6">
                        <h2 class="text-gray-900 text-lg title-font font-bold mb-2">Motivacija</h2>
                        <p class="leading-relaxed text-base text-black">Radimo ovo jer bi ova ideja jako pomogla u današnje vrijeme. Jako nas zanima kako bi mogli popraviti neke stvari u ovoj sredini, i cijepljenje je jedna od tih stvari. Ideja bi sigurno dobro prošla među našim ljudima jer olakšava cijepljenje.</p>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <!-- Case Diagram -->
    <section class="text-gray-600 body-font">
        <div class="container px-80 py-6 mx-auto">
        <img class="w-full object-cover object-center" src="{{ asset('images/CaseDiagram.jpg') }}">
        </div>
    </section>

</x-app-layout>