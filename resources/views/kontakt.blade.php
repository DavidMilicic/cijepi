<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Kontakt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full max-w-2xl px-6 py-4 mx-auto rounded-md shadow-md bg-white">
            @if (\Session::has('successPoruka'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative text-center"
                role="alert">
                <strong class="font-bold">{!! \Session::get('successPoruka') !!}</strong>
            </div>
            @endif
            <h2 class="text-3xl font-semibold text-center ">Kontaktirajte nas</h2>
            <p class="mt-3 text-center text-black">Pomoći ćemo vam!</p>

            <div class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 md:grid-cols-3">
                <a href="#"
                    class="flex flex-col items-center px-4 py-3 transition-colors duration-200 transform rounded-md text-black hover:bg-blue-400 ">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd" />
                    </svg>

                    <span class="mt-2">Mostar</span>
                </a>

                <a href="#"
                    class="flex flex-col items-center px-4 py-3 transition-colors duration-200 transform rounded-md text-black hover:bg-blue-400">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path
                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                    </svg>

                    <span class="mt-2">+63690420</span>
                </a>

                <a href="#"
                    class="flex flex-col items-center px-4 py-3 transition-colors duration-200 transform rounded-md text-black hover:bg-blue-400">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                    </svg>

                    <span class="mt-2">cijepisekontakt@gmail.com</span>
                </a>
            </div>
            <form action="/posaljiporuku" method="post">
                @csrf
                <div class="mt-6 ">
                    <div class="items-center -mx-2 md:flex">
                        <div class="w-full mx-2">
                            <label class="block mb-2 text-sm font-medium text-black">Ime</label>

                            <input required name="name"
                                class="block w-full px-4 py-2 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                type="text">
                        </div>

                        <div class="w-full mx-2 mt-4 md:mt-0">
                            <label class="block mb-2 text-sm font-medium text-black">E-mail</label>

                            <input required name="email"
                                class="block w-full px-4 py-2 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                                type="email">
                        </div>
                    </div>

                    <div class="w-full mt-4">
                        <label class="block mb-2 text-sm font-medium text-black">Poruka</label>

                        <textarea required maxlength="200" placeholder="(maksimalno 200 znakova)" name="poruka"
                            class="block w-full h-40 px-4 py-2 bg-white border rounded-md focus:border-blue-400 focus:border-blue-300 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-40"></textarea>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md focus:outline-none">Pošalji poruku</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>