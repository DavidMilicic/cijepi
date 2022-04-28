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
                    Name: {{Auth::user()->name}} </br>
                    Email: {{Auth::user()->email}}
                </div>
            </div>
        </div>
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

                    $sql = "
                    SELECT name, email, datum, marka, broj FROM zakazani_datumi";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    echo "<table id='users' class='tableUsers table w-full text-sm text-left text-gray-500 dark:text-gray-400'>
                        <thead class='text-xm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                            <tr>
                                <th scope='col' class='px-6 py-3'>Name</th>
                                <th scope='col' class='px-6 py-3'>Email</th>
                                <th scope='col' class='px-6 py-3'>Datum</th>
                                <th scope='col' class='px-6 py-3'>Marka</th>
                                <th scope='col' class='px-6 py-3'>Broj doze</th>
                                <th scope='col' class='px-6 py-3'></th>
                            </tr>
                        </thead>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                        echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                            <td class='px-6 py-4'>" . $row["name"] . "</td>
                            <td class='px-6 py-4'>" . $row["email"] . "</td>
                            <td class='px-6 py-4'>" . $row["datum"] . "</td>
                            <td class='px-6 py-4'>" . $row["marka"] . "</td>
                            <td class='px-6 py-4'>" . $row["broj"] . "</td>
                            <td class='px-6 py-4 text-right'><a href='#' class='font-medium text-blue-600 dark:text-blue-500 hover:underline'>Edit</a></td>
                        </tr>";
                        }
                        echo "
                    </table>";
                    } else {
                    echo "0 results";
                    }
                    $conn->close();
                    @endphp
                </div>
                </div>
            </div>
        </div>

        <script>
                $(document).ready(function() {
                    $('#users').DataTable({
                        "pagingType": "full_numbers",
                        columnDefs: [{
                            orderable: false,
                            targets: 4
                        }],
                    });
                });
            </script>
</x-app-layout>
