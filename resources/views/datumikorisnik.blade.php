<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Datumi') }}
        </h2>
    </x-slot>

    </br>

    <section class="max-w-3xl px-6 py-4 mx-auto rounded-md shadow-md bg-gray-100">

        <!--povlaci podatke sa baze-->
        <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
        $resultSet = $mysql->query("SELECT datum FROM moguci_datumi")
        ?>
        <form action="/createzakazani" method="post">
            @csrf
            <div>
                <p class="text-center text-3xl">Odaberite termin vakciniranja.</p>
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
            <input name="name" type="hidden" value="<?php

                                                    echo Auth::user()->name #crveno, ali radi

                                                    ?>" />
            <input name="email" type="hidden" value="<?php

                                                        echo Auth::user()->email

                                                        ?>" />
            <div class="container px-5 mx-auto">

                <div class="text-center">

                    <div class="text-center">Odaberite dozu vakcine:</div>

                    <!--povlaci podatke sa baze-->
                    <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
                    $resultSet = $mysql->query("SELECT broj FROM broj_doze")
                    ?>
                    <select name="broj" class="text-center border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                        <!--Prikazuje podatke iz baze-->
                        <?php
                        while ($rows = $resultSet->fetch_assoc()) {
                            $broj = $rows["broj"];
                            echo "<option value='$broj'>$broj</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="text-center">
                    <div class="text-center">Odaberite vakcinu:</div>

                    <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
                    $resultSet = $mysql->query("SELECT marka FROM marka_vakcine")
                    ?>
                    <select name="marka" class="text-center border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                        <?php
                        while ($rows = $resultSet->fetch_assoc()) {
                            $marka = $rows["marka"];
                            echo "<option value='$marka'>$marka</option>";
                        }
                        ?>
                    </select>
                </div>

                @php
                $servername = $_ENV["DB_HOST"];
                $username = $_ENV["DB_USERNAME"];
                $password = $_ENV["DB_PASSWORD"];
                $dbname = $_ENV["DB_DATABASE"];

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                }

                $email = Auth::user()->email;
                $sql = "
                SELECT name, email, datum, marka FROM zakazani_datumi WHERE email='$email'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0)
                {
                echo '<div class="text-center">Pogledajte profil da vidite svoj zakazani termin!</div>';
                }
                else
                {
                echo '<div class="text-center py-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Zakaži termin</button>
                </div>';
                }
                $conn->close();
                @endphp


            </div>
        </form>
    </section>
    </br>
    <!--Vakcine-->
    <section class="max-w-6xl px-6 py-4 mx-auto rounded-md shadow-md bg-gray-100">
        <div class="container px-5 py-24 mx-auto">

            <div class="flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md sm:rounded-lg">
                            <table class="min-w-full">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase dark:text-gray-400">
                                            Kompanija
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase dark:text-gray-400">
                                            Tip
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase dark:text-gray-400">
                                            Doziranje
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase dark:text-gray-400">
                                            Djelotvornost
                                        </th>
                                        <th scope="col" class="py-3 px-6 text-xs font-medium tracking-wider text-left uppercase dark:text-gray-400">
                                            Skladištenje
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg> Pfizer
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            RNA
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>x2
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            90%
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>-70°C
                                        </td>
                                    </tr>

                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>Moderna
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            RNA(dio genetickog koda virusa)
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>x2
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            95%
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>-20°C do 6°C
                                        </td>
                                    </tr>

                                    <tr class="bg-white dark:bg-gray-800">
                                        <td class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                            </svg>AstraZeneca
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            Viralni vektor
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>x2
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            Jak imunološki odgovor
                                        </td>
                                        <td class="py-4 px-6 text-sm text-black whitespace-nowrap dark:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>Regularna temperatura hladnjaka
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    </br>
</x-app-layout>