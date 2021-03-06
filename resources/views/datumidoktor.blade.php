<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datumi') }}
        </h2>
    </x-slot>

    </br>

    <section class="max-w-3xl px-6 py-4 mx-auto rounded-md shadow-md bg-gray-100">
        <div>
            <p class="text-center text-3xl">Odredite mogući datum prijave.</p>
        </div>

            <!--Date selector - ovaj action /create salje na web route-->
        <div class="container px-5 py-4 mx-auto">
            <form action="/createmoguci" method="post" autocomplete="off">
                <div class="relative">
                    <input name="datum" required datepicker datepicker-format="yyyy/mm/dd" datepicker-autohide datepicker-buttons type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                </div>
                @csrf
                <div class="text-center py-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Odredite termin</button>
                </div>
            </form>

            @if (\Session::has('successMoguci'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center" role="alert">
                <strong class="font-bold">{!! \Session::get('successMoguci') !!}</strong>
            </div>
            @endif

            <!--Za vec dodane datume-->
            <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
            $resultSet = $mysql->query("SELECT datum FROM moguci_datumi")
            ?>
            <form action="/createzakazani" method="post">
                @csrf
                <div>
                    <p class="text-center text-3xl">Dodani datumi:</p>
                </div>
                <div class="text-center py-4">
                    <select name="datum" class="text-center border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <!--Prikazuje podatke iz baze-->
                        <?php
                        while ($rows = $resultSet->fetch_assoc()) {
                            $datum = $rows["datum"];
                            echo "<option value='$datum'>$datum</option>";
                        }
                        ?>
                    </select>
                </div>
    </section>
</x-app-layout>