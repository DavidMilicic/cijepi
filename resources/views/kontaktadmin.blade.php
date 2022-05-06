<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kontakt') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                SELECT id, name, email, poruka FROM poruke";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                echo '<section class="text-gray-600 body-font">
                    <div class="container px-5 py-6 mx-auto">
                        <div class="flex flex-wrap -m-4">';
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                            echo '<div class="p-4 md:w-1/3">
                                <div
                                    class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden bg-gray-100 text-center">
                                    <svg class="mx-auto h-12 w-12 text-blue-500" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <rect x="3" y="5" width="18" height="14" rx="2" />
                                        <polyline points="3 7 12 13 21 7" />
                                    </svg>
                                    <div class="p-6">
                                        <h1 class="title-font text-xl font-bold text-gray-900 mb-3 underline">Ime: '.
                                            $row["name"]. '</h1>
                                        <h2 class="title-font text-xl font-bold text-gray-900 mb-3 underline">Email: '.
                                            $row["email"]. '</h2>
                                        <p class="leading-relaxed mb-3 text-black">Poruka: '. $row["poruka"] .'</p>

                                        <form action="/izbrisiporuku" method="get">
                                            <input name="id" type="hidden" value="' .$row["id"]. '" />
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">Izbriši
                                                poruku</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
                            }
                            echo "
                </section </div>
            </div>";
            } else {
            echo "<div class='text-center text-xl'>Ovdje će se prikazati poruke.</a></div>";
            }
            $conn->close();
            @endphp
                @if (\Session::has('successPorukaDel'))
                <div
                    class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                    <ul>
                        <li>{!! \Session::get('successPorukaDel') !!}</li>
                    </ul>
                </div>
                @endif
        </div>
    </div>
    <script>
        $('#demo').pagination({
        dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 195],
        callback: function(data, pagination) {
            // template method of yourself
            var html = template(data);
            dataContainer.html(html);
        }
    })
    </script>
</x-app-layout>