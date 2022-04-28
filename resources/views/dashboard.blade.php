<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-center font-bold text-xl"><svg class="h-8 w-8 text-blue-500 inline-flex items-center" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>Tablica korisnika:</div>
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
                    SELECT users.id, users.name, users.email, role_user.role_id AS role_ID, roles.display_name FROM users, role_user, roles WHERE users.id=role_user.user_id AND role_user.role_id=roles.id";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    echo "<table id='users' class='tableUsers table w-full text-sm text-left text-gray-500 dark:text-gray-400'>
                        <thead class='text-xm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                            <tr>
                                <th scope='col' class='px-6 py-3'>ID</th>
                                <th scope='col' class='px-6 py-3'>Name</th>
                                <th scope='col' class='px-6 py-3'>Email</th>
                                <th scope='col' class='px-6 py-3'>Role ID</th>
                                <th scope='col' class='px-6 py-3'>Role</th>
                                <th scope='col' class='px-6 py-3'></th>
                            </tr>
                        </thead>";
                        // output data of each row
                        while ($row = $result->fetch_assoc()) {
                        echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                            <td class='px-6 py-4'>" . $row["id"] . "</td>
                            <td class='px-6 py-4'>" . $row["name"] . "</td>
                            <td class='px-6 py-4'>" . $row["email"] . "</td>
                            <td class='px-6 py-4'>" . $row["role_ID"] . "</td>
                            <td class='px-6 py-4'>" . $row["display_name"] . "</td>
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
        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="text-center font-bold text-xl"><svg class="h-8 w-8 text-blue-500 inline-flex items-center" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <line x1="20" y1="8" x2="20" y2="14" />
                                <line x1="23" y1="11" x2="17" y2="11" />
                            </svg>Dodaj korisnika:</div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#users').DataTable({
                        "pagingType": "full_numbers",
                        columnDefs: [{
                            orderable: false,
                            targets: 3
                        }],
                    });
                });
            </script>
</x-app-layout>