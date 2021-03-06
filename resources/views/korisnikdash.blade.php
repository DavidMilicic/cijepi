<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moj profil') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p class="py-2">Ime: {{Auth::user()->name}} <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm" href="#editName" rel="modal:open">Promijenite ime</a></p>

                    <p class="py-2">Email: {{Auth::user()->email}}</p>

                    <p class="py-2">Želite promijeniti šifru? <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm" href="#editPassword" rel="modal:open">Promijenite šifru</a></p>

                    @if (\Session::has('successIme'))
                    <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                        <ul>
                            <li>{!! \Session::get('successIme') !!}</li>
                        </ul>
                    </div>
                    @endif

                    @if (\Session::has('successSifra'))
                    <div
                        class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                        <ul>
                            <li>{!! \Session::get('successSifra') !!}</li>
                        </ul>
                    </div>
                    @endif

                    @if (\Session::has('successPoruka'))
                    <div
                        class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                        <ul>
                            <li>{!! \Session::get('successPoruka') !!}</li>
                        </ul>
                    </div>
                    @endif
                                @if (\Session::has('successZakazani'))
                    <div class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                        <ul>
                            <li>{!! \Session::get('successZakazani') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--Modal-->
    <div id="editName" class="modal">
        <p class="font-bold text-xl"> Promjenite vaše ime:</p>
        <form action="/promijeniime" id="formime" method="post">
            @csrf
            <div class="mb-4">
                <input required type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Upišite novo ime...">
            </div>
            <a class="hover:bg-blue-400 py-2 px-4 rounded" href="#" rel="modal:close">Close</a>
            <button form="formime" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Promijeni ime</button>
        </form>
    </div>

    <div id="editPassword" class="modal">
        <p class="font-bold text-xl"> Promjenite vašu šifru</p>
        <form action="/promijenisifru" id="formsifra" method="post">
            @csrf
            <div class="mb-4">
                <input required minlength="8" type="password" name="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="text" placeholder="Upišite novu šifru...">
            </div>
            <a class="hover:bg-blue-400 py-2 px-4 rounded" href="#" rel="modal:close">Close</a>
            <button type="submit" form="formsifra" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Promijeni šifru</button>
        </form>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
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
                        SELECT name, email, datum, broj, marka FROM zakazani_datumi WHERE email='$email'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        echo "<div class='text-center font-bold text-xl'>Zakazani termin:</div>
                        <table id='users' class='tableUsers table w-full text-sm text-left text-gray-500 dark:text-gray-400'>
                            <thead class='text-xm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                                <tr>
                                    <th scope='col' class='px-6 py-3'>Datum</th>
                                    <th scope='col' class='px-6 py-3'>Marka</th>
                                    <th scope='col' class='px-6 py-3'>Broj doze</th>
                                    <th scope='col' class='px-6 py-3'></th>
                                </tr>
                            </thead>";
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                            echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                                <td class='px-6 py-4'>" . $row["datum"] . "</td>
                                <td class='px-6 py-4'>" . $row["marka"] . "</td>
                                <td class='px-6 py-4'>" . $row["broj"] . "</td>
                                <td class='px-6 py-4 text-right'><a class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm' href='#deleteTermin' rel='modal:open'>Izbriši termin</a></td>
                            </tr>";
                            }
                            echo "
                        </table>";
                        } else {
                        echo "<div class='text-center text-xl'>Ovdje će se prikazati vaši zakazani datumi. Zakažite datum u <a class='underline hover:bg-blue-200 py-2 px-2 rounded' href='/datumi'>Datumi</a></div>";
                        }
                        $conn->close();
                        @endphp

                    </div>
                </div>
            </div>
        </div>

        <div id="deleteTermin" class="modal">
            <p class="font-bold text-xl py-2 px-4 text-center"> Da li ste sigurni?</p>
            <div class="text-center">
            <a class="hover:bg-blue-400 py-2 px-4 rounded text-center" href="#" rel="modal:close">Close</a>
            @csrf
            <a method="get" href="/izbrisitermin" class="text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Izbriši termin</a>
            </div>
        </div>
</x-app-layout>