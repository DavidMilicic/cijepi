<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if (\Session::has('successUserAdded'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative text-center"
                    role="alert">
                    <strong class="font-bold">{!! \Session::get('successUserAdded') !!}</strong>
                </div>
                @endif
                @if (\Session::has('successRoleChanged'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-4 rounded relative text-center"
                    role="alert">
                    <strong class="font-bold">{!! \Session::get('successRoleChanged') !!}</strong>
                </div>
                @endif
                <div class="text-center font-bold text-xl"><svg class="h-8 w-8 text-blue-500 inline-flex items-center"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round">
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

                    $sqlUsers = "
                    SELECT users.id, users.name, users.email, role_user.role_id FROM users RIGHT JOIN role_user ON
                    users.id = role_user.user_id";
                    $resultUsers = $conn->query($sqlUsers);

                    if ($resultUsers->num_rows > 0) {
                    echo "<table id='users'
                        class='tableUsers table w-full text-sm text-left text-gray-500 dark:text-gray-400'>
                        <thead class='text-xm text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                            <tr>
                                <th scope='col' class='px-6 py-3'>ID</th>
                                <th scope='col' class='px-6 py-3'>Name</th>
                                <th scope='col' class='px-6 py-3'>Email</th>
                                <th scope='col' class='px-6 py-3'>Role ID</th>
                                <th scope='col' class='px-6 py-3'></th>
                            </tr>
                        </thead>";
                        // output data of each row
                        while ($row = $resultUsers->fetch_assoc()) {
                        $id = $row["id"];
                        echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700'>
                            <td class='px-6 py-4'>" . $row["id"] . "</td>
                            <td class='px-6 py-4'>" . $row["name"] . "</td>
                            <td class='px-6 py-4'>" . $row["email"] . "</td>
                            <td class='px-6 py-4'>" . $row["role_id"] . "
                            </td>
                            <td class='px-6 py-4 text-right'>
                                <form action='/izbrisikorisnika' method='get'>
                                    <input name='id' type='hidden' value='" .$id. "' />
                                    <button
                                        class='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm'>Izbriši
                                        korisnika</button>
                                </form>
                            </td>
                        </tr>";
                        }
                        echo "
                    </table>";
                    } else {
                    echo "Nema korisnika.";
                    }
                    $conn->close();
                    @endphp
                    @if (\Session::has('success'))
                    <div
                        class="alert bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center">
                        <ul>
                            <li>{!! \Session::get('success') !!}</li>
                        </ul>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="w-full max-w-2xl px-6 py-4 mx-auto rounded-md shadow-md bg-white">
            <h2 class="text-3xl font-semibold text-center "><svg class="h-8 w-8 text-blue-500 inline-flex items-center"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="8.5" cy="7" r="4" />
                    <line x1="20" y1="8" x2="20" y2="14" />
                    <line x1="23" y1="11" x2="17" y2="11" />
                </svg>Dodaj korisnika:</h2>

            <form action="/dodajkorisnika" method="post">
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
                        <label class="block mb-2 text-sm font-medium text-black">Šifra</label>

                        <input required name="password"
                            class="block w-full px-4 py-2 bg-white border rounded-md focus:border-blue-400 focus:ring-blue-300 focus:border-blue-300 focus:outline-none focus:ring focus:ring-opacity-40"
                            type="password">
                    </div>

                    <div class="w-full mt-4 text-center">
                        <p>Odredite role:</p>
                        <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
                    $resultSet = $mysql->query("SELECT id, display_name FROM roles")
                    ?>
                        <select name="role_id"
                            class="text-center border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                            <!--Prikazuje podatke iz baze-->
                            <?php
                        while ($rows = $resultSet->fetch_assoc()) {
                            $id = $rows["id"];
			                $display_name = $rows["display_name"];
                            echo "<option value='$id'>$id $display_name</option>";
                        }
                        ?>

                        </select>
                    </div>

                    <div class="flex justify-center mt-6">
                        <button type="submit"
                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md focus:outline-none">Dodaj
                            korisnika</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="py-12">
        <div class="w-full max-w-2xl px-6 py-4 mx-auto rounded-md shadow-md bg-white">
            <h2 class="text-3xl font-semibold text-center "><svg class="h-8 w-8 text-blue-500 inline-flex items-center"
                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <circle cx="5" cy="18" r="2" />
                    <circle cx="19" cy="6" r="2" />
                    <path d="M19 8v5a5 5 0 0 1 -5 5h-3l3 -3m0 6l-3 -3" />
                    <path d="M5 16v-5a5 5 0 0 1 5 -5h3l-3 -3m0 6l3 -3" />
                </svg>Promijeni Role:</h2>
            <form action="/promijenirole" method="post">
                @csrf
                <div class="mt-6 ">
                    <div class="items-center -mx-2 md:flex">
                        <div class="w-full mx-2">
                            <div class="w-full mt-4 text-center">
                                <p>Izaberite korisnika:</p>
                                <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
                            $resultSet = $mysql->query("SELECT id, name, email FROM users")
                            ?>
                                <select name="user_id"
                                    class="text-center border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                                    <!--Prikazuje podatke iz baze-->
                                    <?php
                                while ($rows = $resultSet->fetch_assoc()) {
                                    $id = $rows["id"];
                                    $name = $rows["name"];
                                    $email = $rows["email"];
                                    echo "<option value='$id'>$id $name $email</option>";
                                }
                                ?>

                                </select>
                            </div>
                            <div class="w-full mt-4 text-center">
                                <p>Odredite role:</p>
                                <?php $mysql = new MySQLi($_ENV["DB_HOST"], $_ENV["DB_USERNAME"], $_ENV["DB_PASSWORD"], $_ENV["DB_DATABASE"]);
                    $resultSet = $mysql->query("SELECT id, display_name FROM roles")
                    ?>
                                <select name="role_idChange"
                                    class="text-center border border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">

                                    <!--Prikazuje podatke iz baze-->
                                    <?php
                        while ($rows = $resultSet->fetch_assoc()) {
                            $id = $rows["id"];
			                $display_name = $rows["display_name"];
                            echo "<option value='$id'>$id $display_name</option>";
                        }
                        ?>

                                </select>
                            </div>

                            <div class="flex justify-center mt-6">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md focus:outline-none">Dodaj
                                    korisnika</button>
                            </div>
                        </div>
            </form>
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