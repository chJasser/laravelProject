<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="images/favicon.ico" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


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
                <a href="/backoffice/events/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage
                    Events</a>
            </li>

            <li>
                <a href="/forums/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage
                    Forums</a>
            </li>
            <li> <a href="/conventions/manage" class="hover:text-laravel"><i class="fa-solid fa-gear"></i> Manage
                    Conventions</a></li>
            <li> <a href="/reclamations/manage" class="hover:text-laravel"><i class="fa fa-paper-plane" aria-hidden="true"></i>Manage Reclamations</a></li>



            @else
            <li>
                <span class="font-bold uppercase">
                    {{ auth()->user()->name }}
                </span>
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

    {{-- <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-laravel text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Copyright &copy; 2022, All Rights reserved</p>

        <a href="/events/create" class="absolute top-1/3 right-10 bg-black text-white py-2 px-5">Post Job</a>
    </footer> --}}
    <x-flash-dash-message></x-flash-dash-message>
</body>

</html>