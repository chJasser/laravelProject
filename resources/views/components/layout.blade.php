<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://kit.fontawesome.com/4c81e93c6f.js" crossorigin="anonymous"></script>
    <link href="/css/app.css" rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#008080",
                    },
                },
            },
        };
    </script>
    <title>SmartSchool</title>
</head>


<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="/"><img class="w-24" src="{{ asset('images/logo.jpg') }}" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">

            @auth

                @php
                    $userRole = App\Http\Controllers\UserController::userRole(auth()->id());
                @endphp

                @unless($userRole != 'admin')
                    <li>
                        <span class="font-bold uppercase">
                            {{ auth()->user()->name }}
                        </span>
                    </li>
                    <li>
                        <a href="/backoffice/events/manage" class="hover:text-laravel"><i
                                class="fa-solid fa-gear"></i>Events</a>
                    </li>
                    <li>
                        <a href="/forums/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i>Forums</a>
                    </li>

                    <li>
                    <a href="/courses/manage" class="hover:text-laravel">
                        <i class="fa fa-book" aria-hidden="true"></i>

                        Courses</a>
                </li>
                <li>
                    <a href="/clubs/manage" class="hover:text-laravel">
                        <i class="fa fa-paint-brush" aria-hidden="true"></i>

                        Clubs</a>
                </li>
                    
                    <li> <a href="/conventions/manage" class="hover:text-laravel"><i
                                class="fa-solid fa-gear"></i>Conventions</a></li>
                    <li> <a href="/reclamations/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"
                                aria-hidden="true"></i>Reclamations</a></li>
                    <li>
                        <a href="/events/participation" class="hover:text-laravel"><i class="fa-solid fa-heart"></i>
                            Participations</a>
                    </li>
                @else
                    <li>
                        <span class="font-bold uppercase">
                            {{ auth()->user()->name }}
                        </span>
                    </li>
                    <li>
                        <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">Dropdown <svg class="ml-1 w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                        <!-- Dropdown menu -->
                        <div id="dropdownNavbar" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                            <ul class="py-3 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="/forums" class="hover:text-laravel"><i class="fa-solid fa-list"></i>
                                Forums</a>
                            </li>
                            <li>
                                <a href="/conventions" class="hover:text-laravel"><i class="fa-solid fa-list"></i>
                                Conventions</a>
                            </li>
                            <li>
                                <a href="/events" class="hover:text-laravel"><i class="fa-solid fa-list"></i>
                                Events</a>
                            </li>
                            <li>
                                <a href="/modules/manage" class="hover:text-laravel">
                                    <i class="fa fa-book" aria-hidden="true"></i>

                                        Modules</a>
                            </li>
                            <li>
                            <a href="/courses/manage" class="hover:text-laravel">
                                <i class="fa fa-book" aria-hidden="true"></i>

                                    Courses</a>
                            </li>
                            <li>
                                <a href="/clubs/manage" class="hover:text-laravel">
                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>

                                    Clubs</a>
                            </li>
                            <li>
                                <a href="/events/participation" class="hover:text-laravel"><i class="fa-solid fa-heart"></i>
                                    Participations</a>
                                </li>
                        </ul>
                                   
                                </div>
                            </li>
                    <li>
                        <a href="/forums" class="hover:text-laravel"><i class="fa-solid fa-list"></i>
                            Forums</a>
                    </li>
                    <li>
                        <a href="/conventions" class="hover:text-laravel"><i class="fa-solid fa-list"></i>
                            Conventions</a>
                    </li>
                    <li>
                        <a href="/events" class="hover:text-laravel"><i class="fa-solid fa-list"></i>
                            Events</a>
                    </li>
                    <li>
                    <a href="/courses/manage" class="hover:text-laravel">
                        <i class="fa fa-book" aria-hidden="true"></i>

                            Courses</a>
                    </li>
                    <li>
                    <a href="/modules/manage" class="hover:text-laravel">
                        <i class="fa fa-book" aria-hidden="true"></i>

                            Modules</a>
                    </li>
                    <li>
                        <a href="/clubs/manage" class="hover:text-laravel">
                            <i class="fa fa-paint-brush" aria-hidden="true"></i>

                            Clubs</a>
                    </li>
                     <li>
                        <a href="/events/participation" class="hover:text-laravel"><i class="fa-solid fa-heart"></i>
                            Participations</a>
                        </li>
                    @endunless
                    <li>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit">
                                <i class="fa-solid fa-door-closed"></i> Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="hover:text-laravel"><i class="fa-solid fa-user-plus"></i> Register</a>
                    </li>
                    <li>
                        <a href="/login" class="hover:text-laravel"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                            Login</a>
                    </li>
                @endauth
        </ul>
    </nav>
    <main>
        {{ $slot }}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>
    </footer>
    <x-flash-dash-message></x-flash-dash-message>
</body>
<script src="../path/to/flowbite/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

</html>
